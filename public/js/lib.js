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
  var mainForm = document.querySelector('.main-form');

  for (var i = 0; i < zap.length; i++) {
    zap[i].addEventListener('click', function () {
      mainForm.classList.toggle('active');
    });
  }
})();