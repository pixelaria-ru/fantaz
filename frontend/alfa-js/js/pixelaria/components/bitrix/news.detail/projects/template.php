<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
    <div class="page row">
        <div class="page__info col-md-8 col-lg-6">
          <h1 class="page__title"><?=$arResult['NAME'];?></h1>
          <ul class="list">
            <li class="list__item"><span>Год исполнения:</span> <a href="<?=$arResult['SECTION_PAGE_URL']?>" class="link link--orange"><?=$arResult['IBLOCK_SECTION_NAME']?></a></li>
            <?if($arResult['PROPERTIES']['INDUSTRY']['VALUE']){?>
              <li class="list__item"><span>Отрасль:</span> <span><?=$arResult['PROPERTIES']['INDUSTRY']['VALUE']?></span></li>
            <?}?>
            <?if($arResult['PROPERTIES']['CLIENT_NAME']['VALUE']){?>
            <li class="list__item"><span>Заказчик:</span> <span><?=$arResult['PROPERTIES']['CLIENT_NAME']['VALUE']?></span></li>
            <?}?>
            <?if($arResult['PROPERTIES']['CITY']['VALUE']){?>
            <li class="list__item"><span>Регион и город:</span> <span><?=$arResult['PROPERTIES']['CITY']['VALUE']?></span></li>
            <?}?>
          </ul>
          <a href="#project-form" class="btn btn--orange btn--project-1 scroll-to-target" data-offset="80" >Запросить аналогичный проект</a>
        </div>
        <div class="page__image col-md-4 col-lg-6">
          <div class="slider slider--images">
            <ul class="slider__list">
              <?foreach($arResult['PROPERTIES']['IMAGES']['VALUE'] as $file){?>
                <li class="slider__item" data-target="1">
					<a data-fancybox="gallery" href="<?=CFile::GetPath($file)?>"> <img src="<?=CFile::GetPath($file)?>" alt="" class="img img--responsive"></a>
                </li>
              <?}?>
            </ul>
          </div>
        </div>
        <a href="#project-form" data-offset="80" class="btn btn--orange btn--project-2 scroll-to-target">Запросить аналогичный проект</a>
      </div>
  </div>
</section>
<section class="section section--white section--text">
    <div class="container">
       <?=$arResult['DETAIL_TEXT']?>
    </div>
</section>
<section class="section section--gradient" id="project-form">
  <div class="container">
    <?$APPLICATION->IncludeComponent(
      "pixelaria:form", 
      "project", 
      array(
        "IBLOCK_TYPE" => "pixelaria_form",
        "IBLOCK_ID" => "1",
        "USE_CAPTCHA" => "N",
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "100000",
        "AJAX_OPTION_ADDITIONAL" => "",
        "DISPLAY_CLOSE_BUTTON" => "Y",
        "POPUP" => "Y",
        "IS_PLACEHOLDER" => "N",
        "SUCCESS_MESSAGE" => "Спасибо! Мы свяжемся с вами в ближайшее время!",
        "FORM_CLASS" => "form form--white",
        "COMPONENT_TEMPLATE" => "footer",
        "SEND_BUTTON_NAME" => "Отправить",
        "SEND_BUTTON_CLASS" => "btn btn-primary",
        "CLOSE_BUTTON_NAME" => "Закрыть",
        "CLOSE_BUTTON_CLASS" => "btn btn-primary"
      ),
      false
    );?>
  </div>
</section>
<? if ($arResult['RELATED']) { ?>
<section class="section">
    <div class="container">
        <h2 class="section__title">Похожие проекты</h2>
        <div class="slider slider--projects">
          <div class="projects" style="display:block">
            <?foreach ($arResult['RELATED'] as $related) { ?>
              <a href="<?=$related['DETAIL_PAGE_URL']?>" class="projects__item project" style="text-decoration: none">
                <div class="project__image">
                  <img src="<?=$related['PICTURE']?>" alt="" class="img img--responsive">
                </div>
                <div class="project__desc">
                  <div class="project__customer"><span>Заказчик: </span> <?=$related['CLIENT_NAME']?></div>
                  <div class="project__icon"><img src="<?=$related['CLIENT_LOGO']?>" alt="" class="img img--responsive"></div>
                  <p class="project__title"><?=$related['NAME']?></p>
                </div>
                <div class="project__bottom">
                  <div class="project__info project__info--orange"><?=$related['INDUSTRY']?></div>
                  <div class="project__info"><?=$related['IBLOCK_SECTION_NAME']?> г.</div>
                </div>
              </a>
            <?}?>
          </div>
        </div>
    </div>
</section>
<? } ?>