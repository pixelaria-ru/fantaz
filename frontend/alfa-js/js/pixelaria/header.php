<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?><!DOCTYPE html>
<html lang="ru" class="<?=($_SESSION['SESS_INCLUDE_AREAS'] ? 'bx_editmode ' : '')?><?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie7' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0' ) ? 'ie ie8' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie9' : ''?>">

<head>
  <?global $APPLICATION;?>
  <title><?$APPLICATION->ShowTitle()?></title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="for$APPLICATION->GetPageProperty("title");mat-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://fonts.googleapis.com/css?family=Exo+2&amp;subset=cyrillic" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="/favicon.ico">

<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>

<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>

<?$APPLICATION->ShowCSS();?>


  <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/libs.min.css');?>
  <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/bundle.css');?>


  
</head>
<body>
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>
  <div class="strip">
    <div class="container">
      <ul class="strip__items">
        <li class="strip__item"><a href="mailto:info@abespb.ru" class="link link--white link--email">info@abespb.ru</a></li>
        <li class="strip__item">Санкт-Петербург,  Муринcкая дорога, 23</li>
      </ul>

      <?$APPLICATION->IncludeComponent(
      	"bitrix:search.title", 
      	"top", 
      	array(
      		"NUM_CATEGORIES" => "1",
      		"TOP_COUNT" => "5",
      		"ORDER" => "date",
      		"USE_LANGUAGE_GUESS" => "Y",
      		"CHECK_DATES" => "N",
      		"SHOW_OTHERS" => "N",
      		"PAGE" => SITE_DIR."search/",
      		"SHOW_INPUT" => "Y",
      		"INPUT_ID" => "title-search-input",
      		"CONTAINER_ID" => "title-search",
      		"COMPONENT_TEMPLATE" => "top",
      		"CATEGORY_0_TITLE" => "",
      		"CATEGORY_0" => array(
      			0 => "main",
      			1 => "iblock_DATA",
      		),
      		"CATEGORY_0_main" => array(
      		),
      		"CATEGORY_0_iblock_DATA" => array(
      			0 => "all",
      		)
      	),
      	false
      );?>
    </div>
  </div>  
  <header class="header">
    <div class="header__wrapper"></div>
    <div class="container">
      <a class="header__item header__item--logo" title="Производство дизельных электростанций" href="/">
        Производство дизельных<br>электростанций
      </a>

      <nav class="header__item header__item--nav">
        <?$APPLICATION->IncludeComponent(
          "bitrix:menu", 
          "top", 
          array(
            "ROOT_MENU_TYPE" => "top",
            "MENU_CACHE_TYPE" => "A", //"Y"
            "MENU_CACHE_TIME" => "3600000",
            "MENU_CACHE_USE_GROUPS" => "N", //"Y"
            "MENU_CACHE_GET_VARS" => array(),
            "MAX_LEVEL" => "2",
            "CHILD_MENU_TYPE" => "left",
            "USE_EXT" => "Y",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N",
            "COUNT_ITEM" => "6"
          )
        );?>
      </nav>

      <div class="header__item header__item--callback callback">
        <span class="callback__link" data-param-id="17" data-event="jqm" data-title="Обратный звонок" data-name="callback">Заказать звонок</span>
        <a href="tel:88123376820" class="callback__phone phone phone--big"><span class="phone__code">+7 (812)</span> 337-68-20</a>
      </div>
      <?$APPLICATION->IncludeComponent(
        "bitrix:search.title", 
        "header", 
        array(
          "NUM_CATEGORIES" => "1",
          "TOP_COUNT" => "5",
          "ORDER" => "date",
          "USE_LANGUAGE_GUESS" => "Y",
          "CHECK_DATES" => "N",
          "SHOW_OTHERS" => "N",
          "PAGE" => SITE_DIR."search/",
          "SHOW_INPUT" => "Y",
          "INPUT_ID" => "header-search-input",
          "CONTAINER_ID" => "header-search",
          "COMPONENT_TEMPLATE" => "top",
          "CATEGORY_0_TITLE" => "",
          "CATEGORY_0" => array(
            0 => "main",
            1 => "iblock_DATA",
          ),
          "CATEGORY_0_main" => array(
          ),
          "CATEGORY_0_iblock_DATA" => array(
            0 => "all",
          )
        ),
        false
      );?>
    </div>
  </header>
  <main>