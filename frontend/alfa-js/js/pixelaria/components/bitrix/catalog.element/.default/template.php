<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
  
  $this->setFrameMode(true);
  
  $properties = array();
  $m_props = array();
  $e_props = array();
  $g_props = array();
  $o_props = array();
  $s_props = array();


  foreach ($arResult['PROPERTIES'] as $property) {
    $properties[$property['CODE']] = $property['VALUE'];
  }
  //M_ENGINE_MF
  $arFilter = Array("IBLOCK_ID"=>IntVal(9), "ID"=>$arResult['PROPERTIES']['M_ENGINE_MF']['VALUE']);
  $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
  
  if($ob = $res->GetNextElement()){
      $arFields = $ob->GetFields();
      $arProps = $ob->GetProperties();
      $properties['M_ENGINE_MF'] = $arFields['NAME'];
      $arResult['PROPERTIES']['M_ENGINE_MF']['VALUE'] = $arFields['NAME'];
      //$arResult["ITEMS"][$key]['PROPERTIES']['MANUFACTURER']['COUNTRY'] = $arProps['MF_COUNTRY']['VALUE'];
      //$arResult["ITEMS"][$key]['PROPERTIES']['MANUFACTURER']['COUNTRY_CODE'] = $arProps['MF_COUNTRY_CODE']['VALUE'];
  }


  foreach ($arResult['PROPERTIES'] as $property) {
    $properties[$property['CODE']] = $property['VALUE'];
    if (is_array($property['VALUE'])) continue;

    if (substr( $property['CODE'], 0, 2 ) === "M_") {
      if ($property['VALUE'])
        $m_props[] = $property;
    } else if (substr( $property['CODE'], 0, 2 ) === "E_") {
      if ($property['VALUE'])
        $e_props[] = $property;
    } else if (substr( $property['CODE'], 0, 2 ) === "O_") {
      if ($property['VALUE'])
        $o_props[] = $property;
    } else if (substr( $property['CODE'], 0, 2 ) === "G_") {
      if ($property['VALUE'])
        $g_props[] = $property;
    } else if (substr( $property['CODE'], 0, 4 ) === "SYS_") {
      if ($property['VALUE'])
        $s_props[] = $property;
    }
  }

 

