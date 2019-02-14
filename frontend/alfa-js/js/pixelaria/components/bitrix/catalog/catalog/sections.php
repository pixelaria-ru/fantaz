<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<section class="section section--corner">
  <div class="container">
    <?$APPLICATION->IncludeComponent(
      "pixelaria:breadcrumb",
      "",
      Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
      )
    );?>
    <h1 class="page__title">Каталог продукции</h1>
    <div class="categories">
      <div class="categories__item category">
        <a href="/catalog/diesel-power-stations/" class="category__link">
          <div class="category__img">
            <img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/category-1.png" alt="">
          </div>
          <p class="category__title">Дизельные электростанции</p>
        </a>
      </div>
      <div class="categories__item category">
        <a href="/catalog/containers-and-cases/" class="category__link">
          <div class="category__img">
            <img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/category-2.png" alt="">
          </div>
          <p class="category__title">Контейнеры и кожухи</p>
        </a>
      </div>
      <div class="categories__item category">
        <a href="/catalog/lighting-masts/" class="category__link">
          <div class="category__img">
            <img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/category-3.png" alt="">
          </div>
          <p class="category__title">Осветительные мачты</p>
        </a>
      </div>
      <div class="categories__item category">
        <a href="/catalog/gas-units/" class="category__link">
          <div class="category__img">
            <img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/category-4.png" alt="">
          </div>
          <p class="category__title">Газопоршневые установки</p>
        </a>
      </div>
      <div class="categories__item category">
        <a href="/catalog/parts-and-components/" class="category__link">
          <div class="category__img">
            <img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/category-5.png" alt="">
          </div>
          <p class="category__title">Опции и комплектующие</p>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="section section--angles">
  <div class="container">
    <h2 class="section__title">Продажа энергетического оборудования: дизельные электростанции, газопоршневые установки, комплексные контейнерные решения и осветительные мачты</h2>
    <p class="section__text">Компания “Альфа Балт Инжиниринг” осуществляет производство и поставку высоковольтного энергетического оборудования по всей России на выгодных условиях. В представленный на сайте каталог мы включили основные категории продукции, выпускаемые на нашем оборудовании и получающие положительный отклик от заказчиков на протяжении многих лет. У нас вы можете подобрать и купить энергетическое оборудование для автономного электроснабжения предприятий военно-промышленного комплекса, объектов нефтегазового и энергетического секторов, строительства и ЖКХ, а также для других отраслей.</p>
    <p class="section__text">Для вашего удобства мы разработали обширный каталог готовых технологических решений с возможностью подбора ДЭС, сравнения параметров работы, типоразмерных характеристик, просмотра компоновок и подробной комплектации. Каталог дизель-генераторов (ДГУ) включает спецификации с характеристиками нескольких сотен моделей энергоустановок мощностью от 5 до 3000 кВт, доступных для заказа в любой момент. Ассортимент каталога оборудования постоянно пополняется новыми решениями, а модельный ряд расширяется с каждым новым выполненным проектом.</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <h2 class="section__title">Почему именно мы?</h2>
    <div class="why">
      <div class="why__item">
        <div class="why__img"><img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/why-engine.png" alt=""></div>
        <p class="why__title">Передовые технологии и технологическая база</p>
      </div>
      <div class="why__item">
        <div class="why__img"><img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/why-euro.png" alt=""></div>
        <p class="why__title">Европейское качество производства и сборки</p>
      </div>
      <div class="why__item">
        <div class="why__img"><img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/why-headphones.png" alt=""></div>
        <p class="why__title">Лучшие специалисты поддержат в трудную минуту</p>
      </div>
      <div class="why__item">
        <div class="why__img"><img class="img img--responsive" src="<?=SITE_TEMPLATE_PATH?>/img/why-money.png" alt=""></div>
        <p class="why__title">Доступные цены, широкий ассортимент</p>
      </div>
    </div>
  </div>
</section>