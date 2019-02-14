<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<? if ($arResult['ITEMS']) { ?>
<? if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax']=='y') {?>
      <?foreach($arResult['ITEMS'] as $arSection) { 
        if(!empty($arSection['ELEMENTS'])){ ?>
          <?if ($arSection['ID']!=$arParams['SECTION_ID']) { ?>
            <div class="table__row">
              <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="table__cell table__cell--hr">— <?=$arSection['UF_POWER']?> кВт —</a>
            </div>
          <?}?>
      <?
          foreach($arSection['ELEMENTS'] as $arItem) { $counter++;
      ?>

      <div class="table__row product-row">
        <div class="table__cell table__cell--row">
          <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-row__img">
            <?if($arItem['PREVIEW_PICTURE']){?>
              <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="" class="img img--responsive">
            <?}else{?>
              <img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/no_image_sm.png">    
            <?}?>
          </a>
          <div class="product-row__desc">
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-row__name"><?=$arItem['NAME']?></a>
            <div class="checkbox checkbox--small product-row__checkbox">
              <input <?if($_SESSION['CATALOG_COMPARE_LIST'][3]['ITEMS'][$arItem['ID']]){?> checked="checked"<?}?>  id="compare_<?=$arItem['ID']?>" name="product" type="checkbox"  class="checkbox__input">
              <label onclick="add_to_compare(<?=$arItem['ID']?>)" class="checkbox__label" for="compare_<?=$arItem['ID']?>">сравнить</label>
            </div>
          </div>
        </div>
        <div class="table__cell">
          <div class="product-row__power power">
            <div class="power__text">Тепловая мощность:</div>
            <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_THERMAL_KVT']['VALUE']?> кВт</p>
            <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_THERMAL_KVA']['VALUE']?> кВА</p>
          </div>
        </div>
        <div class="table__cell">
          <div class="product-row__power power">
            <div class="power__text">Электрическая мощность:</div>
            <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_ELECTRIC_KVT']['VALUE']?> кВт</p>
            <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_ELECTRIC_KVA']['VALUE']?> кВА</p>
          </div>
        </div>
        <div class="table__cell">
          <p class="product-row__engine product-row__engine--<?=$arItem['PROPERTIES']['MANUFACTURER']['COUNTRY_CODE']?>"><span>Двигатель: </span><?=$arItem['PROPERTIES']['MANUFACTURER']['NAME']?> <?=$arItem['PROPERTIES']['M_ENGINE_MO']['VALUE']?></p>
        </div>
        <div class="table__cell hidden--tablet">
          <? if($arItem['PROPERTIES']['SPECIFICATION']['VALUE']) {?>
          <a href="<?=CFile::GetPath($arItem['PROPERTIES']['SPECIFICATION']['VALUE'])?>" class="link link--download" target="_blank"></a>
          <?}?>
        </div>
        <div class="table__cell table__cell--clear">
          <span 
            class="btn btn--orange btn--tag product-row__tag" 
            data-param-id="18" 
            data-event="jqm" 
            data-name="callprice"
            data-title="Узнать цену на <?=$arItem['PROPERTIES']['MODEL']['VALUE']?>"
            data-product-id="<?=$arItem['ID']?>" 
            data-product="<?=$arItem['NAME']?>"
            >
            Узнать цену
          </span>
        </div>
      </div>
      <?}}}?>
<? } else { ?>
<div class="table">
  <div class="table__head">
    <div class="table__row table__row--th">
      <div class="table__cell table__cell--th">
        <a 
          class="table__link <?if($arParams["ELEMENT_SORT_FIELD"] == 'NAME') echo "table__link--active"?>" 
          href="?sort=NAME&method=<?echo ($arParams["ELEMENT_SORT_ORDER"]=='ASC')? "DESC":"ASC"?>">
          Модель
        </a>
      </div>
      <div class="table__cell table__cell--th hidden--mobiles">
        <a 
          class="table__link <?if($arParams["ELEMENT_SORT_FIELD"] == 'M_POWER_THERMAL_KVT') echo "table__link--active"?>" 
          href="?sort=M_POWER_THERMAL_KVT&method=<?echo ($arParams["ELEMENT_SORT_ORDER"]=='ASC')? "DESC":"ASC"?>">
          Мощность
        </a>
        <div style="display:flex;margin-top:10px;">
          <span class="col-sm-6">Тепловая</span><span class="col-sm-6">Электр.</span>
        </div>
      </div>
      <div class="table__cell table__cell--th hidden--mobiles">
        <a 
          class="table__link <?if($arParams["ELEMENT_SORT_FIELD"] == 'M_ENGINE_MO') echo "table__link--active"?>" 
          href="?sort=M_ENGINE_MO&method=<?echo ($arParams["ELEMENT_SORT_ORDER"]=='ASC')? "DESC":"ASC"?>">
          Модель двигателя
        </a>
      </div>
      <div class="table__cell table__cell--th hidden--tablet">Скачать брошюру</div>
      <div class="table__cell table__cell--th hidden--mobiles">Узнать цену</div>
    </div>
  </div>
  <div class="table__body">
    <div class="table__row product-row"></div>
    <?foreach($arResult['ITEMS'] as $arSection) { 
      if(!empty($arSection['ELEMENTS'])){ ?>
        <?if ($arSection['ID']!=$arParams['SECTION_ID']) { ?>
          <div class="table__row">
            <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="table__cell table__cell--hr">— <?=$arSection['UF_POWER']?> кВт —</a>
          </div>
        <?}?>
    <?
        foreach($arSection['ELEMENTS'] as $arItem) { $counter++;
    ?>

    <div class="table__row product-row">
      <div class="table__cell table__cell--row">
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-row__img">
          <?if($arItem['PREVIEW_PICTURE']){?>
            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="" class="img img--responsive">
          <?}else{?>
            <img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/no_image_sm.png">    
          <?}?>
        </a>
        <div class="product-row__desc">
          <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-row__name"><?=$arItem['NAME']?></a>
          <div class="checkbox checkbox--small product-row__checkbox">
            <input <?if($_SESSION['CATALOG_COMPARE_LIST'][3]['ITEMS'][$arItem['ID']]){?> checked="checked"<?}?>  id="compare_<?=$arItem['ID']?>" name="product" type="checkbox"  class="checkbox__input">
            <label onclick="add_to_compare(<?=$arItem['ID']?>)" class="checkbox__label" for="compare_<?=$arItem['ID']?>">сравнить</label>
          </div>
        </div>
      </div>
      <div class="table__cell">
        <div class="product-row__power power">
          <div class="power__text">Тепловая мощность:</div>
          <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_THERMAL_KVT']['VALUE']?> кВт</p>
          <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_THERMAL_KVA']['VALUE']?> кВА</p>
        </div>
      </div>
      <div class="table__cell">
        <div class="product-row__power power">
          <div class="power__text">Электрическая мощность:</div>
          <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_ELECTRIC_KVT']['VALUE']?> кВт</p>
          <p class="power__item"><?=$arItem['PROPERTIES']['M_POWER_ELECTRIC_KVA']['VALUE']?> кВА</p>
        </div>
      </div>
      <div class="table__cell">
        <p class="product-row__engine product-row__engine--<?=$arItem['PROPERTIES']['MANUFACTURER']['COUNTRY_CODE']?>"><span>Двигатель: </span><?=$arItem['PROPERTIES']['MANUFACTURER']['NAME']?> <?=$arItem['PROPERTIES']['M_ENGINE_MO']['VALUE']?></p>
      </div>
      <div class="table__cell hidden--tablet"><a href="<?=CFile::GetPath($arItem['PROPERTIES']['SPECIFICATION']['VALUE'])?>" class="link link--download" target="_blank"> </a></div>
      <div class="table__cell table__cell--clear">
        <span 
          class="btn btn--orange btn--tag product-row__tag" 
          data-param-id="18" 
          data-event="jqm" 
          data-name="callprice"
          data-title="Узнать цену на <?=$arItem['PROPERTIES']['MODEL']['VALUE']?>"
          data-product-id="<?=$arItem['ID']?>" 
          data-product="<?=$arItem['NAME']?>"
          >
          Узнать цену
        </span>
      </div>
    </div>
    <?}}}?>
  </div>
</div>
<? } ?>


  <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
  <? endif; ?>
<? } ?>


<?
  if (array_key_exists('is_ajax', $_REQUEST) && $_REQUEST['is_ajax']=='y') {
    die();
  }
?>