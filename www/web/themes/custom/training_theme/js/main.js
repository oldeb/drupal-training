(function () {
  'use strict';
  Drupal.behaviors.training = {
    attach: function (context, settings) {
      once('trainingmessage', 'html').forEach(function (element) {
          alert('coucou');
      });
    },
  };

})(Drupal);

