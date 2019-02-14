<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="el-block-product-view">
    <div class="js-mobile-prod-info-holder"></div>
    <div class="left-layer">
        <?if($arResult['PROPERTIES']['IMAGES']['VALUE']){?>
            <div class="block-image js-product-image">    
                <div class="big">
                    <div class="line">
                        <div><a class="js-zoom" href="<?=resize($arResult['PREVIEW_PICTURE'],454,374)?>"><img src="<?=resize($arResult['PREVIEW_PICTURE'],454,374)?>" alt=""></a></div>
                        <?foreach($arResult['PROPERTIES']['IMAGES']['VALUE'] as $image){?>
                            <div><a class="js-zoom" href="<?=resize($image,454,374)?>"><img src="<?=resize($image,454,374)?>" alt=""></a></div>
                        <?}?>
                    </div>
                </div>
                
                <div class="small">
                    <div><a href="javascript: void(0);"><img src="<?=resize($arResult['PREVIEW_PICTURE'],80,46)?>" alt=""></a></div>
                    <?foreach($arResult['PROPERTIES']['IMAGES']['VALUE'] as $image){?>
                        <div><a href="javascript: void(0);"><img src="<?=resize($image,80,46)?>" alt=""></a></div>
                    <?}?>
                </div>
            </div>
        <?}?>
        <div class="block-links hide-on-small">
            <input class="comparre" id="compareid_<?=$arResult['ID']?>" type="checkbox" onchange="compare_tov(<?=$arResult['ID']?>)" <?if($_SESSION['CATALOG_COMPARE_LIST'][1]['ITEMS'][$arResult['ID']]){?> checked=""<?}?> />
            <label for="compareid_<?=$arResult['ID']?>"></label>
            <?if($arResult['SECTIONS_CHAIN'][0] == 2){?>
                <a href="#sovmest">Проверить совместимость</a>
            <?}?>
        </div>
    </div>

    <div class="right-layer">
        <div class="js-mobile-prod-info-replace">
            <!--h1 class="name"><?=$arResult['NAME']?></h1-->
            
            <?showField('<div class="article">Арт. ',$arResult['PROPERTIES']['ARTICUL']['VALUE'],'</div>')?>
        </div>

        
        <?showField('<div class="produce-name">Производитель: ',$arResult['PROPERTIES']['MANUFACTURER']['VALUE'],'<img src="'.resize($arResult['PROPERTIES']['MANUFACTURER']['PICTURE'],25,17).'" alt=""></div>')?>            
        
        <?=$arResult['PREVIEW_TEXT']?>
        
        <!--table class="characteristics-table">
            <?foreach($arResult['DISPLAY_PROPERTIES'] as $arProperty){?>
            <tr>
                <td><?=$arProperty['NAME']?>:</td>
                <td><?=$arProperty['DISPLAY_VALUE']?></td>
            </tr>
            <?}?>
        </table-->

        <?showField('<br><br><div class="avail-block">Есть в наличии: <span class="count">',$arResult['PROPERTIES']['COUNT']['VALUE'],' шт.</span></div>')?>

        <div class="block-button">
            <div class="price">
                <?if($arResult['PROPERTIES']['PRICE']['VALUE']){?>            
                    <?=$arResult['PROPERTIES']['PRICE']['VALUE']?> <span class="currency">&#x584;</span><br>
                    <span class="small">*Цена указана с НДС</span>
                <?}else{?>                    
                    <span class="small">Цена по запросу</span>
                <?}?>                
            </div>

            <a href="#" class="el-button orange" onclick="popupOpen('.js-popup-product-order');">Заказать</a>
        </div>
    
        <div class="block-links show-on-small">
            <a href="#">Проверить совместимость</a>
        </div>
    </div>

    <div class="clear"></div>

