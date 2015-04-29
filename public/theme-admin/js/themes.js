
// tooltip

$('.btn').tooltip();
$('.fa').tooltip();

// popover

$('.btn').popover();

//owl carousel
$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true,
        autoPlay:true
    });
});

//custom select box

$(function(){
    $('select.styled').customSelect();
});

if ($(".custom-bar-chart")) {
$(".bar").each(function () {
    var i = $(this).find(".value").html();
    $(this).find(".value").html("");
    $(this).find(".value").animate({
        height: i
    	}, 2000)
	})
}