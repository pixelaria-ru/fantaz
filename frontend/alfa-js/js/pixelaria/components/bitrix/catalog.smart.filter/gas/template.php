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
$this->setFrameMode(true);

$templateData = array(
  'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
  'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME']
);

if (isset($templateData['TEMPLATE_THEME']))
{
  $this->addExternalCss($templateData['TEMPLATE_THEME']);
}

$res = CIBlockElement::GetList(
  array('PROPERTY_M_POWER_ELECTRIC_KVA' => 'DESC'), //arOrder
  array('IBLOCK_ID' => '3'), //arFilter
  array('PROPERTY_M_POWER_ELECTRIC_KVA'), //arGroupBy
  false
);

while ($el = $res->Fetch()) {
  $tmp[] = $el['PROPERTY_M_POWER_ELECTRIC_KVA_VALUE'];
}
$max = $tmp[0];


$pixelaria = array();
$pixelaria['start'] = 5;
$pixelaria['end'] = 3500;

$pixelaria['power_1'] = 'Электрическая';
$pixelaria['power_2'] = 'Тепловая';

$pixelaria['code'] = 'M_POWER_ELECTRIC_KVT';
$pixelaria['data_type'] = 'THERMAL';
$pixelaria['data_view'] = 'KVT';

$pixelaria['min_val'] = 5;
$pixelaria['max_val'] = $max;

if ($GLOBALS['arrFilter']) $pixelaria['scroll'] = true;
else $pixelaria['scroll'] = false;

