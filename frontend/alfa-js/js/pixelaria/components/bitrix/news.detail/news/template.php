<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(false);
?>
        <h1 class="page__title"><?=$arResult['NAME']?></h1>
        
        <div class="col-lg-5" style="float: right; margin-left: 15px; margin-bottom: 15px;">
          <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="" class="img img--responsive">
        </div>
        <p class="page__date"><?=$arResult['PROPERTIES']['DATE']['VALUE']?></p>
        <p class="page__subtitle page__subtitle--bold"><?=$arResult['PREVIEW_TEXT']?></p>    
        <div class="section--text">
        <?=$arResult['DETAIL_TEXT']?>
        </div>
    </div>
</section>
<? if ($arResult['PROPERTIES']['RELATED_NEWS']) { ?>

<section class="section section--pixelized">
    <div class="container">
        <h2 class="section__title section__title--white">Похожие материалы</h2>
        <div class="services services--sm slider--news">
        <?foreach ($arResult['PROPERTIES']['RELATED_NEWS'] as $related) { ?>
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

          <a href="<?=$related['DETAIL_PAGE_URL']?>" class="services__item service service--news" style="text-decoration: none">
            <div class="service__img">
              <div class="wrapper"><img src="<?=CFile::GetPath($related['PREVIEW_PICTURE'])?>" alt="" class="img img--responsive"></div>
            </div>
            <div class="service__desc">
              <p class="service__title"><?=$related['NAME'];?></p>
              <p class="service__text"><?=$preview?></p>
            </div>
          </a>
        <?}?>
    </div>
</section>
<? } ?>