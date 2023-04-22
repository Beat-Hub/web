$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Cuando el documento esté listo, se ejecuta esta función
    $('.btn-like').click(function(e) {
        // Al hacer clic en cualquier botón con clase "btn-like"
        e.preventDefault();
        // Previene que la página se recargue al hacer clic en el botón

        const beatId = $(this).data('beat-id');
        // Obtiene el valor del atributo "data-beat-id" del botón que se hizo clic
        const url = $(this).data('like-url');

        // Reemplaza el marcador de posición ":beatId" en la URL con el valor de beatId

        $.ajax({
            // Realiza una solicitud AJAX con los siguientes parámetros
            type: 'POST',
            url: url,
            data: {
                beat_id: beatId
            }
        }).then((data) => {
            const likeCounter = $(
                $(`.like-counter[data-beat-id="${beatId}"]`)[0]
            );
            const likeHeart = $(
                $(`.like-heart[data-beat-id="${beatId}"]`)[0]
            );

            let likes = parseInt(likeCounter.text());

            if (data.like_added) {
                likes += 1;
                likeHeart.addClass('fa-solid');
            } else {
                likes -= 1;
                likeHeart.removeClass('fa-solid');
            }

            likeCounter.text(likes)
        });
    });
});

