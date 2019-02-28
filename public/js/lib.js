"use strict";

window.onscroll = function () {
  var scrolled = window.pageYOffset || document.documentElement.scrollTop;

  if (scrolled > 200) {
    document.querySelector('.header').classList.add('fixed');
  } else {
    document.querySelector('.header').classList.remove('fixed');
  }
};

if (document.querySelector('.article-edu-program')) {
  (function () {
    // pravochki
    var programs = document.querySelectorAll('.article-edu-program'),
        programsLength = programs.length;

    while (programsLength -= 1) {
      programs[programsLength].querySelector('.more-info__coast .button').innerHTML = 'Оставить заявку';
      programs[programsLength].querySelector('.more-info__button .button').innerHTML = 'Оставить заявку';
    }

    programs[0].querySelector('.more-info__coast .button').innerHTML = 'Оставить заявку';
    programs[0].querySelector('.more-info__button .button').innerHTML = 'Оставить заявку';
    programs[programs.length - 1].querySelector('.article-program__info .button').innerHTML = '<b>сформировать</b>';
  })();
}

(function () {
  // pravochki
  var buttonHeader = document.querySelector('.link--button');
  buttonHeader.innerHTML = 'записаться';
})();

if (document.querySelector('.article-edu-program')) {
  (function moreInfoProgram() {
    var program = document.querySelectorAll('.article-edu-program');
    var programLength = document.querySelectorAll('.article-edu-program').length - 1;

    for (var i = 0; i < programLength; i++) {
      program[i].querySelector('.article-program__info .button').addEventListener('click', function () {
        this.parentNode.parentNode.classList.toggle('active');

        if (this.parentNode.parentNode.classList.contains('active')) {
          this.innerHTML = '<b>свернуть</b>';
        } else {
          this.innerHTML = '<b>описание курса</b>';
        }
      });
      program[i].querySelector('.more-info__close').addEventListener('click', function () {
        this.parentNode.parentNode.classList.remove('active');
        this.parentNode.parentNode.querySelector('.button').innerHTML = '<b>описание курса</b>';
        window.scrollBy(0, this.parentNode.parentNode.getBoundingClientRect().top - 130);
        console.log(this.parentNode.parentNode.getBoundingClientRect().top);
      });
    }
  })();
}

if (document.querySelector('.filter-buttons button')) {
  (function filterProgram() {
    var filterButtons = document.querySelectorAll('.filter-buttons button');
    var filterButtonsLength = document.querySelectorAll('.filter-buttons button').length;
    var program = document.querySelectorAll('.article-edu-program');

    for (var i = 0; i < filterButtonsLength; i++) {
      filterButtons[i].addEventListener('click', function (i) {
        this.classList.toggle('active');

        for (var i = 0; i < program.length; i++) {
          if (program[i].getAttribute('date-filter') !== this.innerHTML) {
            program[i].style.display = 'none';
          } else {
            program[i].style.display = '';
          }
        }
      });
    }
  });
}

if (document.querySelector('.zap')) {
  (function () {
    var zap = document.querySelectorAll('.zap');
    var modalia = document.querySelector('.modalia');

    for (var i = 0; i < zap.length; i++) {
      zap[i].addEventListener('click', function () {
        modalia.classList.toggle('active');
      });
      modalia.addEventListener('click', function (e) {
        var target = e.target;

        if (target === modalia) {
          modalia.classList.remove('active');
        }
      });
    }
  })();
}

