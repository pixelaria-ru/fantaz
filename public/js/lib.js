"use strict";

window.onscroll = function () {
  var scrolled = window.pageYOffset || document.documentElement.scrollTop;

  if (scrolled > 200) {
    document.querySelector('.header__up-line').classList.add('fixed');
  } else {
    document.querySelector('.header__up-line').classList.remove('fixed');
  }
};

(function moreInfoProgram() {
  var program = document.querySelectorAll('.article-edu-program');
  var programLength = document.querySelectorAll('.article-edu-program').length;

  for (var i = 0; i < programLength; i++) {
    program[i].querySelector('.article-program__info .button').addEventListener('click', function () {
      this.parentNode.parentNode.classList.toggle('active');

      if (this.parentNode.parentNode.classList.contains('active')) {
        this.innerHTML = 'свернуть';
      } else {
        this.innerHTML = 'описание курса';
      }
    });
    program[i].querySelector('.more-info__close').addEventListener('click', function () {
      this.parentNode.parentNode.classList.remove('active');
    });
  }
})();

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
})();

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
        modalia.classList.toggle('active');
      }
    });
  }
})();

(function () {
  var tabButtons = document.querySelectorAll('.select-tabs span');
  var tabBlocks = document.querySelectorAll('.right-side .tabus');
  tabButtons[0].addEventListener('click', function () {
    tabButtons[0].classList.add('active');
    tabButtons[1].classList.remove('active');
    tabBlocks[0].classList.add('active');
    tabBlocks[1].classList.remove('active');
  });
  tabButtons[1].addEventListener('click', function () {
    tabButtons[1].classList.add('active');
    tabButtons[0].classList.remove('active');
    tabBlocks[1].classList.add('active');
    tabBlocks[0].classList.remove('active');
  });
})();

!function () {
  var butNext = document.querySelector('.slider-buttons .but-next');
  var butPrev = document.querySelector('.slider-buttons .but-prev');
  var slides = document.querySelectorAll('.section--our-clients img');
  var slidesLength = document.querySelectorAll('.section--our-clients img').length;

  for (var i = 0; i < 5; i += 1) {
    slides[i].classList.add('active');
  }

  butPrev.addEventListener('click', function () {
    slides[0].classList.remove('active');
    slides[6].classList.add('active');
  });
  butNext.addEventListener('click', function () {
    slides[0].classList.add('active');
    slides[6].classList.remove('active');
  });
}();