$(function(){

    $('.zoom').bind('click', function(){
        var img = $(this).find('img').attr('src');

       $('.back-imagem img').attr('src', img);
       $('.back-total, .back-imagem').fadeIn('fast');
    });

    $('.back-total, .back-imagem button').bind('click', function(){

        $('.back-total, .back-imagem').fadeOut('fast');

    });
});