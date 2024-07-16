"use strict";

console.log("media-upload.js is loaded");
function selectImage(fieldId) {
  console.log("selectImage function called for field: " + fieldId);
  var custom_uploader = wp.media({
    title: 'Select Image',
    button: {
      text: 'Use this image'
    },
    multiple: false
  }).on('select', function () {
    var attachment = custom_uploader.state().get('selection').first().toJSON();
    console.log("Image selected: ", attachment);
    document.getElementById(fieldId).value = attachment.url;
    document.getElementById(fieldId + '_preview').innerHTML = '<img src="' + attachment.url + '" style="max-width: 100px; height: auto;" />';
  }).open();
}