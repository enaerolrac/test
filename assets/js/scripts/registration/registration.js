$(document).on("click", ".list-group>.list-group-item", function(){
    $(".list-group-item").removeClass("selected")
    $(this).addClass("selected");
});