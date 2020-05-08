var url = 'http://localhost/LaraInsta/public';
window.addEventListener("load", function() {
    // alert('La pagina esta cargada');
    // Probamos que este cargado jQuery
    // $('body').css('background','red');

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    // Boton like
    function like() {
        $('.btn-like').unbind('click').click(function() {
            console.log('Like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'/img/heart-gray.png');

            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type: 'GET',
                success:function (response) {
                    if (response.like) {
                        console.log('Has dado like');
                    }else{
                        console.log('Error al dar like');
                    }
                    console.log(response);
                }
            });
            dislike();
        });
    }
    like();

    // Boton dislike
    function dislike() {
        $('.btn-dislike').unbind('click').click(function() {
            console.log('DisLike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url+'/img/heart-red.png');

            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type: 'GET',
                success:function (response) {
                    if (response.like) {
                        console.log('Has dado dislike');
                    }else{
                        console.log('Error al dar dislike');
                    }
                    console.log(response);
                }
            });
            like();
        });
    }
   dislike();
});