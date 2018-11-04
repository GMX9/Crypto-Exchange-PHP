(function ($) {
    "use strict";

      //======================================
      //============ Preloader ===============
      //======================================
      $(window).on('load', function(){
          var preLoder = $(".preloader");
          preLoder.fadeOut(1000);
      });



      //======================================
      //========= filterizr enable ===========
      //======================================
      jQuery(window).on('load', function() {
          
          if ($(this).width() >  322) {
                var $filterizr = $('.filterizr__elements');
                if ($filterizr.length > 0) {
                  var $filterizrControls = $('.filterizr__controls');
                  $filterizr.filterizr();
                  $filterizrControls.children('li').click(function() {
                  $filterizrControls.find('li.active').removeClass('active');
                  $(this).addClass('active');
                  });
               }


          }


      }); 




      //======================================
      //====== Responsive menu button ========
      //======================================
      $(function(){
        $('.menu-button > i').on('click', function(){
          $('.main-menu').slideToggle(300);
        });
          
      });



      //======================================
      //=========== Fixed navbar =============
      //======================================
      $(window).on('scroll', function(){
          var headerSection = $('.header');

          if ($(window).scrollTop() > 100) {
              headerSection.addClass('fixed-header');
          } else {
              headerSection.removeClass('fixed-header');
          }
          
      });



      //======================================
      //======== Testimonial slider ==========
      //======================================
      $(function(){
        
        var testimonialCarousel = $('.all-comments');
            testimonialCarousel.owlCarousel({
             loop:true,
            dots:true,
            dotData:true,
            nav:true,
            item: 1,
            navText: ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive : {
              0 : {
                  items: 1
              },
              768 : {
                  items: 1
              },
              960 : {
                  items: 1
              },
              1200 : {
                  items: 1
              },
              1920 : {
                  items: 1
              }
            }
        }); 
        
      });


}(jQuery)); 


