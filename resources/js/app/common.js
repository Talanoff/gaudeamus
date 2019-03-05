import jquery from 'jquery';
import Flickity from 'flickity';
import 'flickity-as-nav-for';
require('paroller.js');

window.jQuery = window.$ = jquery;

import 'flickity/dist/flickity.css';

(function () {

  $('.parallax-item').paroller();

  /**
   * Burger-menu
   */
  $('.burger-menu').click(function () {
    var menu = $('.menu');
    $(this).toggleClass('active');

    if (!menu.hasClass('is-active')) {
      menu.addClass('is-active');
    } else {
      menu.removeClass('is-active');
    }
  });

  /**
   * Form-label
   */

  $('.form-control').on('focus', function () {
    $(this).parent().addClass('in-focus');
  });

  $('.form-control').on('blur', function () {
    if ($(this).val() !== "") {
      $(this).parent().addClass('in-focus');
    } else {
      $(this).parent().removeClass('in-focus');
    }
  });

  $('.form-check-label').on('click', function () {
    $(this).parent().toggleClass('in-focus');
  })

  /**
   * Modal
   */
  $('#add-reviews-btn').on('click', function (e) {
    e.preventDefault();
    $('.modal-feedback').addClass('is-active animated bounceInUp');
  });

  $('#close-modal-feedback').on('click', function (e) {
    setTimeout(function () {
      $('.modal-feedback').removeClass('is-active bounceInUp');
    }, 400);
  });

  // $('.materials-page-item-content-img').on('click', function (e) {
  //   e.preventDefault();
  //   $('.show-materials-modal').addClass('is-active animated bounceInUp');
  //   $('.modal-mask').addClass('is-active');
  // });
  //
  // $('#close-modal-materials').on('click', function () {
  //   setTimeout(function () {
  //     $('.show-materials-modal').removeClass('is-active bounceInUp');
  //     $('.modal-mask').removeClass('is-active');
  //   }, 400);
  // });

  $('#close-text-show-modal-materials').on('click', function (e) {
    e.preventDefault();
    setTimeout(function () {
      $('.show-materials-modal').removeClass('is-active bounceInUp');
      $('.modal-mask').removeClass('is-active');
    }, 400);
  });

  /**
   * Change course list item
   */

  $('.faux-select').click(function () {
    $(this).toggleClass('open');
    $('.options', this).toggleClass('open');
  });

  $('.options li').click(function () {
    var selection = $(this).text();
    var dataValue = $(this).attr('data-value');
    $('.selected-option span').text(selection);
    $('.faux-select').attr('data-selected-value', dataValue);
  });

  /**
   * Pagination
   */
  $('.pagination-list-item__link').on('click', function () {

    $('.pagination-list-item__link').removeClass('is-active');
    $(this).addClass('is-active');
  });

  /**
   *  Qustions accordion
   */
  $('.questions-page-item').on('click', '.questions-page-item-title', function () {
    $(this).toggleClass('is-active');
    $(this).siblings().slideToggle();
  })

  /**
   * Jobs accordion
   */

  $('#open-jobs-page-respond').on('click', function (e) {
    e.preventDefault();
    if (!$('.jobs-page-respond').is(':visible')) {
      $(this).toggleClass('is-active')
      $('.jobs-page-respond').slideDown();
    }
  });

  $('#open-jobs-page-all').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
    $('.jobs-page-item').slideToggle();
    if ($('.jobs-page-respond').is(':visible') && $('#open-jobs-page-respond').hasClass('is-active')) {
      $('.jobs-page-respond').slideDown();
      $('#open-jobs-page-respond').removeClass('is-active');
    } else if ($('.jobs-page-respond').is(':visible') && !$('#open-jobs-page-respond').hasClass('is-active')) {
      $('.jobs-page-respond').slideUp();
    } else if (!$('.jobs-page-respond').is(':visible') && !$('#open-jobs-page-respond').hasClass('is-active')) {
      $('.jobs-page-respond').slideDown();
    }


    $(this).hasClass('is-active') ? $(this).text('Закрыть') : $(this).text('Больше информации');
  });

  /**
   * Cabinet
   */
  $('.cabinet-page-tabs-header-list').on('click', 'li:not(.active)', function () {
    $(this)
      .addClass('active').siblings().removeClass('active')
      .closest('.cabinet-page-tabs', '').find('.cabinet-page-tabs-body-item').removeClass('active').eq($(this).index()).addClass('active');
  });


})(jQuery)

/**
 * Slider Header banner
 */

