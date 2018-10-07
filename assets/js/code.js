jQuery(document).ready(function($) {

  new ClipboardJS('.copy');

  $('.sedit-copy').click(function() {
    $('.fa-copy').slideToggle(0);
  });

  $('.fa-copy').click(function() {
    $(this).css('color', '#9ECD7C');
  });



});
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