if (document.querySelector('.select-tabs span')) {
  (function () {
    var tabButtons = document.querySelectorAll('.select-tabs span');
    var tabBlocks = document.querySelectorAll('.right-side .tabus');
    tabButtons[0].addEventListener('click', function () {
      tabButtons[0].classList.add('active');
      tabBlocks[0].classList.add('active');
      tabButtons[1].classList.remove('active');
      tabBlocks[1].classList.remove('active');
      tabButtons[2].classList.remove('active');
      tabBlocks[2].classList.remove('active');
    });
    tabButtons[1].addEventListener('click', function () {
      tabButtons[1].classList.add('active');
      tabBlocks[1].classList.add('active');
      tabButtons[0].classList.remove('active');
      tabBlocks[0].classList.remove('active');
      tabButtons[2].classList.remove('active');
      tabBlocks[2].classList.remove('active');
    });
    tabButtons[2].addEventListener('click', function () {
      tabButtons[2].classList.add('active');
      tabBlocks[2].classList.add('active');
      tabButtons[1].classList.remove('active');
      tabBlocks[1].classList.remove('active');
      tabButtons[0].classList.remove('active');
      tabBlocks[0].classList.remove('active');
    });
  })();
}

if (document.querySelector('.section--our-clients')) {
  !function () {
    var butNext = document.querySelector('.section--our-clients .slider-buttons .but-next');
    var butPrev = document.querySelector('.section--our-clients .slider-buttons .but-prev');
    var slides = document.querySelectorAll('.section--our-clients img');
    var slidesLength = document.querySelectorAll('.section--our-clients img').length;
    var numSlide = -1;
    var nextSlide = 6;
    var countMinSlide = 0;
    var countMaxSlide = 5;

    for (var i = 0; i < 5; i += 1) {
      slides[i].classList.add('active');
    }

    butPrev.addEventListener('click', function () {
      console.log(countMaxSlide);

      if (countMinSlide > 0) {
        slides[countMinSlide].classList.add('active');
        slides[countMaxSlide].classList.remove('active');
        countMinSlide--;
        countMaxSlide -= 1;
      } else if (countMinSlide === 0) {
        slides[countMinSlide].classList.add('active');
        slides[countMaxSlide].classList.remove('active');
      }
    });
    butNext.addEventListener('click', function () {
      slides[countMinSlide].classList.remove('active');
      slides[countMaxSlide].classList.add('active');

      if (countMaxSlide < slidesLength) {
        if (countMaxSlide === slidesLength - 1) {
          countMaxSlide = slidesLength - 1;
        } else {
          countMinSlide++;
          countMaxSlide++;
        }
      }
    });
  }();
}

if (document.querySelector('.section--completed-projects')) {
  !function () {
    var butNext = document.querySelector('.section--completed-projects .but-next');
    var butPrev = document.querySelector('.section--completed-projects .but-prev');
    var slides = document.querySelectorAll('.complete-project');
    var slidesLength = document.querySelectorAll('.complete-project').length;
    var countMinSlide = 0;
    var countMaxSlide = 3;

    for (var i = 0; i < 3; i += 1) {
      slides[i].classList.add('active');
    }

    butPrev.addEventListener('click', function () {
      if (countMinSlide > 0) {
        slides[countMinSlide].classList.add('active');
        slides[countMaxSlide].classList.remove('active');
        countMinSlide -= 1;
        countMaxSlide -= 1;
      } else if (countMinSlide === 0) {
        slides[countMinSlide].classList.add('active');
        slides[countMaxSlide].classList.remove('active');
      }
    });
    butNext.addEventListener('click', function () {
      slides[countMinSlide].classList.remove('active');
      slides[countMaxSlide].classList.add('active');

      if (countMaxSlide < slidesLength) {
        if (countMaxSlide === slidesLength - 1) {
          countMaxSlide = slidesLength - 1;
        } else {
          countMinSlide++;
          countMaxSlide++;
        }
      }
    });
  }();
}

if (document.querySelector('.section--completed-projects')) {
  (function () {
    var sectionPro = document.querySelector('.section--completed-projects');
    var project = document.querySelectorAll('.complete-project');
    var pModal = document.querySelector('.projects-modal');
    var proModal = document.querySelectorAll('.block-open-project');
    pModal.addEventListener('click', function (e) {
      var target = e.target;

      if (target === pModal) {
        pModal.classList.remove('active');
        proModal[0].classList.remove('active');
        proModal[1].classList.remove('active');
        proModal[2].classList.remove('active');
        proModal[3].classList.remove('active');
      }
    });
    project[0].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[0].classList.add('active');
    });
    project[1].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[1].classList.add('active');
    });
    project[2].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[2].classList.add('active');
    });
    project[3].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[3].classList.add('active');
    });
  })();
}

