<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) {
		return;
	}
}


$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");

$endings_des = array('электростанция','электростанции','электростанций');
$endings_find = array('найдена','найдены','найдено');

$more = $arResult['NavRecordCount'] - ($arResult['NavPageSize']*$arResult['NavPageNomer']) ;
$size = $arResult['NavPageSize'];

if ($more > $size)
  $morestring = 'Показать еще <span>'.$size.' из '.$more.'</span>';
else 
  $morestring = 'Показать еще <span>'.$more.'</span>';
?>


<div class="table__result" style="margin-top: 30px;">
  <div class="pull--left">По заданным параметрам <b><?=getNumEnding($arResult['NavRecordCount'],$endings_find)?> <span><?=$arResult['NavRecordCount']?></span> <?=getNumEnding($arResult['NavRecordCount'],$endings_des)?></b></div>
  <div class="pull--right"><a href="#section-filter" class="link link--orange scroll-to-target">Изменить условия отбора</a></div>
  <div class="clearfix"></div>
</div>
<noindex>
<?if($arResult["bDescPageNumbering"] === true):?>
	<?if ($arResult["NavPageNomer"] > 1):?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" id="infinity-next-page" class="btn btn--tr show-more">
      <?=$morestring?>
    </a>
	<?endif?>
<?else:?>
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" id="infinity-next-page" class="btn btn--tr show-more">
      <?=$morestring?>
    </a>
	<?endif?>
<?endif?>
</noindex>