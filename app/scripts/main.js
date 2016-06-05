'use strict'

$(document).ready(function(){
  $('.loader-wrapper').fadeOut();
  $('.hero').fadeIn();

  //ga
  var trackOutboundLink = function(url) {
    ga('send', 'event', 'outbound', 'click', url, {'hitCallback':
      function () {
      document.location = url;
      }
    });
  };

  $('a').on('click', function(){
    trackOutboundLink($(this).attr('href'));
  });

});