if (document.querySelector('.section--education-formats')) {
  (function () {
    var sectionPro = document.querySelector('.section--education-formats');
    var project = document.querySelectorAll('.education-form');
    var pModal = document.querySelector('.formats-modal');
    var proModal = document.querySelectorAll('.block-open-format');
    pModal.addEventListener('click', function (e) {
      var target = e.target;

      if (target === pModal) {
        pModal.classList.remove('active');
        proModal[0].classList.remove('active');
        proModal[1].classList.remove('active');
        proModal[2].classList.remove('active');
        proModal[3].classList.remove('active');
        proModal[4].classList.remove('active');
        proModal[5].classList.remove('active');
      }
    });
    project[0].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[0].classList.add('active');
    });
    project[1].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[1].classList.add('active');
    });
    project[2].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[2].classList.add('active');
    });
    project[3].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[3].classList.add('active');
    });
    project[4].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[4].classList.add('active');
    });
    project[5].addEventListener('click', function () {
      pModal.classList.add('active');
      proModal[5].classList.add('active');
    });
  })();
}

if (!document.querySelector('.section-discription-program')) {
  (function () {
    // собираем все якоря; устанавливаем время анимации и количество кадров
    var anchors = [].slice.call(document.querySelectorAll('a[href*="#"]')),
        animationTime = 300,
        framesCount = 20;
    anchors.forEach(function (item) {
      // каждому якорю присваиваем обработчик события
      item.addEventListener('click', function (e) {
        // убираем стандартное поведение
        e.preventDefault(); // для каждого якоря берем соответствующий ему элемент и определяем его координату Y

        var coordY = document.querySelector(item.getAttribute('href')).getBoundingClientRect().top - 100; // запускаем интервал, в котором

        var scroller = setInterval(function () {
          // считаем на сколько скроллить за 1 такт
          var scrollBy = coordY / framesCount; // если к-во пикселей для скролла за 1 такт больше расстояния до элемента
          // и дно страницы не достигнуто

          if (scrollBy > window.pageYOffset - coordY && window.innerHeight + window.pageYOffset < document.body.offsetHeight) {
            // то скроллим на к-во пикселей, которое соответствует одному такту
            window.scrollBy(0, scrollBy);
          } else {
            // иначе добираемся до элемента и выходим из интервала
            window.scrollTo(0, coordY);
            clearInterval(scroller);
          } // время интервала равняется частному от времени анимации и к-ва кадров

        }, animationTime / framesCount);
      });
    });
  })();
}

if (document.querySelector('.article-opinion')) {
  (function () {
    var comments = document.querySelectorAll('.article-opinion');
    var dots = document.querySelectorAll('.dots span');
    dots[0].addEventListener('click', function () {
      dots[0].classList.add('active');
      comments[0].classList.add('active');
      dots[1].classList.remove('active');
      comments[1].classList.remove('active');
    });
    dots[1].addEventListener('click', function () {
      dots[1].classList.add('active');
      comments[1].classList.add('active');
      dots[0].classList.remove('active');
      comments[0].classList.remove('active');
    });
  })();
}

(function () {
  'use strict';
  /* begin begin Back to Top button  */

  (function () {
    function trackScroll() {
      var scrolled = window.pageYOffset;
      var coords = document.documentElement.clientHeight;

      if (scrolled > coords) {
        goTopBtn.classList.add('back_to_top-show');
      }

      if (scrolled < coords) {
        goTopBtn.classList.remove('back_to_top-show');
      }
    }

    function backToTop() {
      if (window.pageYOffset > 0) {
        window.scrollBy(0, -80);
        setTimeout(backToTop, 0);
      }
    }

    var goTopBtn = document.querySelector('.buttonUpu');
    window.addEventListener('scroll', trackScroll);
    goTopBtn.addEventListener('click', backToTop);
  })();
  /* end begin Back to Top button  */

})();