$(document).ready(function () {
    agregarEventos();
    iniciarLibrerias();
});

function fondoSubido(url) {
    $('#fondoContenido').attr('src', url);
    mostrarMensaje("Se añadio el fondo correctamente.");
}

function agregarEventos() {
    $('.ckeditor').each(function () {
        $(this).ckeditor();
    });
}
