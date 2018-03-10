$(function(){
    $(".post-text p").each(function(i){
        len=$(this).text().length;
        if(len>1000)
        {
            $(this).text($(this).text().substr(0,1000)+'...');
        }
    });
});
