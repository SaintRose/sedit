jQuery(document).ready(function($) {
  
  new ClipboardJS('.copy');

  $('.dashicons-welcome-widgets-menus').click(function() {
    $('.fa-copy').slideToggle(0);
  });

  $('.fa-copy').click(function() {
    $(this).css('color', '#9ECD7C');
  });

});
