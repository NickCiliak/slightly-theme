//$('#primary-menu').append('<li class="more-menu"><a href="#" class="more-link"></a><ul class="menu-list"></ul></li>');
//
//$('.more-link').click(function(){
//  $('.main-navigation').toggleClass('toggled');
//});
//
//$('.menu-item-has-children a').on('click', function(){
//  $(this).next('.sub-menu').toggleClass('toggled');
//});
//
//function calcWidth() {
//
//  
//if ($('#primary-menu > li:not(.more-menu)').length === 0) {
//  
//      $('.more-menu > ul > li').each(function(){
//        $(this).insertBefore($('#primary-menu > li.more-menu'));
//      });
//}
//  
//  var navwidth = 0;
//  var morewidth = $('#primary-menu .more-menu').outerWidth(true);
//  $('#primary-menu > li:not(.more-menu)').each(function() {
//      navwidth += $(this).outerWidth( true );
//  });
//  var availablespace = $('.main-navigation > div').outerWidth(true) - morewidth;
//  
//  if (navwidth > availablespace) {
//    var lastItem = $('#primary-menu > li:not(.more-menu)').last();
//    lastItem.attr('data-width', lastItem.outerWidth(true));
//    lastItem.prependTo($('#primary-menu .more-menu > ul'));
//    calcWidth();
//  } else {
//    var firstMoreElement = $('#primary-menu li.more-menu > ul > li').first();
//    if (navwidth + firstMoreElement.data('width') < availablespace) {
//      firstMoreElement.insertBefore($('#primary-menu .more-menu'));
//    }
//  }
//  
//  if ($('.more-menu > ul > li').length > 0) {
//    $('.more-menu').css('display','inline-block');
//  } else {
//    $('.more-menu').css('display','none');
//  }
//}
//  
//$(window).on('resize load',function(){
//  
//if (window.innerWidth > 540) {
//  calcWidth();
//  $('.more-link').text('more');
//} else {
//  $('.more-link').text('menu');
//  $('#primary-menu > li:not(.more-menu)').each(function(){
//        $('#primary-menu > li:not(.more-menu)').last().prependTo($('#primary-menu .more-menu > ul'));
//      });
//  }
//  
//  if ($('.more-menu > ul > li').length > 0) {
//    $('.more-menu').css('display','inline-block');
//  } else {
//    $('.more-menu').css('display','none');
//  }
//});

$('.menu-toggle').click(function(){
    $('#primary-menu').toggleClass('menu-visible');
});