?>
<div class="filter" style="overflow: unset">
  <div class="filter__body filter__body--main">
    <div class="bx-filter <?=$templateData["TEMPLATE_CLASS"]?> <?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") echo "bx-filter-horizontal"?>">
      <div class="bx-filter-section container-fluid">
        <form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
          <div class="filter__row">
            <div class="filter-inline">
              <p class="filter-inline__title">Мощность:</p>
              <span class="filter-inline__link" data-type="THERMAL">Тепловая</span>
              <span class="filter-inline__link" data-type="ELECTRIC">Электрическая</span>
            </div>
            <div class="filter-inline">
              <p class="filter-inline__title">Напряжение:</p>
              <p class="filter-inline__text">380 В, 50 Гц </p>
            </div>
          </div>
          <div class="filter__row">
            <div class="type-filter">
              <div class="type-filter__item" data-view="KVA">кВА</div><div class="type-filter__item" data-view="KVT">кВт</div>
            </div>
            <div class="price-filter">
              <div class="price-filter__item price-filter__item--min">
                <label for="min-price" class="price-filter__label">От</label>
                <input id="min-price" name="min-price" class="price-filter__input" value="" type="text">
              </div>
              <div class="price-filter__item price-filter__item--max">
                <label for="max-price" class="price-filter__label">до</label>
                <input id="max-price" name="max-price" class="price-filter__input" value="" type="text">
              </div>
            </div>
          </div>
          <div class="filter__range range">
            <div id="price-slider"></div>  
          </div>

          <?foreach($arResult["HIDDEN"] as $arItem):?>
            <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
          <?endforeach;?>
          
          <?foreach($arResult["ITEMS"] as $key=>$arItem) {
            if (empty($arItem["VALUES"]) || isset($arItem["PRICE"]))
              continue;
            if (($arItem["DISPLAY_TYPE"] == "A") && 
                ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))
              continue;
            ?>
            <div class="bx-filter-parameters-box" data-id="<?=$arItem['ID']?>">
              <div class="bx-filter-block" data-role="bx_filter_block">
                <div class="bx-filter-parameters-box-container">
                <?
                $arCur = current($arItem["VALUES"]);
                switch ($arItem["DISPLAY_TYPE"])
                {
                  case "A"://NUMBERS_WITH_SLIDER
                  case "B"://NUMBERS_WITH_SLIDER
                    if (isset($arItem["VALUES"]["MAX"]["HTML_VALUE"]) && isset($arItem["VALUES"]["MIN"]["HTML_VALUE"])) {
                      $pixelaria['code'] = $arItem['CODE'];
                      $pixelaria['start'] = $arItem["VALUES"]["MIN"]["HTML_VALUE"];
                      $pixelaria['end'] = $arItem["VALUES"]["MAX"]["HTML_VALUE"];

                      if (strpos($arItem['CODE'],"ELECTRIC"))
                        $pixelaria['data_type'] = "ELECTRIC";
                      else
                        $pixelaria['data_type'] = "THERMAL";

                      if (strpos($arItem['CODE'],"KVA"))
                        $pixelaria['data_view'] = "KVA";
                      else
                        $pixelaria['data_view'] = "KVT";
                      //echo '<p class="section__title">Фильтр по '.$arItem['CODE']." от ".$pixelaria['start']." до ".$pixelaria['end'].'</p>';
                    }
                    ?>
                    <div class="price-filter" style="display: none">
                      <div class="price-filter__item price-filter__item--min">
                        <input 
                          id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                          name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" 
                          class="price-filter__input price-filter__input--hidden" 
                          value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>" 
                          type="text"
                          onkeyup="smartFilter.keyup(this)"
                        />
                      </div>
                      <div class="price-filter__item price-filter__item--max">
                        <input 
                          name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                          id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" 
                          class="price-filter__input price-filter__input--hidden" 
                          value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                          type="text"
                          onkeyup="smartFilter.keyup(this)"
                        />
                      </div>
                    </div>
                    <?
                    break;
                  default://CHECKBOXES
                    ?>
                    <div class="filter__checkbox">
                      <?foreach($arItem["VALUES"] as $val => $ar):?>
                        <div class="checkbox">
                          <input 
                            value="<? echo $ar["HTML_VALUE"] ?>"
                            name="<? echo $ar["CONTROL_NAME"] ?>"
                            id="<? echo $ar["CONTROL_ID"] ?>"
                            <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                            class="checkbox__input" 
                            type="checkbox">  
                          <label 
                            data-role="label_<?=$ar["CONTROL_ID"]?>"
                            class="bx-filter-param-label checkbox__label" 
                            for="<? echo $ar["CONTROL_ID"] ?>"
                            onclick="smartFilter.click(this)">
                            <?=$ar["VALUE"];?>
                          </label>
                        </div>
                        
                      <?endforeach;?>
                    </div>
                <?
                }
                ?>
                </div>
                <div style="clear: both"></div>
              </div>
            </div>
          <?}?>
          <div class="filter__buttons">
            <div class="bx-filter-parameters-box-container">
              <span class="bx-filter-container-modef"></span>
              <div class="bx-filter-popup-result <?if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") echo $arParams["POPUP_POSITION"]?>" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
                
                Подобрано: <span id="modef_num"><?=intval($arResult["ELEMENT_COUNT"])?></span>
                <br/>
                <a style="display: none" class="link link--orange" href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
              </div>
              <input
                class="btn btn--orange"
                type="submit"
                id="set_filter"
                name="set_filter"
                value="Подобрать"
              />
              <input
                class="btn btn--tr"
                style="background-color: transparent;"
                type="submit"
                id="del_filter"
                name="del_filter"
                value="Сбросить фильтр"
              />
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="filter__body filter__body--sub">
    <p class="filter__title">Быстрый переход к категории:</p>
    <? $cnt = 0;?>
    <?foreach ($arResult['categories'] as $category) { $cnt++;?>
      <? if (!$category['count']) continue;?>
      <? $class=''; if ($cnt==3) $class='accordeon--active';?>
      <div class="accordeon accordeon--filter <?=$class;?>">
        <div class="accordeon__preview">
          <div class="accordeon__title"><?=$category['name']?></div>  
        </div>
        <div class="accordeon__body">
          <div class="filter__links">
            <?foreach ($category['categories'] as $cat) { ?>
              <a href="<?php echo $cat['SECTION_PAGE_URL'];?>" class="filter__link"><?php echo $cat['UF_POWER'];?> кВт</a>
            <?}?>
          </div>
        </div>
      </div>  
    <? } ?>

    
  </div>
</div>

<script type="text/javascript">
  var pixelaria_vars = <?=CUtil::PhpToJSObject($pixelaria)?>
</script>
<script type="text/javascript">
  var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>