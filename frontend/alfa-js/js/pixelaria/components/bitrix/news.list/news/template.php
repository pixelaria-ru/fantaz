<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="news">
  <?foreach($arResult["ITEMS"] as $key => $arItem){?>
  <?
    $count_max = 120;
    $_preview = $arItem['PREVIEW_TEXT'];
    $preview = $_preview;
    if(mb_strlen($_preview, 'utf-8') > ($count_max + 3)){
      // обрезаем строку
      $sub_str = mb_substr($_preview, 0, $count_max, 'utf-8');
      // удаляем пробелы в начале и конце обрезанной строки, и дописываем в конец три точки
      $preview = trim($sub_str) . "...";
      // добавляем к тексту атрибут title, для вывода подсказки при наведении
  }?>
  <a class="news__item article" href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="text-decoration: none">
    <div class="article__img">
      <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" class="img img--responsive">
    </div>
    <div class="article__desc">
      <p class="article__title"><?=$arItem["NAME"]?></p>
      <? if ($arItem['PROPERTIES']['DATE']['VALUE']) {?>
      <p class="article__date" style="color:#4D4D57;"><?=$arItem['PROPERTIES']['DATE']['VALUE']?></p>
      <?}?>
      <p class="article__text"><?=$preview?></p>
    </div>
  </a>
  <?}?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>