</div>
<div class="el-block-tabs">
    <div class="block-tabs js-tabs-elements">
        <?if($arResult['DETAIL_TEXT']){$selected = 1;?>
            <a class="selected" href="javascript:void(0);" data-tab="1">Описание</a>
        <?}?>
        
        
            <a<?if(!$selected){$selected = 1;?> class="selected"<?}?> href="javascript:void(0);" data-tab="2">Характеристики</a>
        
        
        <?if($arResult['PROPERTIES']['COMP']['VALUE']){?>
            <a<?if(!$selected){$selected = 1;?> class="selected"<?}?> href="javascript:void(0);" data-tab="3">Комплектация</a>
        <?}?>
        
        <?if($arResult['PROPERTIES']['DOCS']['VALUE']){?>
            <a<?if(!$selected){$selected = 1;?> class="selected"<?}?> href="javascript:void(0);" data-tab="4">Документация</a>
        <?}?>
        
        <?if($arResult['PROPERTIES']['SERVICES']['VALUE']){?>
            <a<?if(!$selected){$selected = 1;?> class="selected"<?}?> href="javascript:void(0);" data-tab="5">Доп. услуги</a>
        <?}?>
        
        <a<?if(!$selected){$selected = 1;?> class="selected"<?}?> href="javascript:void(0);" data-tab="6">Отзывы</a>
        
        <div class="clear"></div>
    </div>

    <div class="block-tabs-content">
        <?if($arResult['DETAIL_TEXT']){$opened = 1;?>
            <div class="js-tab tab-1">
                <div class="el-block-prod-description">
                    <div class="block-head">Описание товара</div>
                    <?=htmlspecialchars_decode($arResult['DETAIL_TEXT'])?>
                </div>
            </div>
        <?}?>
        
        
        <div class="js-tab tab-2"<?if($opened){?> style="display: none;"<?} else $opened = 1;?>>
            <div class="el-block-prod-characteristics">
                <div class="block-head">Характеристики  <?=strtolower($arResult['NAME'])?></div>
                <table>
                <?foreach($arResult['DISPLAY_PROPERTIES'] as $arProperty){
                    if($arProperty['DISPLAY_VALUE']){?>
                        <tr>
                            <td>
                                <?=$arProperty['NAME']?>
                                <div class="el-hover-hint">
                                    <i class="icon"></i>
                                    <?if($arProperty['HINT']){?>
                                        <span class="hint"><?=$arProperty['HINT']?></span>
                                    <?}?>
                                </div>
                            </td>
                            <td>
                                <?=is_array($arProperty['DISPLAY_VALUE']) ? implode(', ',$arProperty['DISPLAY_VALUE']) : $arProperty['DISPLAY_VALUE']?>
                            </td>
                        </tr>
                    <?}?>
                <?}?>
                </table>
            </div>
        </div>
        
        <?if($arResult['PROPERTIES']['COMP']['VALUE']){?>
            <div class="js-tab tab-3"<?if($opened){?> style="display: none;"<?} else $opened = 1;?>>
                <?=htmlspecialchars_decode($arResult['PROPERTIES']['COMP']['VALUE']['TEXT'])?>
                <br /><br />
            </div>
        <?}?>
        
        <?if($arResult['PROPERTIES']['DOCS']['VALUE']){?>
            <div class="js-tab tab-4"<?if($opened){?> style="display: none;"<?} else $opened = 1;?>>
                <div class="el-block-documentation-list">
                    <div class="block-head">Документация <?=strtolower($arResult['NAME'])?></div>
                    <ul>
                        <?foreach($arResult['PROPERTIES']['DOCS']['VALUE'] as $file){
                            $arFile = CFile::GetFileArray($file);?>
                            <li><a class="doc" href="<?=$arFile['SRC']?>"><?=$arFile['DESCRIPTION'] ? $arFile['DESCRIPTION'] : $arFile['ORIGINAL_NAME']?></a></li>
                        <?}?>
                    </ul>
                </div>
            </div>
        <?}?>
        
        <?if($arResult['PROPERTIES']['SERVICES']['VALUE']){?>
            <div class="js-tab tab-5"<?if($opened){?> style="display: none;"<?} else $opened = 1;?>>
                <div class="el-additional-service-links">
                    <div class="block-head">Дополнительные услуги <?=strtolower($arResult['NAME'])?></div>
                    
                    <ul>
                        <?foreach($arResult['PROPERTIES']['SERVICES']['DISPLAY_VALUE'] as $service){?>
                            <li><a href="<?=$service['DETAIL_PAGE_URL']?>"><?=$service['NAME']?></a></li>
                        <?}?>
                    </ul>
                </div>
            </div>
        <?}?>
        <div class="js-tab tab-6"<?if($opened){?> style="display: none;"<?} else $opened = 1;?>>
            <div class="el-block-review-list">
                <div class="block-head">Отзывы о <?=strtolower($arResult['NAME'])?></div>
                <?GLOBAL $arFilter;
                $arFilter['UF_EQUIPMENTMENT'] = $arResult['ID'];
                $arFilter['UF_ACTIVE'] = true;?>
                <?$APPLICATION->IncludeComponent(
                	"bitrix:highloadblock.list",
                	"",
                	Array(
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",   
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                		"BLOCK_ID" => "2",
                		"CHECK_PERMISSIONS" => "N",
                		"DETAIL_URL" => "",
                		"FILTER_NAME" => "arFilter",
                		"PAGEN_ID" => "page",
                		"ROWS_PER_PAGE" => "3"
                	)
                );?>

                <div class="block-buttons">
                    <a href="javascript: void(0);" class="el-button" onclick="popupOpen('.js-popup-review-form');">Оставить отзыв</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="el-block-popup js-popup-review-form" style="display: none">
    <div class="dark" onclick="popupClose('.js-popup-review-form');"></div>
    <div class="block-popup">
        <div class="head">
            <a href="javascript: void(0);" class="close" onclick="popupClose('.js-popup-review-form');">&nbsp;</a>
            Оставить отзыв
        </div>
        
        <div id="message"></div>
        
        <form id="request_form" action="/ajax/add_review.php" method="post">
            <input type="hidden" name="ID" value="<?=$arResult['ID']?>" />
            <div class="body">
                <table>
                    <tr>
                        <td><input type="text" name="name" placeholder="Имя"/></td>
                    </tr>

                    <tr>
                        <td>
                            <textarea name="text" placeholder="Текст отзыва *"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td><input name="request" type="submit" value="Отправить" class="el-button orange"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
