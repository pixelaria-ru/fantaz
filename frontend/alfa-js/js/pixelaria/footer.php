<section class="section section--question" id="question">
    <div class="container">
      <?$APPLICATION->IncludeComponent(
	"pixelaria:form", 
	"footer", 
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
		"SUCCESS_MESSAGE" => "Спасибо за обращение! Специалист свяжется с вами для уточнения деталей в ближайшее время.",
		"FORM_CLASS" => "form form--callback",
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
  </main>
  <footer class="footer">
    <div class="container">
      <div class="footer__links">
        <div class="links">
          <div class="links__title">Продукция</div>
          <ul class="links__list list">
            <li class="list__item"><a href="/catalog/diesel-power-stations/" class="list__link">Дизельные электростанции</a></li>
            <li class="list__item"><a href="/catalog/containers-and-cases/" class="list__link">Контейнеры и кожухи</a></li>
            <li class="list__item"><a href="/catalog/lighting-masts/" class="list__link">Осветительные мачты</a></li>
            <li class="list__item"><a href="/catalog/gas-units/" class="list__link">Газопоршневые электростанции</a></li>
            <li class="list__item"><a href="/catalog/parts-and-components/" class="list__link">Опции и комплектующие</a></li>
          </ul>
        </div>
        <div class="links">
          <div class="links__title">Услуги</div>
          <ul class="links__list list">
            <li class="list__item"><a href="/services/design/" class="list__link">Проектирование</a></li>
            <li class="list__item"><a href="/services/develop/" class="list__link">Производство</a></li>
            <li class="list__item"><a href="/services/diagnostics/" class="list__link">Диагностика</a></li>
            <li class="list__item"><a href="/services/installation/" class="list__link">Монтаж и пусконаладка</a></li>
            <li class="list__item"><a href="/services/teaching/" class="list__link">Обучение</a></li>
            <li class="list__item"><a href="/services/maitenance/" class="list__link">Обслуживание</a></li>
          </ul>
        </div>
        <div class="links">
          <div class="links__title">Компания</div>
          <ul class="links__list list">
            <li class="list__item"><a href="/about/" class="list__link">О нас</a></li>
            <li class="list__item"><a href="/about/sertificates/" class="list__link">Сертификаты</a></li>
            <li class="list__item"><a href="/about/reviews/" class="list__link">Отзывы клиентов</a></li>
            <li class="list__item"><a href="/about/vacancies/" class="list__link">Вакансии</a></li>
            <li class="list__item"><a href="/contacts/" class="list__link">Контакты</a></li>
          </ul>
        </div>
        <div class="links">
          <div class="links__title">Прочее</div>
          <ul class="links__list list">
            <li class="list__item"><a href="/projects/" class="list__link">Реализованные проекты</a></li>
            <li class="list__item"><a href="/industries/" class="list__link">Отраслевые решения</a></li>
            <li class="list__item"><a href="/press/" class="list__link">Пресс-центр</a></li>
            <li class="list__item"><a href="/press/documents/" class="list__link">Документы и брошюры</a></li>
          </ul>
        </div>
      </div>
      <div class="footer__company">
        <div class="company" itemscope="" itemtype="http://schema.org/Organization">
          <div class="company__info">
            <p class="company__name"><span itemprop="name">ООО «Альфа Балт Инжиниринг»</span>, 2003-2019</p>
            <div class="company__phone" itemprop="telephone">тел. +7 (812) 337-68-20</div>
          </div>
          <div class="company__contacts">
            <ul class="company__list">
              <li class="company__item" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality">Спб</span>, <span itemprop="streetAddress">Муринская дорога, 23</span></li>
              <li class="company__item" itemprop="email">info@abesbp.ru</li>
            </ul> 
            <ul class="company__social social">
              <li class="social__item"><a href="https://www.facebook.com/alfabaltdiesel/" class="social__link social__link--fb"></a></li>
              <li class="social__item"><a href="https://vk.com/alfabaltdiesel" class="social__link social__link--vk"></a></li>
              <li class="social__item"><a href="https://www.youtube.com/channel/UCRvwYVmJ3Swn2fhZ1Q5JpiQ/" class="social__link social__link--yb"></a></li>
              <li class="social__item"><a href="https://www.instagram.com/alfabalt/" class="social__link social__link--ig"></a></li>
              <li class="social__item"><a href="https://ok.ru/group/58711746150458" class="social__link social__link--ok"></a></li>
            </ul>
            
          </div>
          
        </div>

        <p class="offert">Информация на сайте не является публичной офертой. Копирование без разрешения запрещено.</p>
      </div>
      <div class="footer__copyright copyright">
        <ul class="copyright__links">
          <li class="copyright__item"><a href="/privacy-policy/" class="copyright__link">Политика конфиденциальности</a></li>
          <li class="copyright__item"><a href="/sitemap/" class="copyright__link">Карта сайта</a></li>
        </ul>
        <div class="copyright__develop develop">
          <p class="develop__text">
            Разработано в <a href="http://pixelaria.ru" target="_blank" class="link link--orange develop__link">Pixelaria</a>
          </p>
        </div>
      </div>
    </div>
    <?
      //compare data
      foreach($_SESSION['CATALOG_COMPARE_LIST'] as $key => $value){
        foreach($value['ITEMS'] as $_value){
            unset($sec);
            $nav = CIBlockSection::GetNavChain(false,$_value['IBLOCK_SECTION_ID']);
            while($arSectionPath = $nav->GetNext()) {
               $sec[] = $arSectionPath['ID'];
            }
              
            if($_value['ID']){
                $compareCount[$sec[0]][] = $arItem['ID'];
                $compareFilter[$sec[0]] = $sec[0];
            }
        }
      }
      
      $dir = $APPLICATION->GetCurDir();
    ?>
  
     
    <div class="footer-compare <?if ($_SESSION['CATALOG_COMPARE_LIST'][3]['ITEMS']) echo "footer-compare--active";?>" style="<?if($dir=='/compare/') echo "display:none; ";?>height: auto;"> 
      <div class="container">
        <a href="/compare/?SECTION_ID=19" class="footer-compare__text link">Товары в сравнении: (<span id="compareCount"><?=count($_SESSION['CATALOG_COMPARE_LIST'][3]['ITEMS'])?></span>)</a>
        <p class="footer-compare__text">
          <div class="footer-compare__categories">
              <?
                $arFilter = Array('IBLOCK_ID'=>3, 'ID'=>$compareFilter);
                $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true,'PICTURE');
                while($arSection = $db_list->GetNext()){
              ?>
              <div class="footer-compare__category compare-category">
                <a class="compare-category__image" href="/compare/?SECTION_ID=<?=$arSection['ID']?>">
                    <img class="img img--responsive" src="<?=CFile::GetPath($arSection['PICTURE'])?>" alt="<?=$arSection['NAME']?>">
                </a>
                <a class="compare-category__name" href="/compare/?SECTION_ID=<?=$arSection['ID']?>"><?=$arSection['NAME']?> (<?=count($compareCount[$arSection['ID']])?>)</a>
              </div>
            <?}?>
          </div>
        </p>
      </div>
    </div>
  </footer>


  <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.min.js');?>
  <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/libs.min.js');?>
  <?
    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bundle.js');
  ?>
  <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/bundle.js"></script>





