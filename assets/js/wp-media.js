jQuery(document).ready(function($) {
  'use strict';
  var metaImageFrame;

  $('.addSingleMedia').click(function(e) {
    var dataID = $(this).attr('data-id');
    var btn = e.target;
    if (!btn || !$(btn).attr('data-media-uploader-target')) return;
    var field = $(btn).data('media-uploader-target');
    e.preventDefault();
    metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
      title: 'Wybiez z katalogu',
      button: {
        text: 'Użyj zdjęcia'
      },
    });
    metaImageFrame.on('select', function() {
      var media_attachment = metaImageFrame.state().get('selection').first().toJSON();
      $(field).val(media_attachment.id);
      var url = media_attachment.url;

      $('.hide-img-' + dataID).hide();
      $(".term-group-" + dataID).append('<img class="hide-img hide-img-' + dataID + '" src="' + url + '">');
    });
    metaImageFrame.open();

  });

  var custom_uploader;
  $('.addMultiMedia').click(function(e) {
    var dataID = $(this).attr('data-id');
    var nameField = $(this).attr('data-name-field');
    var btn = e.target;
    if (!btn || !$(btn).attr('data-media-uploader-target')) return;
    var field = $(btn).data('media-uploader-target');
    e.preventDefault();
    if (custom_uploader) {
      custom_uploader.open();
      return;
    }
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
      title: 'Wybierz zdjęcia',
      button: {
        text: 'Wybierz'
      },
      multiple: true
    });
    custom_uploader.on('select', function() {
      var selection = custom_uploader.state().get('selection');
      selection.map(function(attachment) {
        attachment = attachment.toJSON();
        //console.log(attachment);
        $('.hide-img-' + dataID).hide();
        //$(".term-group-" + dataID).append("<img src=" +attachment.url+">");
        $(".sort-images-" + dataID).append('<div class="image-theme ui-sortable-handle"><input name="' + nameField + '[]" value="' + attachment.id + '" type="hidden"><img src="' + attachment.sizes.thumbnail.url + '"></div>');
        var multi = $(field).val();
        $(field).val('');
        $(field).val(multi + attachment.id + ',');
      });
    });

    custom_uploader.open();
  });

  // kasowanie pojedynczego zdj w atomie typu images
  $('.image-remove').click(function() {
    var crashID = $(this).attr('data-crash');
    var dataID = $(this).attr('data-id');
    $('.image-' + dataID).css('display', 'none');
    $('.' + dataID + '-trash').attr('name', 'null');
  });
  $('.sort-images').sortable();

  //kasowanie wszystkich zdjec w atom tpe images
  $('.delete-all-image').click(function() {
    var crashID = $(this).attr('data-crash');
    $('.input-name-' + crashID).val('');
    $('.crash-all-image-' + crashID).html('');
  });


  $('.addSingleMediaFile').click(function(e) {
    var dataID = $(this).attr('data-id');
    var btn = e.target;
    if (!btn || !$(btn).attr('data-media-uploader-target')) return;
    var field = $(btn).data('media-uploader-target');
    e.preventDefault();
    metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
      title: 'Wybiez z katalogu',
      button: {
        text: 'Wybierz plik'
      },
    });
    metaImageFrame.on('select', function() {
      var media_attachment = metaImageFrame.state().get('selection').first().toJSON();
      $(field).val(media_attachment.id);
      var url = media_attachment.url;

      $('.hide-img-' + dataID).hide();
      //$(".term-group-" + dataID).append('<img class="hide-img hide-img-'  + dataID + '" src="' + url + '">');
      $(".term-group-" + dataID).append('<a class="hide-img hide-img-' + dataID + '" href="' + url + '">Podgląd nowy plik</a>');
    });
    metaImageFrame.open();

  });


});