?>

    <div class="product-page">
        <div class="product-page__info">
          <h1 class="page__title product__title"><?=$properties['MODEL']?></h1>
          <div class="product__clear">
            <p class="product__category"><?=$properties['MANUFACTURER']?> <span>(<?=$properties['COUNTRY']?>)</span></p>
            <div class="checkbox checkbox--small product__checkbox">
              <input id="compare_<?=$arResult['ID']?>" name="product" class="checkbox__input" type="checkbox">
              <label onclick="add_to_compare(<?=$arResult['ID']?>)" class="checkbox__label" for="compare_<?=$arResult['ID']?>">Добавить к сравнению</label>
            </div>  
          </div>
          
        </div>
        <div class="product-page__img">
          <div class="row">
            <div class="product__image product__image--main col-md-9 col-lg-12">
              <?foreach ($properties['IMAGES'] as $image) {?>
                <img class="product__img" src="<?=CFile::GetPath($image)?>" alt="" data-id="<?=$image?>">    
              <?}?>
            </div>  
            <div class="product__images col-md-3 col-lg-12">
              <?foreach ($properties['IMAGES'] as $image) {?>
              <div class="product__image product__image--sm" data-target="<?=$image?>">
                <img src="<?=CFile::GetPath($image)?>" alt="" class="img img--responsive">
              </div>
              <?}?>
            </div>
          </div>
          
        </div>
        <div class="product-page__desc">
          <div class="product__params">
            <div class="product-params">
              <div class="product__param product-param product-param--flash-orange">
                <div class="product-param__title">
                  Основная мощность <span>(?)</span>:
                  <div class="product-param__help">
                    Небольшая подсказка с абзацем поясняющего текста и ссылкой на <a href="#" class="link link--orange">информационную страницу</a>
                  </div>
                </div>
                <div class="product-param__value"><?=$properties['M_POWER_MAIN_KVT']?> кВт / <?=$properties['M_POWER_MAIN_KVA']?> кВА</div>
              </div>
              <div class="product__param product-param product-param--engine">
                <div class="product-param__title">
                  Двигатель <span>(?)</span>:
                  <div class="product-param__help">
                    Небольшая подсказка с абзацем поясняющего текста и ссылкой на <a href="#" class="link link--orange">информационную страницу</a>
                  </div>
                </div>
                <div class="product-param__value"><?=$properties['M_ENGINE_MF']?> <?=$properties['M_ENGINE_MO']?></div>
              </div>
              <div class="product__param product-param product-param--electro">
                <div class="product-param__title">
                  Напряжение <span>(?)</span>:
                  <div class="product-param__help">
                    Небольшая подсказка с абзацем поясняющего текста и ссылкой на <a href="#" class="link link--orange">информационную страницу</a>
                  </div>
                </div>
                <div class="product-param__value"><?=$properties['VOLTAGE']?> В</div>
              </div>
              <div class="product__param product-param product-param--flash-white">
                <div class="product-param__title">
                  Резервная мощность <span>(?)</span>:
                  <div class="product-param__help">
                    Небольшая подсказка с абзацем поясняющего текста и ссылкой на <a href="#" class="link link--orange">информационную страницу</a>
                  </div>
                </div>
                <div class="product-param__value"><?=$properties['M_POWER_RESERVE_KVT']?> кВт / <?=$properties['M_POWER_RESERVE_KVA']?> кВА</div>
              </div>
              <div class="product__param product-param product-param--battery">
                <div class="product-param__title">
                  Генератор <span>(?)</span>:
                  <div class="product-param__help">
                    Небольшая подсказка с абзацем поясняющего текста и ссылкой на <a href="#" class="link link--orange">информационную страницу</a>
                  </div>
                </div>
                <div class="product-param__value"><?=$properties['M_GENERATOR']?></div>
              </div>
            </div>
          </div>
          <div class="product__types product-types">
            <div class="product-types__title">Вариант исполнения:</div>
            <ul class="product-types__list" data-target="product__btn">
              <li class="product-types__type product-types__type--active" data-type="Кожух">Кожух</li>
              <li class="product-types__type" data-type="Контейнер">Контейнер</li>
              <li class="product-types__type" data-type="Шасси">Шасси</li>
            </ul>
          </div>

          <div class="product__links">
            <span id="product__btn"
              class="link link--btn" 
              data-param-id="18" 
              data-event="jqm" 
              data-name="callprice"
              data-product-id="<?=$arResult['ID']?>" 
              data-product="<?=$arResult['NAME']?>"
              data-product-type="Кожух"
              style="margin-right: 15px;"
              >
              Заказать облуживание и ЗИП
            </span>

            <span id="product__btn"
              class="btn btn--orange" 
              data-param-id="18" 
              data-event="jqm" 
              data-name="callprice"
              data-product-id="<?=$arResult['ID']?>" 
              data-product="<?=$arResult['NAME']?>"
              data-product-type="Кожух"
              >
              Узнать цену
            </span>
          </div>
        </div>
      </div>
  </div>
</section>
<div class="section section--gray section--sm-2">
  <div class="container">
    <ul class="list list--flex">
      <li class="list__item"><a href="/services/delivery/" class="link">Доставка</a></li>
      <li class="list__item"><a href="/services/leasing/" class="link">Лизинг</a></li>
      <li class="list__item"><a href="/services/rent/" class="link">Аренда</a></li>
      <li class="list__item"><a href="/guarantees/" class="link">Гарантии</a></li>
      <li class="list__item"><a href="/about/sertificates/" class="link">Сертификаты</a></li>
    </ul>
  </div>
</div>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?=$arResult['PREVIEW_TEXT']?>
      </div>
      <div class="col-lg-4 section__links">
        <?if ($properties['SPECIFICATION']) {?>
          <a href="<?=CFile::GetPath($properties['SPECIFICATION'])?>" class="btn btn--inline btn--gray">Скачать спецификацию</a>
        <?}?>
        <a href="#" class="btn btn--inline btn--tr">Опросный лист</a>
      </div>
    </div>
  </div>
