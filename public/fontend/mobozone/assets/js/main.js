(function($) {
    "use strict";


      $(".slider").owlCarousel({
        items: 1,
        loop:true,
        nav:true,
        navText: ["<i class='bi bi-arrow-left-short'></i>", "<i class='bi bi-arrow-right-short'></i>"],
        dots: true,
        responsiveClass:true,
        responsive:{
          0:{
            items:1,
            dots: false,
            nav: false
        },
        600:{
            items:1,
            nav: false
        },
        1000:{
            items:1,

        }
      }
      });

    

})($);