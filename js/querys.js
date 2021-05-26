$(document).ready(function () {

    function moneys() {
        var valmoney = $(".index-mony-for-client-add").val();
        $(".s-mony-2").html(valmoney);
    }

    moneys();

    $(".submenu-div").parent().after('<i class="fa fa-angle-down" aria-hidden="true"></i>');
    $(".submenu-div ul li ul li").before('<i class="fa fa-angle-left submenu-div-i" aria-hidden="true"></i>');
    var s = eval($(".secunds").html());
    var m = $(".minute").html();
    var h = $(".hower").html();
    var d = $(".day").html();
    setInterval(function () {

        $(".secunds").html(s -= 1);
        if (s == 0) {
            s = 60;
            $(".minute").html(m -= 1);
            if (m == 0) {
                m = 60;
                $(".hower").html(h -= 1);
                if (h == 0) {
                    h = 24;
                    $(".day").html(d -= 1);
                    if (d == 0) {
                        d = 3
                    }
                }
            }
        }
    }, 1000)


    $('.slid-boxed2 .owl-carouself').owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,

        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })
    $('.slid-boxed3 .owl-carouself').owlCarousel({
        items: 3,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,

        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })

    $('.owl-carousel').owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,

        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })

    $(".men-mobo-1").click(function () {
        $(".cover-menu-mobile").css({
            'width': '100%',
            'height': '100%',
            'opacity': '1'
        })
        $(".left-mobomenu").css({
            'opacity': '1',
            'pointer-events': 'pointer',

        })
    })

    $(".close").click(function () {
        $(".cover-menu-mobile").css({
            'width': '0%',
            'height': '0%',
            'opacity': '0'
        })
        $(".left-mobomenu").css({
            'opacity': '0',
            'pointer-events': 'none',
        })
    })

    var zero = 0;
    var one = 180;
    $(".ul-menu-class li ul").not(".open-menu").slideUp();

    $('.ul-menu-class li .tooge-menu').click(function () {
        $(this).parent("li").children('ul').addClass("open-menu");
        $(".ul-menu-class li ul").not(".open-menu").slideUp();
        $(this).parent("li").children('ul').slideToggle();
        $(this).toggleClass('roted');
        $(this).parent("li").children('ul').removeClass("open-menu");
    });

    $(".bascet").click(function () {
        $(".basket-desktop").css('left', '0px');
        $(".cover-basket-desktop").css({
            'opacity': '1',
            'pointer-events': 'painted',
        });

        $(".cover-basket-desktop").click(function () {
            $(".basket-desktop").css('left', '-270px');
            $(this).css({
                'opacity': '0',
                'pointer-events': 'none',
            });
        });
    });

    $(".f-footer-ul li a").before('<i class="fa fa-circle circlef" ></i>');
    $(".s-footer-ul li a").before('<i class="fa fa-circle-thin circlef"></i>');
    $(".l-footer-ul li a").before('<i class="fa fa-chevron-left circlef"></i>');

    $(".title-slid-coll-all-click").click(function () {
        $(this).next().slideToggle();
        $(this).find(".puses1").toggleClass('pusshide');
        $(this).find(".puses2").toggleClass('pusshide');
        $(this).toggleClass('background-click');

    });

    $(".port-download").click(function () {
        $(this).next().slideToggle();
        $(this).find(".fa-angle-double-down").toggleClass('top');
        // $(this).find(".puses2").toggleClass('pusshide');
        // $(this).toggleClass('background-click');

    });

    $(".mor-im-or").click(function () {
        var x = $(this).attr('src');
        $('.or-img-pro').attr('src', x);
        $(".or-img-pro").blowup({
            width: 150,
            height: 150,
            scale: 1,
            background: '#429e90',
            border: '1px solid white',
            round: true,
            shadow: 'none'
        });
    });

});
function printDiv(divID) {
    var divElements = document.getElementById(divID).innerHTML;
    var myWindow = window.open("", "myWindow", "");
    var body ="<!DOCTYPE html><html lang='en' dir='rtl'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'><link rel='stylesheet' href='owlcarousel/owl.carousel.min.css'><link rel='stylesheet' href='owlcarousel/owl.theme.default.min.css'><link rel='stylesheet' href='css/bootstrap.min.css'><link rel='stylesheet' href='style/costom.css'><link rel='stylesheet' href='style/remond.css'><link rel='stylesheet' href='style/animate.css'><link rel='stylesheet' href='css/animate.min.css' /><link rel='stylesheet' href='icons/css/font-awesome.min.css'><link rel='stylesheet' href='style.css'><link rel='stylesheet' href='style/media.css'><link rel='stylesheet' href='style/mod-side.css'><link rel='stylesheet' href='style/client-costum-area.css'><title></title></head><body>"
    myWindow.document.write(body + divElements);
    setTimeout(function(){ myWindow.print();}, 500);
    setTimeout(function(){ myWindow.close(); }, 2000);
}