if ($('.header-banner-slider')) {

  var elem1 = document.querySelector('.header-banner-slider');
  if (elem1) {

    const flkty1 = new Flickity(elem1, {
      prevNextButtons: false,
      contain: true,
      draggable: false,
      groupCells: 1
    });


    var indexHeaderSlider = document.querySelector('.header-banner-slider-nav-num-dots__index');
    indexHeaderSlider.innerText = flkty1.selectedIndex + 1;

    var prevArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-prev');

    prevArrowHeader.addEventListener('click', function () {
      flkty1.previous(false, false);
      indexHeaderSlider.innerText = flkty1.selectedIndex + 1;
    });

    var nextArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-next');

    nextArrowHeader.addEventListener('click', function () {
      flkty1.next(false, false);
      indexHeaderSlider.innerText = flkty1.selectedIndex + 1;
    });

    var lastHeaderSlider = document.querySelector('.header-banner-slider-nav-num-dots__last');

    lastHeaderSlider.innerText = flkty1.getCellElements().length;
  }
}

/**
 * Slider Reviews
 */

if ($('.reviews-slider')) {

  var elem2 = document.querySelector('.reviews-slider');
  if (elem2) {

    const flkty2 = new Flickity(elem2, {
      prevNextButtons: false,
      contain: true,
      draggable: false,
      cellSelector: '.reviews-slider-item'
    });


    var prevArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-prev--reviews');
    prevArrowHeader.addEventListener('click', function () {
      flkty2.previous(false, false);
    });

    var nextArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-next--reviews');
    nextArrowHeader.addEventListener('click', function () {
      flkty2.next(false, false);
    });
  }
}

if ($('.teachers-show-certificates-slider')) {

  var elem3 = document.querySelector('.teachers-show-certificates-slider');
  if (elem3) {

    const flkty3 = new Flickity(elem3, {
      prevNextButtons: false,
      contain: true,
      draggable: false,
      cellSelector: '.teachers-show-certificates-slider-item',
      wrapAround: true
    });


    var prevArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-prev--teachers-show-certificates');
    prevArrowHeader.addEventListener('click', function () {
      flkty3.previous(true, false);
    });

    var nextArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-next--teachers-show-certificates');
    nextArrowHeader.addEventListener('click', function () {
      flkty3.next(true, false);
    });
  }
}

/**
 * Slider teachers-show-reviews
 */

if ($('.teachers-show-reviews-slider')) {

  var elem4 = document.querySelector('.teachers-show-reviews-slider');
  if (elem4) {

    const flkty4 = new Flickity(elem4, {
      prevNextButtons: false,
      contain: true,
      draggable: false,
      cellSelector: '.teachers-show-reviews-slider-item',
      wrapAround: true
    });


    var prevArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-prev--teachers-show-reviews');
    prevArrowHeader.addEventListener('click', function () {
      flkty4.previous(true, false);
    });

    var nextArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-next--teachers-show-reviews');
    nextArrowHeader.addEventListener('click', function () {
      flkty4.next(true, false);
    });
  }
}


/**
 * Slider teachers-show-reviews
 */

if ($('.programs-show-teachers-slider')) {

  var elem5 = document.querySelector('.programs-show-teachers-slider');
  if (elem5) {

    const flkty5 = new Flickity(elem5, {
      prevNextButtons: false,
      contain: true,
      draggable: false,
      wrapAround: true,
      cellAlign: 'left',
      cellSelector: '.programs-show-teachers-slider-item',
    });


    var prevArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-prev--programs-show-teachers');
    prevArrowHeader.addEventListener('click', function () {
      flkty5.previous(true, false);
    });

    var nextArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-next--programs-show-teachers');
    nextArrowHeader.addEventListener('click', function () {
      flkty5.next(true, false);
    });
  }
}

/**
 * Sliders gallery
 */

var elem6 = document.querySelector('.gallery-page-slider');
var galleryNavFor = document.querySelector('.gallery-page-slider-navFor');
if (elem6) {

  var flkty6 = new Flickity(elem6, {
    prevNextButtons: false,
    cellAlign: 'left',
    contain: true,
    draggable: false,
    pageDots: false,
    wrapAround: true,
  });

  var navFor = new Flickity(galleryNavFor, {
    asNavFor: elem6,
    cellAlign: 'left',
    contain: true,
    pageDots: false,
    prevNextButtons: false,
    wrapAround: false,
    cellSelector: '.gallery-page-slider-navFor-item'
  });



  var indexGallerySlider = document.querySelector('.gallery-page-slider-num-item-index');
  indexGallerySlider.innerText = flkty6.selectedIndex + 1;

  var prevArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-prev--gallery-page');

  prevArrowHeader.addEventListener('click', function () {
    flkty6.previous(false, false);
    indexGallerySlider.innerText = flkty6.selectedIndex + 1;
  });

  var nextArrowHeader = document.querySelector('.header-banner-slider-nav-arrow-next--gallery-page');

  nextArrowHeader.addEventListener('click', function () {
    flkty6.next(false, false);
    indexGallerySlider.innerText = flkty6.selectedIndex + 1;
  });

  var lastGallerySlider = document.querySelector('.gallery-page-slider-num-item-last');

  lastGallerySlider.innerText = flkty6.getCellElements().length;

}