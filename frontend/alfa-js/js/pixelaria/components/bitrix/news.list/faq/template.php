<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>


<?foreach($arResult["ITEMS"] as $key => $arItem){?>
  <div class="accordeon accordeon--faq">
    <div class="accordeon__preview accordeon__preview--big">
      <p class="accordeon__title"><?=$arItem['NAME'];?></p>
    </div>
    <div class="accordeon__body">
      <?=$arItem['PREVIEW_TEXT'];?>
    </div>
  </div>
<?}?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
  <?=$arResult["NAV_STRING"]?>
<?endif;?>