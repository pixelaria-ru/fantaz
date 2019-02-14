<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 
$endings = array('модель','модели','моделей');

function getNumEnding($number, $endingArray){
  $number = $number % 100;
  if ($number>=11 && $number<=19) {
      $ending=$endingArray[2];
  }
  else {
      $i = $number % 10;
      switch ($i)
      {
          case (1): $ending = $endingArray[0]; break;
          case (2):
          case (3):
          case (4): $ending = $endingArray[1]; break;
          default: $ending=$endingArray[2];
      }
  }
  return $ending;
}
?>


    <h2 class="section__title">Сравнение (<?=count($arResult['ITEMS'])?> <?=getNumEnding(count($arResult['ITEMS']),$endings)?>)</h2>
    <div class="compare">
        <div class="compare__param">
          <div class="compare-param">
            <p class="compare-param__title">Добавить товары</p>
            <a href="/catalog/diesel-power-stations/" class="compare-param__text">Переход в каталог</a>
            <a href="/catalog/diesel-power-stations/" class="link link--add-product"></a>
          </div>
          <div class="compare-param">
            <div class="radioblock">
              <input class="radioblock__input" name="type" type="hidden">
              <a href="?SECTION_ID=<?=$_REQUEST['SECTION_ID']?>&DIFFERENT=N" class="radioblock__item <?if($arResult['DIFFERENT'] != 'Y'){?>radioblock__item--active <?}?>">
                Все характеристики
              </a>
              <a href="?SECTION_ID=<?=$_REQUEST['SECTION_ID']?>&DIFFERENT=Y" class="radioblock__item <?if($arResult['DIFFERENT'] == 'Y'){?>radioblock__item--active <?}?>">
                Только различия
              </a>
            </div>
          </div>
          <div class="compare-info">Для сравнения всех добавленных товаров двигайтесь вправо</div>
        </div>
        <div class="compare__value main__clipper clipper-1">
            <div class="main__scroller scroller-1">
                <div class="compare__block compare__block--nomt">
                    <div class="compare__values">
                        <?foreach($arResult['ITEMS'] as $arItem){?>
                            <a class="compare__product compare-product" href="<?=$arItem['DETAIL_PAGE_URL']?>" style="text-decoration: none;">
                                <div  data-target="<?=$arItem['ID']?>" class="modal-close popup__closer closer remove_from_compare"><b></b><b></b><b></b><b></b></div>
                                <div class="compare-product__image"><img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>" alt="" class="img img--responsive"></div>
                                <div class="compare-product__desc">
                                  <div class="compare-product__title"><?=$arItem['NAME']?></div>
                                  <span 
                                    class="compare-product__btn btn btn--orange" 
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
                            </a>
                        <?}?>
                    </div>
                </div>
            </div>
            <div class="main__track">
                <div class="main__free main__free--gray"></div>
                <div class="main__bar bar-1 main__bar--orange"></div>
            </div>
        </div>
    </div>
</div>
</section>
<section class="section section--pixelized">
    <div class="container">
        <div class="compare">
            <div class="compare__param compare__param--dn">
                <div class="compare__block">
                    <div class="compare__title">Характеристики</div>
                    <?foreach($arResult["SHOW_PROPERTIES"] as $code=>$arProperty){
                        if ($arResult['DIFFERENT']){
                            foreach($arResult['ITEMS'] as $arItem){
                                $hideRow = 1;
                                foreach($arResult['ITEMS'] as $arElement){
                                    if($arElement['PROPERTIES'][$code]["VALUE"] != $arItem['PROPERTIES'][$code]["VALUE"]){
                                        $hideRow = 0;
                                    }
                                }    
                            }
                        }?>
                        <?if(!$hideRow){?>                        
                            <div class="compare__item compare__item--orange"><?=$arProperty["NAME"]?></div>  
                        <?}?>
                    <?}?>     
                </div>
            </div>
            <div class="compare__value main__clipper clipper-2 _scrollbar">
              <div class="main__scroller scroller-2">
                <div class="compare__block">
                    <?foreach($arResult["SHOW_PROPERTIES"] as $code=>$arProperty){?>
                        <?  if ($arResult['DIFFERENT']){
                                $hideRow = 1;
                                foreach($arResult['ITEMS'] as $arElement){
                                    if($arElement['PROPERTIES'][$code]["VALUE"] != $arItem['PROPERTIES'][$code]["VALUE"]){
                                        $hideRow = 0;
                                    }
                                }
                        }?>              
                        <?if(!$hideRow){?> 
                        <div class="compare__values">
                            <p class="compare__title compare__title--dn"><?=$arProperty["NAME"]?></p>
                        <?foreach($arResult['ITEMS'] as $arItem){?>
                            <div class="compare-value compare__item"><?=$arItem['DISPLAY_PROPERTIES'][$code]["DISPLAY_VALUE"]?></div>
                        <?}?>
                        </div>
                        <?}?>
                    <?}?>
                </div>
              </div>
              <div class="main__track">
                <div class="main__free"></div>
                <div class="main__bar bar-2" style="width: 597px; left: 0px;"></div>
              </div>
            </div>
        </div>
    </div>
</section>


