jQuery(document).ready(function($) {
  $("#top-slider").responsiveSlides({
    pager: true,
    timeout: 4000,
    nav: false,
    prevText: "",
    nextText: "",
    speed: 400
  });
  $(".fa-bars").click(function() {
    $(".menu").slideToggle(0);
  });






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
});
