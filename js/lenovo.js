/**
 * @file
 * Provides JavaScript for Inline Entity Form.
 */

(function ($) {

  $(document).ready(function () {
    console.log("Lenovo Custom JS has been attached to this page");

  });
/*
/!**
 * Allows submit buttons in entity forms to trigger uploads by undoing
 * work done by Drupal.behaviors.fileButtons.
 *!/
Drupal.behaviors.inlineEntityForm = {
  attach: function (context) {
    /!*
    if (Drupal.file) {
      $('input.ief-entity-submit', context).unbind('mousedown', Drupal.file.disableFields);
    }
    *!/
  },
  detach: function (context) {
    /!*
    if (Drupal.file) {
      $('input.form-submit', context).bind('mousedown', Drupal.file.disableFields);
    }
    *!/
  }
};
*/

})(jQuery);
