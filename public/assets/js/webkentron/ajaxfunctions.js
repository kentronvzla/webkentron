$(document).ajaxComplete(function () {
    $("[id=contenedorEspera]").each(function () {
        $(this).fadeOut(500);
    });
    documentoListo();
});

$(document).ajaxStart(function () {
    mostrarEspera("Por favor espere.");
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    statusCode: {
        500: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Error interno del servidor)</i>");
        },
        401: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Es necesaria autenticación)</i>");
        },
        403: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(El sistema denegó el acceso al recurso)</i>");
        },
        404: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Página no encontrada)</i>");
        },
        410: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Recurso no encontrado)</i>");
        }
    }
});


function guardarAyudasLocal() {
    $.ajax({
        type: "GET",
        url: baseUrl + "admin/ayudas/todas",
        cache: false,
        dataType: 'json',
        success: function (data) //Si se ejecuta correctamente
        {
            $.each(data, function (index, elem) {
                localStorage.setItem(elem.FORMULARIO + '.' + elem.CAMPO, elem.AYUDA);
                localStorage.setItem(elem.FORMULARIO + '.' + elem.CAMPO + '.id', elem.ID);
            });
        }
    });
}

function cargarDiv(url, dest, callback) {
    $('#' + dest).empty();
    $.ajax({
        type: "GET",
        url: baseUrl + url,
        cache: false,
        dataType: 'html',
        success: function (data) //Si se ejecuta correctamente
        {
            $('#' + dest).html(data);
            if (callback != undefined) {
                callback();
            }
        }
    });
}

function buscarAyuda(formulario, campo) {
    var ayuda = localStorage.getItem(formulario + '.' + campo);
    if (ayuda == undefined) {
        $.ajax({
            type: "GET",
            url: baseUrl + 'admin/ayudas/buscar/' + formulario + '/' + campo,
            cache: false,
            dataType: 'json',
            success: function (data) //Si se ejecuta correctamente
            {
                $('#contenedorAyuda').attr("data-id", data.ID);
                $('#contenedorAyuda').html(data.AYUDA);
                localStorage.setItem(formulario + '.' + campo, data.AYUDA);
                localStorage.setItem(formulario + '.' + campo + '.id', data.ID);
            }
        });
    } else {
        $('#contenedorAyuda').attr("data-id", localStorage.getItem(formulario + '.' + campo + '.id'));
        $('#contenedorAyuda').html(ayuda);
    }
}

function getCombo(select, destino, url)
{
    $.ajax({
        type: "GET",
        url: baseUrl + url + "/" + $(select).val(),
        cache: false,
        dataType: 'json',
        success: function (data) //Si se ejecuta correctamente
        {
            $('#' + destino).empty();
            var ultimo, cantidad = 0;
            if (data != null) {
                $.each(data, function (i, value) {
                    if (i != "") {
                        ultimo = i;
                    }
                    cantidad++;
                    $('#' + destino).append("<option value='" + i + "'>" + value + "</option>");
                });
                if (cantidad == 2) {
                    $('#' + destino).val(ultimo);
                    $('#' + destino).change();
                } else {
                    $('#' + destino).val("");
                }
            }
        }
    });
}

function getObject(url, callback, method) {
    if (method == undefined) {
        method = "GET";
    }
    $.ajax({
        type: method,
        url: baseUrl + url,
        cache: false,
        dataType: 'json',
        success: function (data) //Si se ejecuta correctamente
        {
            callback(data);
        },
        error: function (data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}

function enviarRequest(url) {
    $.ajax({
        type: "GET",
        url: baseUrl + url,
        cache: false,
        dataType: 'json',
        success: function (data) //Si se ejecuta correctamente
        {
            mostrarMensaje(data.mensaje);
        },
        error: function (data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}

function guardarFormulario() {
    $("form.saveajax").unbind('submit');
    $("form.saveajax").submit(function (e) {
        var data, contenido;
        if ($(this).attr('enctype') == "multipart/form-data") {
            data = new FormData(this);
            contenido = false;
        } else {
            data = $(this).serialize();
            contenido = 'application/x-www-form-urlencoded; charset=UTF-8';
        }
        $(this).find('input, textarea, select, checkbox, radio').parent().removeClass("has-error");
        $(this).find('.help-block').remove();
        $.ajax({
            url: $(this).attr('action'),
            data: data,
            cache: false,
            processData: false,
            contentType: contenido,
            formulario: this,
            dataType: 'json',
            method: $(this).attr("method") == undefined ? "POST" : $(this).attr("method"),
            success: function (data) {
                if (data.mensaje != "") {
                    mostrarMensaje(data.mensaje);
                }
                var callback = $(this.formulario).attr('data-callback');
                if (callback != undefined && callback != "") {
                    window[callback](data);
                }
                if (data.vista != undefined) {
                    $(this.formulario).parent().html(data.vista);
                }
                if (data.url) {
                    window.location.href = data.url;
                }
            },
            error: function (data)
            {
                var formulario = this.formulario;
                if (data.status == 400) {
                    mostrarError(procesarErrores(data.responseJSON.errores));
                    $.each(data.responseJSON.errores, function (key, value) {
                        $('#' + key).parent().addClass('has-error has-feedback');
                        $.each(value, function (key2, value2) {
                            $(formulario).find('#' + key).parent().append("<span class='help-block'>" + value2 + "</span>");
                        });
                    });
                }
            }
        });
        e.preventDefault();
    });

}

function modificarAjax() {
    $('button.glyphicon-pencil, a.glyphicon-pencil, button.fa-pencil, a.fa-pencil, .edit-trigger').unbind('click');
    $('button.glyphicon-pencil, a.glyphicon-pencil, button.fa-pencil, a.fa-pencil, .edit-trigger').click(function (evt) {
        if ($(this).attr('href') == undefined) {
            evt.preventDefault();
        } else {
            return;
        }
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var div = $(this).closest('.panel-body');
        $.ajax({
            url: baseUrl + url + "/" + id,
            success: function (data) {
                div.html(data);
            }
        });
    });
}

function eliminarAjax() {
    $('button.glyphicon-trash, a.glyphicon-trash, button.fa-trash, a.fa-trash').unbind('click');
    $('button.glyphicon-trash, a.glyphicon-trash, button.fa-trash, a.fa-trash').click(function (evt) {
        if ($(this).attr('href') == undefined) {
            evt.preventDefault();
        } else {
            return;
        }
        var btn = this;
        confirmarIntencion("¿Esta seguro que desea eliminar el elemento seleccionado?", function () {
            var id = $(btn).attr('data-id');
            var url = $(btn).attr('data-url');
            var div = $(btn).closest('.panel-body');
            $.ajax({
                url: baseUrl + url + "?id=" + id,
                method: 'delete',
                success: function (data) {
                    div.html(data.vista);
                    mostrarMensaje(data.mensaje);
                },
                error: function (data)
                {
                    if (data.status == 400) {
                        mostrarError(procesarErrores(data.responseJSON.errores));
                    }
                }
            });
        });
    });
}

function documentoListo() {
    iniciarLibrerias();
    confirmarEliminacion();
    volverAtras();
    guardarFormulario();
    modificarAjax();
    eliminarAjax();

}


