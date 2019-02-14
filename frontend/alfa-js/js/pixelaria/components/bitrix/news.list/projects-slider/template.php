<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?><div class="slider slider--projects">
  <div class="projects" style="display:block">
    <?foreach($arResult["ITEMS"] as $key => $arItem){ ?>
      <a class="projects__item project" href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="text-decoration: none;">
        <div class="project__image">
          <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="" class="img img--responsive">
			</div>
        <div class="project__desc">
          <div class="project__customer"><span>Заказчик: </span> <?=$arItem['PROPERTIES']['CLIENT_NAME']['VALUE']?></div>
          <div class="project__icon"><img src="<?=CFile::GetPath($arItem["PROPERTIES"]["CLIENT_LOGO"]["VALUE"])?>" alt="" class="img img--responsive"></div>
          <p class="project__title"><?=$arItem["NAME"]?></p>
          
        </div>
        <div class="project__bottom">
          <div class="project__info project__info--orange"><?=$arItem['PROPERTIES']['INDUSTRY']['VALUE']?></div>
          <div class="project__info"><?=$arItem['IBLOCK_SECTION_NAME']?> г.</div>
        </div>
      </a>
    <?}?>
  </div>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>