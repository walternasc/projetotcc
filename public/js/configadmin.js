$(document).ready(function() {
    var pathname = window.location.pathname.substring(6),
            pathname = pathname.split("/")[0],
            lol = $('.container-fluid .row-fluid .span3 ul li[name=' + pathname + ']');
    if (lol[0]) {
        $(lol).toggleClass("active");
        $('.container-fluid .row-fluid .span3 ul li[name=principal]').removeClass("active");
    } else {
        $('.container-fluid .row-fluid .span3 ul li[name=principal]').toggleClass("active");
    }
});

$(function() {
    $('#money').maskMoney({
        showSymbol: true,
        symbol: "R$",
        decimal: ",",
        thousands: "."
    });
});