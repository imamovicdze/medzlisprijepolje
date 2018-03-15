$("#btn-toggler").click(function(){
      $("#menu-small").slideToggle()
});

$(function(){
    $(".single-related-text").each(function(i){
        len=$(this).text().length;
        if(len>135)
        {
            $(this).text($(this).text().substr(0,135)+'...');
        }
    });
});

$("#fade").fadeOut(4500);
$("#f1").fadeOut(4500);
$("#f2").fadeOut(4500);
$("#f3").fadeOut(4500);
$("#f4").fadeOut(4500);
$("#isSent").fadeOut(4500);
