var $j = jQuery.noConflict();

$j(document).ready(function($){
    $('#homeslider').nivoSlider({
      effect: 'fade',
      slices: 15,
      boxCols: 8,
      boxRows: 4,
      animSpeed: 500,
      pauseTime: 3000,
      startSlide: 0,
      directionNav: true,
      controlNav: true,
      controlNavThumbs: false,
      pauseOnHover: true,
      manualAdvance: false,
      prevText: 'Prev',
      nextText: 'Next',
      randomStart: false,
      beforeChange: function(){},
      afterChange: function(){},
      slideshowEnd: function(){},
      lastSlide: function(){},
      afterLoad: function(){}
    });
    var frontpagecourseslider = $('.frontpage-course-list-all').lightSlider({
      item:4,
      loop:true,
      rtl:true,
      slideMove:1,
      controls: false,
      pager: false,
      easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
      speed:600,
      responsive : [
          {
              breakpoint:1280,
              settings: {
                  item:3,
                  slideMove:1,
                  slideMargin:5
                }
          },
          {
              breakpoint:1010,
              settings: {
                  item:3,
                  slideMove:1,
                  slideMargin:5
                }
          },
          {
              breakpoint:850,
              settings: {
                  item:2,
                  slideMove:1,
                  slideMargin:3
                  
                }
          },
          {
              breakpoint:650,
              settings: {
                  item:1,
                  slideMove:1
                }
          }
      ] 
    }); 
    $('#goToNextSlide').on('click', function () {
        frontpagecourseslider.goToPrevSlide();
    });
    $('#goToPrevSlide').on('click', function () {
        frontpagecourseslider.goToNextSlide();
    }); 


    /*upcoming events*/
    
    var upcomingeventsslider = $('.upcoming-event-next-date-content').lightSlider({
      item:4,
      loop:false,
      slideMove:1,
      controls: true,
      pager: false,
      easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
      speed:600,
      responsive : [
          {
              breakpoint:1280,
              settings: {
                  item:3,
                  slideMove:1,
                  slideMargin:5,
                }
          },
          {
              breakpoint:1010,
              settings: {
                  item:3,
                  slideMove:1,
                  slideMargin:5,
                }
          },
          {
              breakpoint:850,
              settings: {
                  item:2,
                  slideMove:1
                  
                }
          },
          {
              breakpoint:650,
              settings: {
                  item:1,
                  slideMove:1
                }
          }
      ] 
    }); 
    $('#uvgoToNextSlide').on('click', function () {
        upcomingeventsslider.goToPrevSlide();
    });
    $('#uvgoToPrevSlide').on('click', function () {
        upcomingeventsslider.goToNextSlide();
    }); 
    /*var swiper = new Swiper(".swmarketingboxes", {
      direction: "vertical",
      slidesPerView: 1,
      spaceBetween: 30,
      mousewheel: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });*/
});  

(function () {
  "use strict";

  var carousels = function () {
    $j(".owl-carousel1").owlCarousel({
      loop: true,
      center: true,
      margin: 0,
      rtl: true,
      responsiveClass: true,
      nav: false,
      autoplay: false,
      dots: true,
      responsive: {
        0: {
          items: 1,
          nav: false,
          loop: true
        },
        680: {
          items: 2,
          nav: false,
          loop: true
        },
        1000: {
          items: 3,
          nav: true
        }
      }
    });
  };

  (function ($j) {
    carousels();
  })(jQuery);
})();