<div class="el-block-popup js-popup-product-order" style="display: none">
        <div class="dark" onclick="popupClose('.js-popup-product-order');"></div>
        <div class="block-popup order-popup">
            <?$APPLICATION->IncludeComponent(
            	"dex:form", 
            	"order", 
            	array(
            		"AJAX_MODE" => "Y",
            		"AJAX_OPTION_ADDITIONAL" => "",
            		"AJAX_OPTION_HISTORY" => "N",
            		"AJAX_OPTION_JUMP" => "N",
            		"AJAX_OPTION_STYLE" => "Y",
            		"EMAIL_TO" => "cyberdexx@gmail.com",
            		"EVENT_MESSAGE_ID" => array(
            			0 => "7",
            		),
            		"FIELDS_LIST" => array(
            			0 => "Имя (компания)",
            			1 => "Телефон",
            			2 => "Email",
            			3 => "Выберите количество товара",
            			4 => "Дополнительные пожелания",
            			5 => "",
            		),
            		"FIELD_0_TYPE" => "text",
            		"FIELD_1_TYPE" => "tel",
            		"FIELD_2_TYPE" => "email",
            		"FIELD_3_TYPE" => "list",
            		"FIELD_4_TYPE" => "textarea",
            		"FORM_TITLE" => "Заказать ".$arResult["NAME"],
            		"OK_TEXT" => "Спасибо, ваше сообщение принято",
            		"REQUIRED_FIELDS" => array(
            			0 => "0",
            			1 => "1",
            			2 => "2",
            		),
            		"USE_CAPTCHA" => "N",
            		"USE_RECAPTCHA" => "N",
            		"COMPONENT_TEMPLATE" => "order",
            		"FIELD_3_LIST" => array(
            			0 => "1",
            			1 => "2",
            			2 => "3",
            			3 => "4",
            			4 => "5",
            			5 => "6",
            			6 => "7",
            			7 => "8",
            			8 => "9",
            			9 => "10",
            			10 => "15",
            			11 => "20",
            			12 => "50",
            			13 => "100",
            		)
            	),
            	false
            );?>
        </div>
    </div>
