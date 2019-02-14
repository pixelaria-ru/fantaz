<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$endings = array('модель','модели','моделей');

function getNumEnding($number, $endingArray){
  $number = $number % 100;
  if ($number>=11 && $number<=19) {
      $ending=$endingArray[2];
  }
  else {
      $i = $number % 10;
      switch ($i)
      {
          case (1): $ending = $endingArray[0]; break;
          case (2):
          case (3):
          case (4): $ending = $endingArray[1]; break;
          default: $ending=$endingArray[2];
      }
  }
  return $ending;
}

$this->setFrameMode(true);

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');


$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}



$arFilter = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], "ID"=>$arResult["VARIABLES"]["SECTION_ID"]);
$db_list = CIBlockSection::GetList(Array(), $arFilter, true, array('UF_*'));

$arSection = $db_list->GetNext();



if ($_GET["sort"] == "NAME" || $_GET["sort"] == "M_MAIN_POWER_KVT" || $_GET["sort"] == "M_ENGINE_MO"){
    $arParams["ELEMENT_SORT_FIELD"] = $_GET["sort"];
    $arParams["ELEMENT_SORT_ORDER"] = $_GET["method"];

    $_SESSION["SORT"] = $_GET["sort"];
    $_SESSION["SORT_METHOD"] = $_GET["method"];
} 


/**
* нужно получить проекты
*/
$projects = Array();
if ($arSection["UF_PROJECTS"]) {
    $arSelect = Array("ID", "IBLOCK_ID","IBLOCK_SECTION_ID", "NAME","DETAIL_PAGE_URL","PREVIEW_PICTURE","PROPERTY_*");
    $arFilter = Array("IBLOCK_ID"=>IntVal(4), "ID"=>$arSection["UF_PROJECTS"]);

    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

    
    while($ob = $res->GetNextElement()){ 
        $arProps = $ob->GetProperties();
        $arFields = $ob->GetFields();
        
        $project = $arFields;
        $project['PROPERTIES'] = $arProps;

        $arSelect = Array("ID", "IBLOCK_ID", "NAME");
        $arFilter = Array("IBLOCK_ID"=>IntVal(5), "ID"=>$arProps['INDUSTRY']['VALUE']);
        $_res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        
        if($_ob = $_res->GetNextElement()){
            $_arFields = $_ob->GetFields();
            //echo 'industry: '.$_arFields['NAME'].'<br>';
            $project['PROPERTIES']['INDUSTRY']['VALUE'] = $_arFields['NAME'];
        }

        $_res = CIBlockSection::GetByID($arFields["IBLOCK_SECTION_ID"]);
        if($_ob = $_res->GetNext())
          $project['IBLOCK_SECTION_NAME'] = $_ob['NAME']; 

        $projects[] = $project;
    }
}


