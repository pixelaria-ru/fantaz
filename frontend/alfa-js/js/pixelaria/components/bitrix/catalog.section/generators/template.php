<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<? if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax']=='y') {?>
      <?
          foreach($arResult['ITEMS'] as $arItem) {
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
          </div>
        </div>
        <div class="table__cell">
          <div class="product-row__power power">
            <div class="power__text">Основная мощность:</div>
            <p class="power__item"><?=$arItem['PROPERTIES']['G_POWER_MAIN']['VALUE']?> кВт</p>
          </div>
        </div>
        <div class="table__cell">
          <div class="product-row__power power">
            <div class="power__text">Резервная мощность:</div>
            <p class="power__item"><?=$arItem['PROPERTIES']['G_POWER_RESERVE']['VALUE']?> кВт</p>
          </div>
        </div>
        <div class="table__cell">
          <p class="product-row__engine product-row__engine--<?=$arItem['PROPERTIES']['G_COUNTRY_CODE']['VALUE']?>"><?=$arItem['PROPERTIES']['G_COUNTRY']['VALUE']?></p>
        </div>
        <div class="table__cell hidden--tablet">
          <? if($arItem['PROPERTIES']['SPECIFICATION']['VALUE']) {?>
          <a href="<?=CFile::GetPath($arItem['PROPERTIES']['SPECIFICATION']['VALUE'])?>" class="link link--download" target="_blank"></a>
          <?}?>
        </div>
        <div class="table__cell table__cell--clear">
          <span class="btn btn--orange btn--tag product-row__tag" 
            data-param-id="18"
            data-event="jqm" 
            data-name="callprice" 
            data-title="Узнать цену на <?=$arItem['NAME']?>"
            data-product-id="<?=$arItem['ID']?>" 
            data-product="<?=$arItem['NAME']?>">
            Узнать цену
          </span>
        </div>
      </div>
      <?}?>
      
<? } else { ?>
  <div class="table">
    <div class="table__head">
      <div class="table__row table__row--th">
        
        <div class="table__cell table__cell--th">
          Модель генератора
        </div>
        <div class="table__cell table__cell--th hidden--mobiles">
          Мощность
          <div style="display:flex;margin-top:10px;">
            <span class="col-sm-6">Основная</span><span class="col-sm-6">Резервная</span>
          </div>
        </div>
        <div class="table__cell table__cell--th hidden--mobiles">
          Страна
        </div>
        <div class="table__cell table__cell--th hidden--tablet">Скачать брошюру</div>
        <div class="table__cell table__cell--th hidden--mobiles">Узнать цену</div>
      </div>
    </div>
    <div class="table__body">
      <div class="table__row product-row"></div>
      <?
          foreach($arResult['ITEMS'] as $arItem) {
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
          </div>
        </div>
        <div class="table__cell">
          <div class="product-row__power power">
            <div class="power__text">Основная мощность:</div>
            <p class="power__item"><?=$arItem['PROPERTIES']['G_POWER_MAIN']['VALUE']?> кВт</p>
          </div>
        </div>
        <div class="table__cell">
          <div class="product-row__power power">
            <div class="power__text">Резервная мощность:</div>
            <p class="power__item"><?=$arItem['PROPERTIES']['G_POWER_RESERVE']['VALUE']?> кВт</p>
          </div>
        </div>
        <div class="table__cell">
          <p class="product-row__engine product-row__engine--<?=$arItem['PROPERTIES']['G_COUNTRY_CODE']['VALUE']?>"><?=$arItem['PROPERTIES']['G_COUNTRY']['VALUE']?></p>
        </div>
        <div class="table__cell hidden--tablet">
          <? if($arItem['PROPERTIES']['SPECIFICATION']['VALUE']) {?>
          <a href="<?=CFile::GetPath($arItem['PROPERTIES']['SPECIFICATION']['VALUE'])?>" class="link link--download" target="_blank"></a>
          <?}?>
        </div>
        <div class="table__cell table__cell--clear">
          <span class="btn btn--orange btn--tag product-row__tag" 
            data-param-id="18"
            data-event="jqm" 
            data-name="callprice" 
            data-title="Узнать цену на <?=$arItem['NAME']?>"
            data-product-id="<?=$arItem['ID']?>" 
            data-product="<?=$arItem['NAME']?>">
            Узнать цену
          </span>
        </div>
      </div>
      <?}?>
    </div>
</div>
<? } ?>
  <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
  <? endif; ?>


<?
  if (array_key_exists('is_ajax', $_REQUEST) && $_REQUEST['is_ajax']=='y') {
    die();
  }
?>