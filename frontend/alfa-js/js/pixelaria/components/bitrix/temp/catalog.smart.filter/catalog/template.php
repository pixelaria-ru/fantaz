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

?>
<div class="filter" style="overflow: unset">
  <div class="filter__body filter__body--main">
    <div class="bx-filter <?=$templateData["TEMPLATE_CLASS"]?> <?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") echo "bx-filter-horizontal"?>">
      <div class="bx-filter-section container-fluid">
        <form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
          <div class="filter__row">
            <div class="filter-inline">
              <p class="filter-inline__title">Мощность:</p>
              <span class="filter-inline__link filter-inline__link--active" style="cursor: pointer;">Основная</span>
              <span class="filter-inline__link" style="cursor: pointer;">Резервная</span>
            </div>
            <div class="filter-inline">
              <p class="filter-inline__title">Напряжение:</p>
              <p class="filter-inline__text">380 В, 50 Гц </p>
            </div>
          </div>

          <?foreach($arResult["HIDDEN"] as $arItem):?>
          <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
          <?endforeach;?>
          
            <?
            //not prices
            foreach($arResult["ITEMS"] as $key=>$arItem) {
              if(
                empty($arItem["VALUES"])
                || isset($arItem["PRICE"])
              )
                continue;

              if (
                $arItem["DISPLAY_TYPE"] == "A"
                && (
                  $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
                )
              )
                continue;
              ?>
              <div class="bx-filter-parameters-box <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>bx-active<?endif?>" data-id="<?=$arItem['ID']?>">
                <span class="bx-filter-container-modef"></span>
                <p class="filter__title"><?=$arItem["NAME"]?></p>
                <div class="bx-filter-block" data-role="bx_filter_block">
                  <div class="bx-filter-parameters-box-container">
                  <?
                  $arCur = current($arItem["VALUES"]);
                  switch ($arItem["DISPLAY_TYPE"])
                  {
                    case "A"://NUMBERS_WITH_SLIDER
                      ?>
                      <div class="price-filter">
                        <div class="price-filter__item price-filter__item--min">
                          <label 
                            for="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" 
                            class="price-filter__label">
                              <?=GetMessage("CT_BCSF_FILTER_FROM")?>
                          </label>
                          <input 
                            id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                            name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" 
                            class="price-filter__input" 
                            value="<?echo $arItem["VALUES"]["MIN"]["VALUE"]?>" 
                            type="text"
                            onkeyup="smartFilter.keyup(this)"
                          />
                        </div>
                        <div class="price-filter__item price-filter__item--max">
                          <label for="max-price" 
                            for="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" 
                            class="price-filter__label">
                              <?=GetMessage("CT_BCSF_FILTER_TO")?>
                          </label>
                          <input 
                            name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" 
                            class="price-filter__input" 
                            value="<?echo $arItem["VALUES"]["MAX"]["VALUE"]?>"
                            type="text"
                            onkeyup="smartFilter.keyup(this)"
                          />
                        </div>
                      </div>
                      <div class="filter__range" style="width: 100%; margin-top: 15px;">
                        <div class="bx-ui-slider-track-container">
                          <div class="bx-ui-slider-track" id="drag_track_<?=$key?>">
                            <?
                            $precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
                            $step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / 4;
                            $value1 = number_format($arItem["VALUES"]["MIN"]["VALUE"], $precision, ".", "");
                            $value2 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step, $precision, ".", "");
                            $value3 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 2, $precision, ".", "");
                            $value4 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 3, $precision, ".", "");
                            $value5 = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
                            ?>
                            <div class="bx-ui-slider-part p1"><span><?=$value1?></span></div>
                            <div class="bx-ui-slider-part p2"><span><?=$value2?></span></div>
                            <div class="bx-ui-slider-part p3"><span><?=$value3?></span></div>
                            <div class="bx-ui-slider-part p4"><span><?=$value4?></span></div>
                            <div class="bx-ui-slider-part p5"><span><?=$value5?></span></div>

                            <div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
                            <div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
                            <div class="bx-ui-slider-pricebar-v"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
                            <div class="bx-ui-slider-range"   id="drag_tracker_<?=$key?>"  style="left: 0;right: 0;">
                              <a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
                              <a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?
                      $arJsParams = array(
                        "leftSlider" => 'left_slider_'.$key,
                        "rightSlider" => 'right_slider_'.$key,
                        "tracker" => "drag_tracker_".$key,
                        "trackerWrap" => "drag_track_".$key,
                        "minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
                        "maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
                        "minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
                        "maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
                        "curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                        "curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                        "fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
                        "fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
                        "precision" => $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0,
                        "colorUnavailableActive" => 'colorUnavailableActive_'.$key,
                        "colorAvailableActive" => 'colorAvailableActive_'.$key,
                        "colorAvailableInactive" => 'colorAvailableInactive_'.$key,
                      );
                      ?>
                      <script type="text/javascript">
                        BX.ready(function(){
                          window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
                        });
                      </script>
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
            <?
            }
            ?>
          
          <div class="filter__buttons">
              <div class="bx-filter-parameters-box-container">
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
                <div class="bx-filter-popup-result <?if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") echo $arParams["POPUP_POSITION"]?>" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
                  <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
                  <span class="arrow"></span>
                  <br/>
                  <a class="link link--orange" href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
                </div>
              </div>
          </div>
          
          <div class="clb"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="filter__body filter__body--sub">
    <p class="filter__title">Быстрый переход к категории:</p>
    <div class="accordeon accordeon--filter accordeon--active">
      <div class="accordeon__preview">
        <div class="accordeon__title">От 5 до 50 кВт</div>  
      </div>
      <div class="accordeon__body">
        <div class="filter__links">
          <a href="#" class="filter__link">10 кВт</a>
          <a href="#" class="filter__link">15 кВт</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>