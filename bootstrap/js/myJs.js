/*$(document).ready(function(){
    $('.sponzori').slick({
        slidesToShow: 3,
        slidesToScroll:1,
        autoplay:true,
        autoplaySpeed: 1000,
        speed:1000,
        centerMode:true,
        dots:true,
        arrows:false,
        rtl:true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows:false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows:false
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows:false
                }
            }
        ]
    });
});
*/
/*
var clicked = 0;
$(document).ready(function () {
        if (clicked === 1) {
            $('html, body').animate({
                scrollTop: $("#section03").offset().top
            }, 2000);
            clicked = 0;
        }
        else {
            clicked = 0
        }
    }
);
$(function () {
    $(".page-link").on("click", function () {
        clicked = 1;
    });
})

*/
$(document).ready(function () {

    $('[data-confirm]').on("click", function (e) {
        e.preventDefault();
        var msg = $(this).data("confirm");
        if (confirm(msg) == true) {
            var url = this.href;
            if (url.length > 0) window.location = url;
            return true;
        }
        return false;
    });

    // na urcity link se ulozi pozice
    $('.page-link').on("click", function (e) {
        e.preventDefault();
        var currentYOffset = window.pageYOffset;  // ulozi si stavajici pozici stranky
        Cookies.set('jumpToScrollPostion', currentYOffset);
        if (!$(this).attr("data-confirm")) {
            var url = this.href;
            window.location = url;

        }
    });


    if (Cookies.get('jumpToScrollPostion') !== "undefined") {
        var jumpTo = Cookies.get('jumpToScrollPostion');
        window.scrollTo(0, jumpTo);
        Cookies.remove('jumpToScrollPostion');
    }
});

$(function () {
    $('.downChevron').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });
});


