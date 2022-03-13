$(document).ready(function() {
    $(".fruit").hide();
    $(".empty_color").show();

    // Ajout du fruit numéro 1 sur chaque fruit
    $(".fruit").each(function(index) {
        $(this).addClass("fruit1");
    })

    $(".card").click(function() {
        $(this).find(".empty_color").toggle();
        $(this).find(".fruit").toggle();
    })
});