</section>
<section class="section section--pixelized">
  <div class="container">
    <div class="tabs">
      <div class="tabs__header">
        <div class="tabs__list">
        <div class="tabs__link tabs__link--active" data-target="tab-1">Характеристики</div>
        <div class="tabs__body tabs__body--active" data-name="tab-1">
          <div class="table-2">
            <div class="table-2__body baron baron__root baron__clipper _simple _scrollbar" style="height: 400px">
              <div class="baron__scroller">
              <? if ($m_props) { ?>
                <div class="table-2__row table-2__row--orange">
                  <div class="table-2__cell">Общие характеристики</div>
                  <div class="table-2__cell"></div>
                </div>
                <?foreach ($m_props as $m_prop) { ?>
                  <div class="table-2__row">
                    <div class="table-2__cell"><?=$m_prop['NAME'];?></div>
                    <div class="table-2__cell"><?=$m_prop['VALUE'];?></div>
                  </div>
                <?}?>
              <?}?>
              <? if ($e_props) { ?>
                <div class="table-2__row table-2__row--orange">
                  <div class="table-2__cell">Характеристики двигателя</div>
                  <div class="table-2__cell"></div>
                </div>
                <?foreach ($e_props as $e_prop) { ?>
                  <div class="table-2__row">
                    <div class="table-2__cell"><?=$e_prop['NAME'];?></div>
                    <div class="table-2__cell"><?=$e_prop['VALUE'];?></div>
                  </div>
                <?}?>
              <? } ?>
               <? if ($g_props) { ?>
                <div class="table-2__row table-2__row--orange">
                  <div class="table-2__cell">Характеристики генератора</div>
                  <div class="table-2__cell"></div>
                </div>
                <?foreach ($g_props as $g_prop) { ?>
                  <div class="table-2__row">
                    <div class="table-2__cell"><?=$g_prop['NAME'];?></div>
                    <div class="table-2__cell"><?=$g_prop['VALUE'];?></div>
                  </div>
                <?}?>
              <? } ?>
              <? if ($o_props) { ?>
                <div class="table-2__row table-2__row--orange">
                  <div class="table-2__cell">Другое оборудование</div>
                  <div class="table-2__cell"></div>
                </div>
                <?foreach ($o_props as $o_prop) { ?>
                  <div class="table-2__row">
                    <div class="table-2__cell"><?=$o_prop['NAME'];?></div>
                    <div class="table-2__cell"><?=$o_prop['VALUE'];?></div>
                  </div>
                <?}?>
              <? } ?>
              <? if ($s_props) { ?>
                <div class="table-2__row table-2__row--orange">
                  <div class="table-2__cell">Характеристики СУ</div>
                  <div class="table-2__cell"></div>
                </div>
                <?foreach ($s_props as $s_prop) { ?>
                  <div class="table-2__row">
                    <div class="table-2__cell"><?=$s_prop['NAME'];?></div>
                    <div class="table-2__cell"><?=$s_prop['VALUE'];?></div>
                  </div>
                <?}?>
              <? } ?>
              </div>
              <div class="baron__track">
                <div class="baron__control baron__up">▲</div>
                <div class="baron__free">
                    <div class="baron__bar"></div>
                </div>
                <div class="baron__control baron__down">▼</div>
              </div>
            </div>
          </div>
        </div>
        <div class="tabs__link" data-target="tab-2">Подробное описание</div>
        <div class="tabs__body" data-name="tab-2" style="line-height: 1.5;">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
        <div class="tabs__link" data-target="tab-3">Опции</div>
        <div class="tabs__body" data-name="tab-3">
          <h3 class="tabs__title">Список опций</h3>
          
          <? if ($properties['OPTIONS']) { ?>
          <ul class="list list--flash">
            <?foreach ($properties['OPTIONS'] as $option) {?>
              <li class="list__item" style="width: 49%; display: inline-block;"><?=$option?>
            <?}?>
          </ul>
          <?}?>
        </div>
        <div class="tabs__link" data-target="tab-4">Дополнительные услуги</div>
        <div class="tabs__body" data-name="tab-4">
          <?foreach ($properties['SERVICES'] as $service) {?>
            <p class="tabs__text"><?=$service?></p>
          <?}?>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>

