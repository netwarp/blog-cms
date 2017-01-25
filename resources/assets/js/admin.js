require('./bootstrap');

tinymce.init({
      selector: 'textarea',
      plugins: 'paste fullscreen codesample code image media',
      paste_data_images: true,
      images_upload_url: '/api/upload',
      images_upload_base_path: '/api/upload',
      location : '/api/upload',
      menubar: true,
      content_style: ".mce-content-body  {font-size: 14px;}",
      toolbar: 'undo redo bold italic alignleft aligncenter alignright codesample fullscreen code image media'
})