<script>
!function(I,t){var L={left:0,top:0,middle:.5,center:.5,right:1,bottom:1},z=/^\d+\s?px$/,a=/^\d+\s?%$/,i=I(window),e=I(document),r=[0,0],o=function(){var i=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(t,a){return window.setTimeout(function(){t()},25)};function t(){var n,r=[];function t(){}function a(){var t=r.slice(0),a=t.length,e=-1;for(0;++e<a;)t[e].call(this);i(n)}function e(){this.start=t,this.stop=o,i(n=a)}function o(){this.start=e,this.stop=t,n=t}this.callbacks=r,this.start=e,this.stop=o}return t.prototype={add:function(t){for(var a=this.callbacks,e=a.length;e--;)if(a[e]===t)return;this.callbacks.push(t)},remove:function(t){for(var a=this.callbacks,e=a.length;e--;)a[e]===t&&a.splice(e,1);0===a.length&&this.stop()}},t}();function R(t){return a.exec(t)?parseFloat(t)/100:t}function s(l){var f,u,t={"mouseenter.parallax":function(){p.timer.add(e)},"mouseleave.parallax":function(t){p.timer.remove(e),p.pointer=c([t.pageX,t.pageY],[!0,!0],u,f)}},a={"resize.parallax":n},p={elem:l,events:t,winEvents:a,timer:new o};function e(){p.pointer=c(r,[!0,!0],u,f)}function n(){var t,a,e,n,r,o,i,s;f=[(t=l).width(),t.height()],e=(a=l).offset()||{left:0,top:0},n="none"===a.css("borderLeftStyle")?0:parseInt(a.css("borderLeftWidth"),10),r="none"===a.css("borderTopStyle")?0:parseInt(a.css("borderTopWidth"),10),o=parseInt(a.css("paddingLeft"),10),i=parseInt(a.css("paddingTop"),10),u=[e.left+n+o,e.top+r+i],p.threshold=[1/(s=f)[0],1/s[1]]}return i.on(a),l.on(t),n(),p}function c(t,a,e,n){for(var r=[],o=2;o--;)r[o]=(t[o]-e[o])/n[o],r[o]=r[o]<0?0:1<r[o]?1:r[o];return r}function W(t,a,e,n,r,o,i){var s,l;if((!r[0]||Math.abs(t[0]-a[0])<e[0])&&(!r[1]||Math.abs(t[1]-a[1])<e[1]))return o&&o(),i(t);for(s=[],l=2;l--;)r[l]&&(s[l]=t[l]+n*(a[l]-t[l]));return i(s)}function D(t,a,e,n,r,o,i){if(t[0]!==a[0]||t[1]!==a[1])return i(t)}function l(t,a,e){var n,r,o;a.elem.off(e),a.layers=a.layers.not(t),0===a.layers.length&&(n=a.elem,r=a.events,o=a.winEvents,n.off(r).removeData("parallax_port"),i.off(o))}I.fn.parallax=function(t){var a,e,n,r,T=I.extend({},I.fn.parallax.options,t),k=arguments,o=T.mouseport instanceof I?T.mouseport:I(T.mouseport),q=(e="parallax_port",n=s,(r=(a=o).data(e))||(r=n?n(a):{},a.data(e,r)),r),A=q.timer;return this.each(function(t){var a,e,n,r,o,i=I(this),s=k[t+1]?I.extend({},T,k[t+1]):T,l=s.decay,f=(n=i,r=s.width,o=s.height,[r||n.outerWidth(),o||n.outerHeight()]),u=function(t,a){for(var e=[t,a],n=2,r=[];n--;)r[n]="string"==typeof e[n]?void 0===e[n]?1:L[r[n]]||R(r[n]):e[n];return r}(s.xorigin,s.yorigin),p=(a=s.xparallax,e=s.yparallax,[z.test(a),z.test(e)]),c=function(t,a,e){for(var n=[t,a],r=2,o=[];r--;)o[r]=e[r]?parseInt(n[r],10):o[r]=!0===n[r]?1:R(n[r]);return o}(s.xparallax,s.yparallax,p),h=function(t,a,e,n){for(var r=2,o=[];r--;)o[r]=a[r]?e[r]*(n[r]-t[r]):t[r]?e[r]*(1-t[r]):0;return o}(c,p,u,f),d=function(t,a){for(var e=2,n=[];e--;)t[e]&&(n[e]=100*a[e]+"%");return n}(p,u),m=function(t,a,e,n,r){for(var o=t.offsetParent(),i=t.position(),s=[],l=[],f=2;f--;)s[f]=e[f]?0:i[0===f?"left":"top"]/(o[0===f?"outerWidth":"outerHeight"]()-r[f]),l[f]=(s[f]-n[f])/a[f];return l}(i,c,p,h,f),v=W,x=b,g={"mouseenter.parallax":function(t){v=W,x=b,A.add(y),A.start()},"mouseleave.parallax":function(t){v=W,x=F}};function w(t){var a=function(t,a,e,n,r,o){for(var i,s,l=[],f=2,u={};f--;)t[f]&&(l[f]=t[f]*o[f]+e[f],s=a[f]?(i=r[f],-1*l[f]):(i=100*l[f]+"%",l[f]*n[f]*-1),0===f?(u.left=i,u.marginLeft=s):(u.top=i,u.marginTop=s));return u}(c,p,h,f,d,t);i.css(a),m=t}function y(){v(q.pointer,m,q.threshold,l,c,x,w)}function b(){v=D}function F(){A.remove(y)}I.data(this,"parallax")&&i.unparallax(),I.data(this,"parallax",{port:q,events:g,parallax:c}),q.elem.on(g),q.layers=q.layers?q.layers.add(this):I(this)})},I.fn.unparallax=function(n){return this.each(function(){var t,a,e=I.data(this,"parallax");e&&(I.removeData(this,"parallax"),l(this,e.port,e.events),n&&(t=e.parallax,a={},t[0]&&(a.left="",a.marginLeft=""),t[1]&&(a.top="",a.marginTop=""),elem.css(a)))})},I.fn.parallax.options={mouseport:"body",xparallax:!0,yparallax:!0,xorigin:.5,yorigin:.5,decay:.66,frameDuration:30,freezeClass:"freeze"},e.on("mousemove.parallax",function(t){r=[t.pageX,t.pageY]})}(jQuery);
</script>








  <style>
    .footer-compare {
      visibility: hidden;
      opacity: 0;
    
      position: fixed;
      bottom: 0;
      height: 50px;
      width: 100;
      width: ;
      width: 100%;
      background-color: #ED7144;

      box-shadow: 0 -5px 5px rgba(0,0,0,.1);
      line-height: 50px;
      text-align: center;
      transition: opacity 0.3s ease;


    }

    .footer-compare--cats .footer-compare__categories {
      max-height: 200px;
      opacity: 1;
      visibility: visible;
    }

    .footer-compare__text {
      color:#ffffff;
    }

    .footer-compare--active {
      visibility: visible;
      opacity: 1;
    }

    .footer-compare__categories {
      display: flex;
      flex-direction: row;
      flex-wrap: nowrap;
      justify-content: center;
      align-items: center;
      align-content: center;

      max-height: 0;
      opacity: 0;
      visibility: hidden;
    }

    .footer-compare__category {
      margin-right: 30px;
      text-align: center;
    }
    .footer-compare__category:last-child {
      margin-right: 0;
    }

    .footer-compare__category:hover img {
      transform: scale(1.1);
    }

    .compare-category__image {
      height: 50px;
      display: inline-block;
      font-size: 0; line-height: 0;
      overflow: hidden;

    }
    .compare-category__image img {
      display: inline-block;
      height: 100%;
      width: auto;
      transition: transform 0.3s ease;
    }
    .compare-category__name {
      display: block;
      width: 100%;
      color:#ffffff;
      

    }
  </style>

  
  <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   !function(e,t,a){(t[a]=t[a]||[]).push(function(){try{t.yaCounter47565685=new Ya.Metrika({id:47565685,clickmap:!0,trackLinks:!0,accurateTrackBounce:!0,webvisor:!0})}catch(e){}});var c=e.getElementsByTagName("script")[0],n=e.createElement("script"),r=function(){c.parentNode.insertBefore(n,c)};n.type="text/javascript",n.async=!0,n.src="https://mc.yandex.ru/metrika/watch.js","[object Opera]"==t.opera?e.addEventListener("DOMContentLoaded",r,!1):r()}(document,window,"yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47565685" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116065029-1"></script>
<script>
function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","UA-116065029-1");
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->

<!-- Top100 (Kraken) Counter -->
<script>
    !function(t,e,o){(t[o]=t[o]||[]).push(function(){try{t.top100Counter=new top100({project:1859745,trackHashes:!0,user_id:null})}catch(t){}});var n=e.getElementsByTagName("script")[0],p=e.createElement("script"),r=function(){n.parentNode.insertBefore(p,n)};p.type="text/javascript",p.async=!0,p.src=("https:"==e.location.protocol?"https:":"http:")+"//st.top100.ru/top100/top100.js","[object Opera]"==t.opera?e.addEventListener("DOMContentLoaded",r,!1):r()}(window,document,"_top100q");
</script>
<noscript>
  <img src="//counter.rambler.ru/top100.cnt?pid=1859745" alt="Топ-100" />
</noscript>
<!-- END Top100 (Kraken) Counter -->


<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'JPiwnOEvYo';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->

<!-- CLEANTALK template addon -->
<?php \Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("area"); if(CModule::IncludeModule("cleantalk.antispam")) echo CleantalkAntispam::FormAddon(); \Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("area", "Loading..."); ?>
<!-- /CLEANTALK template addon -->

</body>
</html>