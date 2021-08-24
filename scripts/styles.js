$(document).ready(function () {
    sliderHeight = screen.width < 769 ? 300 : 400;
    $('.slider').slider({
        full_width: true,
        height: sliderHeight
    });
    $('.carousel.carousel-slider').carousel({
        fullWidth: true
    });

    $('.datepicker').datepicker();
    $('.tabs').tabs({ /*'swipeable': true*/ });

    $('.modal').modal();

    $('select').formSelect();

    $('.sidenav').sidenav();
});