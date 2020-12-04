(function($) {
    "use strict";
  
    var nav = $('nav');
    var navHeight = nav.outerHeight();
  
    $('.navbar-toggler').on('click', function() {
      if (!$('#mainNav').hasClass('navbar-reduce')) {
        $('#mainNav').addClass('navbar-reduce');
      }
    })