?>
<section class="section section--line">
  <div class="container">
    <?$APPLICATION->IncludeComponent(
      "pixelaria:breadcrumb",
      "",
      Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
      )
    );
    ?>
    <div class="page row">
      <div class="page__info col-md-8 col-lg-6">
        <h1 class="page__title"><?=$arSection['UF_SECTION_NAME']?></h1>
        <?
        $i=0; $len=count($arSection['UF_PREVIEW']);
        foreach ($arSection['UF_PREVIEW'] as $preview) { $i++;?>
            <p class="page__subtitle">
              <?=htmlspecialchars($preview)?> 
              <?if ($i==$len) {?>
              <a href="#description" data-offset="80" class="link link--orange scroll-to-target">Подробнее</a>
              <?}?>
            </p>
        <?}?>

        <span class="btn btn--orange" 
            data-param-id="17" 
            data-event="jqm" 
            data-title="Получить консультацию" 
            data-name="consult">Получить консультацию</span>
        <a href="/upload/alfa-balt-questionnaire.doc" target="_blank" class="btn btn--tr">Скачать опросный лист</a>
      </div>
      
      <?if ($projects && $arResult["VARIABLES"]["SECTION_ID"]!=19) {?>
        <div class="page__project col-md-4 col-lg-6">
          <div class="slider slider--projects-single">
          <div class="projects">
            <?foreach($projects as $project){ ?>
            <a class="projects__item project" href="<?=$project["DETAIL_PAGE_URL"]?>" style="text-decoration: none;">
                <div class="project__image">
                  <img src="<?=CFile::GetPath($project['PREVIEW_PICTURE']);?>" alt="" class="img img--responsive">
                </div>
                <div class="project__desc">
                  <div class="project__customer"><span>Заказчик: </span> <?=$project['PROPERTIES']['CLIENT_NAME']['VALUE']?></div>
                  <div class="project__icon"><img src="" alt="" class="img img--responsive"></div>
                  <p class="project__title"><?=$project["NAME"]?></p>
                  <div class="project__info project__info--orange"><?=$project['PROPERTIES']['INDUSTRY']['VALUE']?></div>
                  <div class="project__info"><?=$project['IBLOCK_SECTION_NAME']?> г.</div>
                </div>
              </a>

            <?}?>
          </div>
          </div>
        </div>
      <?} else {?>
        <div class="page__image col-md-4 col-lg-5">
          <img src="<?=CFile::GetPath($arSection["UF_DETAIL_PICTURE"])?>" alt="<?=$arSection['NAME']?>" class="img img--responsive">
        </div>
      <?}?>
    </div>
  </div>
</section>
<section class="section section--gray" id="section-filter">
<div class="container">
<?
  //get template for catalog.section
  $nav = CIBlockSection::GetNavChain(false, $arResult["VARIABLES"]["SECTION_ID"]);
  $root = $nav->GetNext();
  $root_id = $root['ID'];

  switch ($root_id) {
    case '19':
      $template = 'des';
    break;
    case '20':
      $template = 'gas';
      break;
  }
?>

<?if ($arSection['UF_FILTER']) {
  $APPLICATION->IncludeComponent(
    "bitrix:catalog.smart.filter",
   $template,
    array(
      "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
      "IBLOCK_ID" => $arParams["IBLOCK_ID"],
      "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
      "FILTER_NAME" => $arParams["FILTER_NAME"],
      "PRICE_CODE" => $arParams["PRICE_CODE"],
      "CACHE_TYPE" => $arParams["CACHE_TYPE"],
      "CACHE_TIME" => $arParams["CACHE_TIME"],
      "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
      "SAVE_IN_SESSION" => "N",
      "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
      "XML_EXPORT" => "Y",
      "SECTION_TITLE" => "NAME",
      "SECTION_DESCRIPTION" => "DESCRIPTION",
      'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
      "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
      'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
      'CURRENCY_ID' => $arParams['CURRENCY_ID'],
      "SEF_MODE" => $arParams["SEF_MODE"],
      "SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
      "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
      "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
      "INSTANT_RELOAD" => "Y",
      "SHOW_ALL_WO_SECTION" => "Y"
    ),
    $component,
    array('HIDE_ICONS' => 'Y')
  );
}?> 

