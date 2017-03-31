$('.more-menu').click(function(){
  $('.main-navigation').toggleClass('toggled');
});

$('#primary-menu').append('<li class="more-menu"><a href="#">more</a><ul></ul></li>');

function calcWidth() {

if ($(window).width() > 640) {

  var navwidth = 0;
  var morewidth = $('#primary-menu .more-menu').outerWidth(true);
  $('#primary-menu > li:not(.more-menu)').each(function() {
      navwidth += $(this).outerWidth( true );
  });
  var availablespace = $('nav').outerWidth(true) - morewidth;
  
  if (navwidth > availablespace) {
    var lastItem = $('#primary-menu > li:not(.more-menu)').last();
    lastItem.attr('data-width', lastItem.outerWidth(true));
    lastItem.prependTo($('#primary-menu .more-menu ul'));
    calcWidth();
  } else {
    var firstMoreElement = $('#primary-menu li.more-menu li').first();
    if (navwidth + firstMoreElement.data('width') < availablespace) {
      firstMoreElement.insertBefore($('#primary-menu .more-menu'));
    }
  }
  
  if ($('.more-menu li').length > 0) {
    $('.more-menu').css('display','inline-block');
  } else {
    $('.more-menu').css('display','none');
  }
} else {
  var navwidth = 0;
  var morewidth = $('#primary-menu .more-menu').outerWidth(true);
  $('#primary-menu > li:not(.more-menu)').each(function() {
      navwidth += $(this).outerWidth( true );
  });
  var availablespace = $('nav').outerWidth(true) - morewidth;
  
    var lastItem = $('#primary-menu > li:not(.more-menu)').last();
    lastItem.attr('data-width', lastItem.outerWidth(true));
    lastItem.prependTo($('#primary-menu .more-menu ul'));
    calcWidth();

  
  if ($('.more-menu li').length > 0) {
    $('.more-menu').css('display','inline-block');
  } else {
    $('.more-menu').css('display','none');
  }
}
}
  
$(window).on('resize load',function(){
  calcWidth();
});
