jQuery(document).ready(function($) {

  new ClipboardJS('.copy');

  $('.dashicons-welcome-widgets-menus').click(function() {
    $('.fa-copy').slideToggle(0);
  });

  $('.fa-copy').click(function() {
    $(this).css('color', '#9ECD7C');
  });



  tinymce.create('tinymce.plugins.wpse72394_plugin', {
          init : function(ed, url) {
                  ed.addCommand('wpse72394_insert_shortcode', function() {
                      selected = tinyMCE.activeEditor.selection.getContent();

                      if( selected ){
                          content =  '[PDF nazwa="'+selected+'" link="xxx"]';
                      }else{
                          content =  '[PDF nazwa="Nazwa linku" link="xxx"]';
                      }

                      tinymce.execCommand('mceInsertContent', false, content);
                  });
              ed.addButton('wpse72394_button', {title : 'PDF tylko dla zalogowanych', cmd : 'wpse72394_insert_shortcode' });
          },
      });
      tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wpse72394_plugin);


});
