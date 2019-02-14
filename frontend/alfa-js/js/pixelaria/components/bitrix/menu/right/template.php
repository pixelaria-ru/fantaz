<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<? 
  $pages=explode('/', $APPLICATION->GetCurDir());
  $title="О компании";
  if ($pages[1]=='press') $title="Пресс-центр";
?>
<div class="aside">
  <p class="aside__title"><?=$title?></p>
  <ul class="aside__list">
    <?
      foreach($arResult as $arItem):
        if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
          continue;
        if ($arItem['PARAMS']['right']==1) continue;
    ?>
    <?if($arItem["SELECTED"]):?>
      <li class="aside__item"><a href="<?=$arItem["LINK"]?>" class="aside__link aside__link--active"><?=$arItem["TEXT"]?></a></li>
    <?else:?>
      <li class="aside__item"><a href="<?=$arItem["LINK"]?>" class="aside__link"><?=$arItem["TEXT"]?></a></li>
    <?endif?>
    <?endforeach?>
  </ul>
</div>
<?endif?>