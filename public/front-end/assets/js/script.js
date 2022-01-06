$(function () {
    $("#panel").on("click", function (e) {
        $("#flip").stop(true, true).slideToggle();
        if ($("#span").html() == "Show") {
            $("#span").html("Hide");
        } else {
            $("#span").html("Show");
        }
    });
});
// slick carousel starts here
$(document).ready(function () {
    $(".single-item").slick({
        fade: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: false,
    });
    $(".collection-carousel").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
    $(".seller-carousel").slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2500,
        infinite: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
});
const string = document.querySelectorAll(".post-description");
const limit = 140;
string.forEach((text) => {
    var content = text.innerText;
    if (content.length <= limit) {
        var truncateString = content;
    } else {
        var truncateString = content.slice(0, limit) + "...";
    }
    text.innerText = truncateString;
});
