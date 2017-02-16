'use strict'

$(document).ready(function(){
  $('.loader-wrapper').fadeOut();
  $('.hero').fadeIn();

  $('.owl-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    center: true,
    dots: false
  });

  //video
  var $iframe = $('iframe');
  var $videocontainer = $('.video-foreground');
  var videoRatio = $iframe.height()/$iframe.width();

  function setVideoDimensions () {
    $iframe.width($(window).width());
    var newHeight = $(window).width()*videoRatio
    $iframe.height(newHeight);
    $videocontainer.height(newHeight);
  }

  setVideoDimensions();

  $(window).resize(function(){
    setVideoDimensions();
  });
  //ga
  // var trackOutboundLink = function(url) {
  //   ga('send', 'event', 'outbound', 'click', url, {'hitCallback':
  //     function () {
  //     document.location = url;
  //     }
  //   });
  // };
  //
  // $('a').on('click', function(){
  //   trackOutboundLink($(this).attr('href'));
  // });

  //mobile detection
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $('.clouds').hide();
  }

});
