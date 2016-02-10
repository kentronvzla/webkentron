$(document).ready(function () {
    iniciarLibrerias();
});

function fondoSubido(url) {
    $('#fondoContenido').attr('src', url);
    mostrarMensaje("Se añadio el fondo correctamente.");
}