<?$APPLICATION->IncludeComponent(
  "bitrix:catalog.section",
  $template,
  array(        
    "INCLUDE_SUBSECTIONS" => "Y",
    "SHOW_ALL_WO_SECTION" => "Y",
    "SET_BROWSER_TITLE" => "Y",
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "ELEMENT_SORT_FIELD" => $arParams['ELEMENT_SORT_FIELD'],
    "ELEMENT_SORT_ORDER" => $arParams['ELEMENT_SORT_ORDER'],
    "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
    "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
    "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
    "PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
    "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
    "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
    "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
    "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],

    "BASKET_URL" => $arParams["BASKET_URL"],
    "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
    "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
    "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
    "FILTER_NAME" => $arParams["FILTER_NAME"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "SET_TITLE" => $arParams["SET_TITLE"],
    "MESSAGE_404" => $arParams["~MESSAGE_404"],
    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
    "SHOW_404" => $arParams["SHOW_404"],
    "FILE_404" => $arParams["FILE_404"],
    "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
    "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
    "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
    "PRICE_CODE" => $arParams["PRICE_CODE"],
    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
    "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
    "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
    "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
    "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
    "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

    "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
    "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
    "PAGER_TITLE" => $arParams["PAGER_TITLE"],
    "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
    "PAGER_TEMPLATE" => 'models',
    "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
    "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
    "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
    "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
    "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
    "LAZY_LOAD" => $arParams["LAZY_LOAD"],
    "MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
    "LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

    "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
    "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
    "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
    "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
    "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
    "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
    "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
    "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
    "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
    "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
    'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

    'LABEL_PROP' => $arParams['LABEL_PROP'],
    'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
    'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
    'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
    'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
    'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
    'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
    'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
    'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
    'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
    'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
    'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

    'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
    'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
    'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
    'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
    'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
    'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
    'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
    'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
    'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
    'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
    'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
    'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
    'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
    'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
    'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
    'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
    'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

    'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
    'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
    'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

    'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
    "ADD_SECTIONS_CHAIN" => "Y",
    'ADD_TO_BASKET_ACTION' => $basketAction,
    'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
    'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
    'COMPARE_NAME' => $arParams['COMPARE_NAME'],
    'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
    'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
    'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
    "AJAX" => $_REQUEST["AJAX"]
  ),
  $component
);?>
</div>
</section>
<div id="description">
<?if($arSection['DESCRIPTION']){?>
  <?=$arSection['DESCRIPTION']?>
<?}?>
</div>
<?if ($projects && $arResult["VARIABLES"]["SECTION_ID"]==19) {?>
<section class="section section--gray">
  <div class="container">
    <h2 class="section__title">Решения на ДЭС АБИН</h2>
    <div class="slider slider--projects">
    <div class="projects">
      <?foreach($projects as $project){ ?>
      <a class="projects__item project" href="<?=$project["DETAIL_PAGE_URL"]?>" style="text-decoration: none;">
          <div class="project__image">
            <img src="<?=CFile::GetPath($project['PREVIEW_PICTURE']);?>" alt="" class="img img--responsive">
          </div>
          <div class="project__desc">
            <div class="project__customer"><span>Заказчик: </span> <?=$project['PROPERTIES']['CLIENT_NAME']['VALUE']?></div>
            <div class="project__icon"><img src="" alt="" class="img img--responsive"></div>
            <p class="project__title"><?=$project["NAME"]?></p>
            <div class="project__info project__info--orange"><?=$project['PROPERTIES']['INDUSTRY']['VALUE']?></div>
            <div class="project__info"><?=$project['IBLOCK_SECTION_NAME']?> г.</div>
          </div>
        </a>

      <?}?>
    </div>
    </div>
  </div>
</section>
<?}?>

<?if (!$arSection['UF_FILTER'] && $root_id==19) {?>
<section class="section section---gray">
  <div class="container">
    <h2 class="section__title">Выбрать другую мощность ДЭС</h2>
    <div class="category-list category-list--power category-list--4">
    <div class="category-list__list">
    <?
      if(CModule::IncludeModule("iblock")) { 
        $arFilter = Array('IBLOCK_ID'=>3, 'SECTION_ID'=>19,'GLOBAL_ACTIVE'=>'Y');
        $arSelect = Array('ID','CODE','NAME','SECTION_PAGE_URL','UF_*');

        $db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter,false,$arSelect);
        while($ar_result = $db_list->GetNext()) { 
          $_arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y","SECTION_ID"=>$ar_result['ID']);
          $res_count = CIBlockElement::GetList(Array("SORT"=>"ASC"), $_arFilter,array(), false, Array("ID","IBLOCK_ID","M_ENGINE_MF"));
          
          if ($ar_result['UF_POWER'] && $res_count) {?>
            <div class="category-list__item">
                 <a href="<?php echo $ar_result['SECTION_PAGE_URL'];?>" class="category-list__link">
                    <?=$ar_result['UF_POWER']?> кВт</a> <span class="category-list__desc">(<?=$res_count?> <?=getNumEnding($res_count,$endings)?>)</span>
            </div>
 <?}
        }
      }?>
    </div>
    </div>
  </div>
</section>
<?}?>
