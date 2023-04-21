$(document).ready(function() {
    // Cuando el documento esté listo, se ejecuta esta función
    $('.btn-like').click(function(e) {
        // Al hacer clic en cualquier botón con clase "btn-like"
        e.preventDefault();
        // Previene que la página se recargue al hacer clic en el botón

        var beatId = $(this).data('beat-id');
        // Obtiene el valor del atributo "data-beat-id" del botón que se hizo clic
        var url = "{{ route('beats_like', ':beatId') }}".replace(':beatId', beatId);
        // Reemplaza el marcador de posición ":beatId" en la URL con el valor de beatId

        $.ajax({
            // Realiza una solicitud AJAX con los siguientes parámetros
            type: 'POST',
            url: url,
            data: {
                _token: "{{ csrf_token() }}",
                beat_id: beatId
            },
            // Los datos que se envían en la solicitud, incluyendo el token CSRF y el ID del beat
            success: function(response) {
                // Si la solicitud es exitosa, se ejecuta esta función
                $('.like-count').text(response.likes);
                // Actualiza el texto del elemento con clase "like-count" con la cantidad de "likes" del beat
            }
        });
    });
});