</div>

<?$APPLICATION->IncludeComponent(
	"dex:data", 
	"mp2", 
	array(
		"18e6d738ebdf47e04fd3bfcca9c795d0" => "Узнайте какое оборудование вам подходит",
		"7274b17e2f836468e35dbf8309c4abb8" => "<a class=\"link nowrap\" href=\"#\">Написать специалисту онлайн</a>",
		"890702076358d62a04c1950cb70aca78" => "Помочь с  выбором?",
		"8da2b56e48b44356b282e9a5e3133a8c" => "",
		"BLOCK_LIST" => array(
			0 => "Контент",
			1 => "",
		),
		"FIELDS_LIST" => array(
			0 => "Фон",
			1 => "Заголовок блока",
			2 => "Заголовок 1",
			3 => "Заголовок 2",
			4 => "Список ссылок 1",
			5 => "Список ссылок 2",
			6 => "",
		),
		"TYPE0" => "1",
		"TYPE1" => "0",
		"TYPE2" => "0",
		"TYPE3" => "0",
		"TYPE4" => "8",
		"TYPE5" => "8",
		"d5c50da1919a8c0c6e292609cb0d871b" => "Уточнить наличие, срок поставки и стоимость оборудования",
		"e5cea9864814fe6ccc33fe3dfd29f76d" => "<a class=\"link nowrap\" href=\"#\">Быстрый запрос</a>",
		"ee23591fbcff45592e6d7de7392a1afc" => "/upload/bg-2.png",
		"COMPONENT_TEMPLATE" => "mp2",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000"
	),
	false
);?> 

