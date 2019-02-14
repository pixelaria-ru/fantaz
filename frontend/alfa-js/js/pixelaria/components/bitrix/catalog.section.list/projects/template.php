<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<ul class="sort sort--links">
  <li class="sort__item">Показать:</li>
  <li class="sort__item"><a href="/projects/" class="sort__link <?if($APPLICATION->GetCurPage()=="/projects/")echo  "sort__link--active";?>">За всё время</a></li>
  <?foreach ($arResult['SECTIONS'] as &$arSection){?>
    <li class="sort__item">
      <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="sort__link <?if($APPLICATION->GetCurPage() == $arSection['SECTION_PAGE_URL']) echo "sort__link--active";?>">
        <?=$arSection['NAME']?>
          
      </a>
    </li>
  <?}?>
</ul>