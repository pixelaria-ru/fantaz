<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="categories">
	<?foreach ($arResult['SECTIONS'] as &$arSection){?>
		<div class="categories__item category">
	    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="category__link">
	      <div class="category__img">
	        <img class="img img--responsive" src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection['NAME']?>">
	      </div>
	      <p class="category__title"><?=$arSection['NAME']?></p>
	    </a>
	  </div>	
	<?}?>
</div>