<?if($arResult['SECTIONS_CHAIN'][0] == 2){
    $arFilter = Array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'DEPTH_LEVEL'=>3);
    $db_list = CIBlockSection::GetList(Array($by=>"UF_MANUFACTURER"), $arFilter, true, array('UF_MANUFACTURER'));
    while($ar_result = $db_list->GetNext()) $serias[$ar_result['UF_MANUFACTURER']][] = $ar_result;?>

    <div id="sovmest" class="el-check-compatibility">
        <div class="el-mainer">
            <div class="block-head">
                Проверьте совместимость с вашим ИБП
            </div>
            <div class="block-form">
                <table>
                    <tr>
                        <td class="caption-cell ta-left">Производитель:</td>
                        <td>
                            <select onchange="$('.seriaSelect').hide();$('.seriaSelectSpan, .seriaSelect'+$(this).find('option:selected').val()).show()" class="js-select-style">
                                <option>Выберите производителя</option>
                                <?$arSelect = Array("ID", "NAME");
                                $arFilter = Array("IBLOCK_ID"=>IntVal(2), "ACTIVE"=>"Y");
                                $res = CIBlockElement::GetList(Array('NAME'=>'ASC'), $arFilter, false, Array("nPageSize"=>150), $arSelect);
                                while($ob = $res->GetNextElement()){
                                    $arFields = $ob->GetFields();
                                    if($serias[$arFields['ID']]){?>
                                        <option value="<?=$arFields['ID']?>"><?=$arFields['NAME']?></option>
                                    <?}?>
                                <?}?>
                            </select>
                        </td>
                        <td class="separate"></td>
                        <td class="caption-cell">
                            <div class="seriaSelectSpan" style="display: none;">Серия:</div>
                        </td>
                        <td>
                            <?foreach($serias as $man=>$seria){$i++;?>
                                <div class="seriaSelect seriaSelect<?=$man?>"style="display: none;">
                                    <select class="js-select-style" onchange="showSovmestimost($(this).find('option:selected').val())">
                                        <option>Выберите серию</option>
                                        <?foreach($seria as $el){?>
                                            <option value="<?if(in_array($el['ID'],$arResult['PROPERTIES']['IBP']['VALUE'])){?>sovmestim<?}else{?>nesovmestim<?}?>"><?=$el['NAME']?></option>
                                        <?}?>                                        
                                    </select>
                                </div>
                            <?}?>
                        
                        </td>
                    </tr>
                    <tr class="total sovmestim" style="display: none;">
                        <td colspan="3" style="width: 90%;">
                            <?=$arResult['NAME']?><span class="color1"> совместим</span> с выбранным источником бесперебойного питания.
                        </td>
                        <td colspan="2" class="ta-right">
                            <a href="javascript:" onclick="popupOpen('.js-popup-product-order');" class="el-button orange">Заказать</a>
                        </td>
                    </tr>
                    <tr class="total nesovmestim" style="display: none;">
                        <td colspan="3" style="width: 90%;">
                            <?=$arResult['NAME']?> <span class="color">не совместим</span> с выбранным источником бесперебойного питания.
                        </td>
                        <td colspan="2" class="ta-right">
                            <a href="javascript:" onclick="popupOpen('.js-popup-product-order');" class="el-button orange">Все равно заказать</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?}?>

<?if($arResult['PROPERTIES']['OPTIONS']['VALUE']){?>

    <?GLOBAL $optionsFilter;
    $optionsFilter['ID'] = $arResult['PROPERTIES']['OPTIONS']['VALUE']?>
    
    <?$APPLICATION->IncludeComponent(
    	"bitrix:news.list", 
    	"oborudovanieDetailSlider", 
    	array(
            "NAME" => 'Дополнительные опции',
    		"ACTIVE_DATE_FORMAT" => "d.m.Y",
    		"ADD_SECTIONS_CHAIN" => "N",
    		"AJAX_MODE" => "N",
    		"AJAX_OPTION_ADDITIONAL" => "",
    		"AJAX_OPTION_HISTORY" => "N",
    		"AJAX_OPTION_JUMP" => "N",
    		"AJAX_OPTION_STYLE" => "Y",
    		"CACHE_FILTER" => "Y",
    		"CACHE_GROUPS" => "Y",
    		"CACHE_TIME" => "36000000",
    		"CACHE_TYPE" => "A",
    		"CHECK_DATES" => "Y",
    		"DETAIL_URL" => "",
    		"DISPLAY_BOTTOM_PAGER" => "N",
    		"DISPLAY_TOP_PAGER" => "N",
    		"FIELD_CODE" => array(
    			0 => "",
    			1 => "",
    		),
    		"FILTER_NAME" => "optionsFilter",
    		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
    		"IBLOCK_ID" => $arParams['IBLOCK_ID'],
    		"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
    		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    		"INCLUDE_SUBSECTIONS" => "Y",
    		"MESSAGE_404" => "",
    		"NEWS_COUNT" => "12",
    		"PAGER_BASE_LINK_ENABLE" => "N",
    		"PAGER_DESC_NUMBERING" => "N",
    		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    		"PAGER_SHOW_ALL" => "N",
    		"PAGER_SHOW_ALWAYS" => "N",
    		"PAGER_TEMPLATE" => ".default",
    		"PAGER_TITLE" => "",
    		"PARENT_SECTION" => "",
    		"PARENT_SECTION_CODE" => "",
    		"PREVIEW_TRUNCATE_LEN" => "",
    		"PROPERTY_CODE" => array(
    			0 => "",
    			1 => "MANUFACTURER",
    			2 => "",
    		),
    		"SET_BROWSER_TITLE" => "N",
    		"SET_LAST_MODIFIED" => "N",
    		"SET_META_DESCRIPTION" => "N",
    		"SET_META_KEYWORDS" => "N",
    		"SET_STATUS_404" => "N",
    		"SET_TITLE" => "N",
    		"SHOW_404" => "N",
    		"SORT_BY1" => "RAND",
    		"SORT_BY2" => "SORT",
    		"SORT_ORDER1" => "DESC",
    		"SORT_ORDER2" => "ASC",
    		"STRICT_SECTION_CHECK" => "N",
    		"COMPONENT_TEMPLATE" => "proizvoditeli_slider"
    	),
    	false
    );?>
<?}?>

