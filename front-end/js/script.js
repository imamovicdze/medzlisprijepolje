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