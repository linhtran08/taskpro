
$(document).ready(function (){

    // Header fixed and Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.tv-back-to-top').fadeIn('slow');
            $('#header').addClass('header-fixed');
        } else {
            $('.tv-back-to-top').fadeOut('slow');
            $('#header').removeClass('header-fixed');
        }
    });

    $('.tv-back-to-top').click(function() {
        $('html, body').animate({scrollTop: 0},1000);
    });


    $(window).on('load', function() {
        aos_init();
    });
});

// Init AOS
function aos_init() {
    AOS.init({
        duration: 1000,
    });
}