<?if($arResult['PROPERTIES']['ANALOGS']['VALUE']){?>
    
    <?GLOBAL $analogsFilter;
    $analogsFilter['ID'] = $arResult['PROPERTIES']['ANALOGS']['VALUE']?>
    
    <?$APPLICATION->IncludeComponent(
    	"bitrix:news.list", 
    	"oborudovanieSlider", 
    	array(
            "NAME" => 'Рекомендуемые аналоги',
    		"ACTIVE_DATE_FORMAT" => "d.m.Y",
    		"ADD_SECTIONS_CHAIN" => "N",
    		"AJAX_MODE" => "N",
    		"AJAX_OPTION_ADDITIONAL" => "",
    		"AJAX_OPTION_HISTORY" => "N",
    		"AJAX_OPTION_JUMP" => "N",
    		"AJAX_OPTION_STYLE" => "Y",
    		"CACHE_FILTER" => "Y",
    		"CACHE_GROUPS" => "Y",
    		"CACHE_TIME" => "36000000",
    		"CACHE_TYPE" => "A",
    		"CHECK_DATES" => "Y",
    		"DETAIL_URL" => "",
    		"DISPLAY_BOTTOM_PAGER" => "N",
    		"DISPLAY_TOP_PAGER" => "N",
    		"FIELD_CODE" => array(
    			0 => "",
    			1 => "",
    		),
    		"FILTER_NAME" => "analogsFilter",
    		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
    		"IBLOCK_ID" => $arParams['IBLOCK_ID'],
    		"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
    		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    		"INCLUDE_SUBSECTIONS" => "Y",
    		"MESSAGE_404" => "",
    		"NEWS_COUNT" => "12",
    		"PAGER_BASE_LINK_ENABLE" => "N",
    		"PAGER_DESC_NUMBERING" => "N",
    		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    		"PAGER_SHOW_ALL" => "N",
    		"PAGER_SHOW_ALWAYS" => "N",
    		"PAGER_TEMPLATE" => ".default",
    		"PAGER_TITLE" => "",
    		"PARENT_SECTION" => "",
    		"PARENT_SECTION_CODE" => "",
    		"PREVIEW_TRUNCATE_LEN" => "",
    		"PROPERTY_CODE" => array(
    			0 => "",
    			1 => "MANUFACTURER",
    			2 => "",
    		),
    		"SET_BROWSER_TITLE" => "N",
    		"SET_LAST_MODIFIED" => "N",
    		"SET_META_DESCRIPTION" => "N",
    		"SET_META_KEYWORDS" => "N",
    		"SET_STATUS_404" => "N",
    		"SET_TITLE" => "N",
    		"SHOW_404" => "N",
    		"SORT_BY1" => "RAND",
    		"SORT_BY2" => "SORT",
    		"SORT_ORDER1" => "DESC",
    		"SORT_ORDER2" => "ASC",
    		"STRICT_SECTION_CHECK" => "N",
    		"COMPONENT_TEMPLATE" => "proizvoditeli_slider"
    	),
    	false
    );?>
<?}?>
<div>