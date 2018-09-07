jQuery(document).ready(function($) {

  
  $('.dashicons-welcome-widgets-menus').click(function() {
    $('.fa-copy').slideToggle(0);
  });

  $('.fa-copy').click(function() {
    $(this).css('color', '#9ECD7C');
  });

  $("#top-slider").responsiveSlides({
    pager: true,
    timeout: 4000,
    nav: true,
    prevText: "",
    nextText: "",
    speed: 400
  });
  $(".fa-bars").click(function() {
    $(".menu").slideToggle(100);
  });

  $('.rslides_tabs li a').prepend('0');
  var count = $('.rslides_tabs li').children().length;
  $('.rslides_tabs').append('<li> / 0' + count + '</li>');




  $('.responsive').slick({
    // dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        // centerMode: true,

      }

    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        dots: false,
        infinite: true,

      }


    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: false,
        infinite: true,

      }
    }, {
      breakpoint: 320,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    }]
  });

  $.fn.switchTabs = function() {
    $(this).each(function() {
      var el = $(this).children('.switch-tabs-nav'),
        switchBody = el.siblings('.switch-tabs-body');

      // Click switch tab
      switchBody.children('.switch-content:not(:first)').hide();
      el.on('click', 'a', function() {
        el.children().removeClass('active');
        $(this).parent().addClass('active');
        switchBody.children('.switch-content').hide();

        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
      });

      var totalWidth = 0;
      el.children().each(function() {
        var width = $(this).outerWidth();
        totalWidth += width;
      });

      $(window).resize(function() {
        var widthWrap = el.outerWidth();
        if (widthWrap <= totalWidth) {
          el.addClass('responsive');
        } else {
          el.removeClass('responsive');
        }
      }).trigger('resize');
    });
  }

  $(window).on('load', function() {
    $('.switch-tabs').switchTabs();
  });
});
