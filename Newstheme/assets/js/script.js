(function ($) {


$('.search').click(function(){
    $('.search-box').fadeIn();
    $('.overlay').fadeIn();
    $('.mobile-menu').hide();
})


$('.overlay').click(myFunction);
$('.hide-search').click(myFunction);

function myFunction() {
    $('.search-box').fadeOut();
    $('.overlay').fadeOut();
}

$('.toggle-icon').click(function(){
    $('.mobile-menu').toggle();
    $('body').toggleClass('scroll-disable');
})



window.onresize = function(){
	let windowSize = window.matchMedia("(min-width: 992.1px)");
	if(windowSize.matches)
    $('.mobile-menu').hide();
    $('body').removeClass('scroll-disable');
}


$('.navbar-toggler').click(function(){
  $('.navbar-toggler i').toggleClass('rotate-test');
  setTimeout(function(){
    $('.navbar-toggler i').toggleClass('fa-bars');
    $('.navbar-toggler i').toggleClass('fa-times');
 },0);

})




})(jQuery);



