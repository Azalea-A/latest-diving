"use strict";

jQuery(document).ready(function ($) {
  // 制限したいタクソノミーのスラッグを配列で指定
  var restrictedTaxonomies = ['voice_category', 'campaign_category'];
  restrictedTaxonomies.forEach(function (taxonomySlug) {
    $('body').on('change', 'input[name="tax_input[' + taxonomySlug + '][]"]', function () {
      var checked = $('input[name="tax_input[' + taxonomySlug + '][]"]:checked');
      if (checked.length > 1) {
        $(this).prop('checked', false);
        alert('1つのタームしか選択できません。');
      }
    });
  });
});

