$(document).ready(function() {
    $('.fancyimage').fancybox();
});

$(document).ready(function() {
    $('.slider2').bxSlider();
});


$(document).ready(function() {
    var pathname = window.location.pathname.substring(6),
            lol = $('#nav li a[name=' + pathname + ']');
    if (lol[0]) {
        $(lol).toggleClass("current");
        $('#nav li a[name=home]').removeClass("current");
    } else {
        $('#nav li a[name=home]').toggleClass("current");
    }
});