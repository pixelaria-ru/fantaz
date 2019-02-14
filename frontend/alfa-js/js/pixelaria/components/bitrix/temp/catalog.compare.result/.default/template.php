<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <h2 class="section__title">Сравнение (5 моделей)</h2>
    <div class="compare">
        <div class="compare__param">
          <div class="compare-param">
            <p class="compare-param__title">Добавить товары</p>
            <a href="/catalog/" class="compare-param__text">Переход в каталог</a>
            <a href="/catalog/" class="link link--add-product"></a>
          </div>
          <div class="compare-param">
            <div class="radioblock">
              <input class="radioblock__input" name="type" type="hidden">
              <div class="radioblock__item radioblock__item--active">
                Все характеристики
              </div>
              <div class="radioblock__item">
                Только различия
              </div>
            </div>
          </div>
          <div class="compare-info">Для сравнения всех добавленных товаров двигайтесь вправо</div>
        </div>
        <div class="compare__value main__clipper clipper-1">
            <div class="main__scroller scroller-1">
                <div class="compare__block compare__block--nomt">
                    <div class="compare__values">
                        <?foreach($arResult['ITEMS'] as $arItem){?>
                            <div class="compare__product compare-product">
                                <div class="compare-product__image"><img src="./img/product.png" alt="" class="img img--responsive"></div>
                                <div class="compare-product__title"><?=$arItem['NAME']?></div>
                                <span 
                                    class="compare-product__btn btn btn--orange" 
                                    data-param-id="<?=$arItem['ID']?>" 
                                    data-event="jqm" 
                                    data-name="order_product"
                                    data-product="<?=$arItem['NAME']?>"
                                >
                                    Заказать
                                </span>
                            </div>
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


<div class="el-block-compare-view">
    <div class="block-carousel-wrap js-compare-carousel-wrap">
        <div class="block-head"></div>
        <div class="block-links">
            <a class="add-goods" href="/oborudovanie/">Добавить товары</a>
            <a class="<?if($arResult['DIFFERENT'] != 'Y'){?>selected <?}?>el-button" href="?SECTION_ID=<?=$_REQUEST['SECTION_ID']?>&DIFFERENT=N">Все характеристики</a>
            <a class="<?if($arResult['DIFFERENT'] == 'Y'){?>selected <?}?>el-button" href="?SECTION_ID=<?=$_REQUEST['SECTION_ID']?>&DIFFERENT=Y">Показать различия</a>

            <div class="block-compare-table">
                <table>
                    <tr>
                        <td class="head-border">Характеристики</td>
                    </tr>
                    
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
                		<tr>
                			<td><?=$arProperty["NAME"]?></td>
                		</tr>
              		    <?}?>
                    <?}?>                    
                </table>
            </div>
        </div>

        <div class="block-line">
            <?foreach($arResult['ITEMS'] as $arItem){?>
                <div>
                    <div class="el-popular-model">
                        <?if($arItem['PREVIEW_PICTURE']){?>
                            <div class="block-image">
                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                    <img src="<?=resize($arItem['PREVIEW_PICTURE'],262,170)?>" alt="">
                                </a>
                            </div>
                        <?}?>
                        <div class="block-name">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                        </div>
                        
                        <div class="block-price">&nbsp;
                            <?showField('',$arItem['PROPERTIES']['PRICE']['VALUE'],'Ք')?>
                        </div>
                        
                    </div>
    
                    <div class="block-compare-table">
                        <table>
                            <tr>
                                <td><a class="delete" href="?SECTION_ID=<?=$_REQUEST['SECTION_ID']?>&action=DELETE_FROM_COMPARE_RESULT&ID=<?=$arItem['ID']?>">Удалить</a></td>
                            </tr>
    
                            <?foreach($arResult["SHOW_PROPERTIES"] as $code=>$arProperty){
                                if ($arResult['DIFFERENT']){
                                    $hideRow = 1;
                        			foreach($arResult['ITEMS'] as $arElement){
                        			    if($arElement['PROPERTIES'][$code]["VALUE"] != $arItem['PROPERTIES'][$code]["VALUE"]){
                                            $hideRow = 0;
                                        }
                                    }
                        		}?>
                                <?if(!$hideRow){?>                                
                            		<tr>
                            			<td>
                                            &nbsp;<?=$arItem['DISPLAY_PROPERTIES'][$code]["DISPLAY_VALUE"]?>
                                        </td>
                            		</tr>
                                <?}?>                                    
                      		<?}?>
                        </table>
                    </div>
                </div>
            <?}?>
            
        </div>

        <div class="clear"></div>
    </div>
</div>