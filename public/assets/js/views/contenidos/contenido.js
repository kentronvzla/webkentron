$(document).ready(function () {
    mostrarLinks();
});

function mostrarLinks() {
    $(".detalle").find("a").each(function () {
        var validez = validarYoutube($(this).attr("href"));
        if (validez == false) {
            $(".referencia").append("<span class='label label-info'><a href='" + $(this).attr('href') + "'>" + $(this).attr('rel') + "</a></span> ");
            $(this).remove();
        } else {
            $(".videoyoutube").append("<div class='embed-responsive embed-responsive-16by9'>\n\
                            <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/" + validez + "'></iframe>\n\
                        </div><br>");
            $(this).remove();
        }
    });
}

function validarYoutube(url) {
    var patron = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
    return (patron.test(url)) ? RegExp.$1 : false;
}
