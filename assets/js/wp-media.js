jQuery(document).ready(function($) {
 'use strict';
 var metaImageFrame;
 $('.addSingleMedia').click(function(e) {
 var dataID = $(this).attr('data-id');
   var btn = e.target;
   if ( !btn || !$(btn).attr('data-media-uploader-target')) return;
   var field = $(btn).data('media-uploader-target');
   e.preventDefault();
   metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
     title: 'Wybiez z katalogu',
     button: { text:  'Użyj zdjęcia' },
   });
   metaImageFrame.on('select', function() {
     var media_attachment = metaImageFrame.state().get('selection').first().toJSON();
     $(field).val(media_attachment.id);
     var url = media_attachment.url;

     $('.hide-img-' + dataID).hide();
     $(".term-group-" + dataID).append('<img class="hide-img-'  + dataID + '" src="' + url + '">');
   });
   metaImageFrame.open();

 });

});