<? if ($properties['RELATED_PROJECTS']) { ?>
<section class="section section--corners-1">
  <div class="container">
    <h2 class="section__title">Реализованные проекты на этом оборудовании</h2>
    <?$GLOBALS['filter_develop'] = Array('ACTIVE' => 'Y',"ID"=>$properties['RELATED_PROJECTS']);?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list", 
        "projects-slider", 
        array(
          "IBLOCK_TYPE" => "DATA",
          "IBLOCK_ID" => "4",
          "SET_TITLE" => "N",
          "SET_LAST_MODIFIED" => "N",
          "SET_STATUS_404" => "N",
          "SHOW_404" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "CACHE_TYPE" => "A",
          "CACHE_FILTER" => "N",
          "CACHE_GROUPS" => "N",
          "DISPLAY_TOP_PAGER" => "N",
          "DISPLAY_BOTTOM_PAGER" => "N",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_SHOW_ALL" => "N",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "DISPLAY_NAME" => "Y",
          "HIDE_LINK_WHEN_NO_DETAIL" => "N",
          "CHECK_DATES" => "N",
          "STRICT_SECTION_CHECK" => "N",
          "COMPONENT_TEMPLATE" => "projects-slider",
          "AJAX_MODE" => "N",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_ADDITIONAL" => "",
          "SET_BROWSER_TITLE" => "Y",
          "SET_META_KEYWORDS" => "Y",
          "SET_META_DESCRIPTION" => "Y",
          "INCLUDE_SUBSECTIONS" => "Y",
          "SORT_BY1" => "ACTIVE_FROM",
          "SORT_ORDER1" => "DESC",
          "SORT_BY2" => "SORT",
          "SORT_ORDER2" => "ASC",
          "FILTER_NAME" => "filter_develop",
          "FIELD_CODE" => array(
            0 => "",
            1 => "",
          ),
          "PROPERTY_CODE" => array(
            0 => "SERVICES",
            1 => "",
          ),
          "DETAIL_URL" => "",
          "CACHE_TIME" => "36000000",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "d.m.Y",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "PAGER_TEMPLATE" => ".default",
          "PAGER_TITLE" => "Новости",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "MESSAGE_404" => ""
        ),
        $component
      );?>  
    
  </div>
</section>
<?}?>
<? if ($properties['RELATED_PRODUCTS']) { ?>
<section class="section">
  <div class="container">
    <h2 class="section__title">Рекомендуемые аналоги</h2>
    <div class="slider slider--projects">
      <div class="related projects">
        <?foreach ($properties['RELATED_PRODUCTS'] as $related_id) { 
          $related = CIBlockElement::GetByID($related_id);
          if($related_obj = $related->GetNext()) {


          
          $arFilter = Array("IBLOCK_ID"=>$related_obj['IBLOCK_ID'], "ID"=>$related_obj['ID'], "ACTIVE"=>"Y");
          
          $arSelect = Array("ID", "IBLOCK_ID", "PREVIEW_PICTURE", "NAME","M_POWER_MAIN_KVT","M_POWER_MAIN_KVA","M_POWER_RESERVE_KVT","M_POWER_RESERVE_KVA");

          $res = CIBlockElement::GetList(Array(), $arFilter,false,false,$arSelect);



          if ($ob = $res->GetNextElement()){
            
            $arProps = $ob->GetProperties(); // свойства элемента
            
          }
          

        ?>
          <div class="related__item">
            <div class="related__img">
              <img src="<?=CFile::GetPath($related_obj['PREVIEW_PICTURE'])?>" alt="" class="img img--responsive">
            </div>
            <div class="related__desc">
              <p class="related__category"><?=$related_obj['CATEGORY']?></p>
              <p class="related__title"><?=$related_obj['NAME']?></p>  
              <ul class="list related__params">
                <li class="list__item related__param"><span>Основная мощность:</span> <?=$arProps['M_POWER_MAIN_KVT']['VALUE']?> кВт / <?=$arProps['M_POWER_MAIN_KVA']['VALUE']?> кВа</li>
                <li class="list__item related__param"><span>Двигатель:</span> <?=$arProps['ENGINE_MODEL']['VALUE']?> </li>
                <li class="list__item related__param"><span>Генератор:</span> <?=$arProps['GENERATOR']['VALUE']?></li>
              </ul>
            </div>
          </div>
        <?}}?>
      </div>
    </div>
  </div>
</section>
<?}?>