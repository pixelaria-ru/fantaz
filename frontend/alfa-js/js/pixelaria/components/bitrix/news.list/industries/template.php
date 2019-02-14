<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="industries">
  <?foreach($arResult["ITEMS"] as $element){ ?>


    <a href="<?=$element['DETAIL_PAGE_URL'];?>" class="industries__item industry">
      <div class="industry__desc">
        <img src="<?=$element['PREVIEW_PICTURE']['SRC'];?>" alt="" class="img industry__img">  
        <p class="industry__title"><?=$element['NAME'];?></p>
        <p class="industry__text"><?=$element['PREVIEW_TEXT'];?></p>
      </div>
    </a> 

  <?}?>
</div>