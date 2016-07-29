$(document).ready(function () {
    var base_url = $('#baseurl').data("url");
    window.baseUrl = base_url+'/';
//    window.$ = jQuery.noConflict();
//    window.CKEDITOR_BASEPATH = baseUrl + 'ckeditor/';
})


function documentReady() {
    loadCarouselEvents();
    loadProjectColors();
    loadModalEvents();
    autoCompletado();
    ayudasNavegador();
    navBar();
    activeLink();
    establishHistroyVariables();
    acordion();
    documentoListo();
    abrirModal();
    resetearFormulario();
    multiSelect();
}

function iniciarLibrerias() {
    iniciarSelect();
    iniciarDecimalFormat();
    iniciarTooltipAyuda();
    iniciarDatePicker();
    iniciarPopoverRaty();
    iniciarJqueryTable();
    iniciarDropzone();
}


function documentoListo() {
    iniciarLibrerias();
    confirmarEliminacion();
    volverAtras();
    guardarFormulario();
    modificarAjax();
    eliminarAjax();

}

function loadCarouselEvents() {
    $(".carousel").carousel({
        interval: 5000
    });

    $("#owl-principal").owlCarousel({
//        navigation: true,
//        navigationText : ["Anterior","Siguiente"],
        navigation: false,
        navigationText: false,
        singleItem: true,
        autoPlay: 6000,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [980, 1],
        itemsTablet: [768, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        transitionStyle: "goDown"
//        afterInit: customPager,
//        afterUpdate: customPager
    });

    $("#owl-articulos").owlCarousel({
        items: 3,
        lazyLoad: true,
        navigation: true,
        navigationText: [
            "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>",
            "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>"

        ],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [750, 2],
        itemsTabletSmall: [523, 1],
        itemsMobile: [463, 1],
//        beforeInit: function (elem) {
//            Parameter elem pointing to $("#owl-demo")
//            random(elem);
//        }
    });

    $("#owl-proyectos").owlCarousel({
        navigation: true,
        singleItem: false,
        items: 6, //10 items above 1000px browser width
        itemsDesktop: [1199, 3], //5 items between 1000px and 901px
        itemsDesktopSmall: [980, 3], // betweem 900px and 601px
        itemsTablet: [750, 2], //2 items between 600 and 0
        itemsTabletSmall: [523, 1],
        itemsMobile: [463, 1], // itemsMobile disabled - inherit from itemsTablet option
        navigationText: [
            "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>",
            "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>"
        ]
    });
}

function loadProjectColors() {
    var colors = ["#D2D2D2", "#808080", "#0094D8", "#1E3954"];
    $(".controls-wrapper").each(function (index) {
        if (index < 4) {
            $(this).css("background-color", colors[index]);
        } else if (index >= 4 && index <= 7) {
            $(this).css("background-color", colors[index - 4]);
        } else if (index >= 8 && index <= 11) {
            $(this).css("background-color", colors[index - 8]);
        } else if (index >= 12 && index <= 15) {
            $(this).css("background-color", colors[index - 12]);
        } else if (index >= 16 && index <= 19) {
            $(this).css("background-color", colors[index - 16]);
        } else if (index >= 20) {
            $(this).css("background-color", colors[index - 20]);
        }
    });
}

function loadModalEvents() {

//    Funcion para mostrar ventana modal
    $(".modal-window").unbind("click");
    $(".modal-window").click(function () {
        var element = $(this);
        var url = element.attr("data-url");
        $.get(url, function (data) {
            console.log(data);
            if ($('#modal-window1').is(':empty')) {
                $('#modal-window1').html(data);
                $('#modal-window1').modal('toggle');
            } else {
                $('#modal-window2').html(data);
                $('#modal-window2').modal('toggle');
            }
        });
        return false;
    });

//    Funcion para limpiar ventana modal al cerrar
    $('#modal-window1').on('hidden.bs.modal', function (e) {
        $("#modal-window1").empty();
        if ($(this).children().attr('data-reload') != undefined) {
            window.location.reload();
        }
    });
    $('#modal-window2').on('hidden.bs.modal', function (e) {
        $("#modal-window2").empty();
        if ($(this).children().attr('data-reload') != undefined) {
            window.location.reload();
        }
    });
}

function customPager() {

    $.each(this.owl.userItems, function (i) {
        var titleData = jQuery(this).find('img').attr('title');
        var paginationLinks = jQuery('.owl-controls .owl-pagination .owl-page span');
        $(paginationLinks[i]).append(titleData);

    });
}

function movePager(elem) {
    var that = this
    that.owlControls.prependTo(elem);
}

function mostrarEspera(mensaje) {
    $("[id=container-wait]").each(function () {
        $(this).fadeIn(500);
        $(this).html("<img src='" + baseUrl + "img/loader.gif'> " + mensaje);
    });
}

function mostrarMensaje(mensaje) {
    $("[id=contenedorCorrecto]").each(function () {
        $(this).fadeIn(500);
        $(this).html("<span class='glyphicon glyphicon-ok'></span> " + mensaje);
    });
    setTimeout(function () {
        $("[id=contenedorCorrecto]").each(function () {
            $(this).fadeOut(500);
        });
    }, 4000);
}

function mostrarError(mensaje) {
    $("[id=contenedorError]").each(function () {
        $(this).fadeIn(500);
        $(this).html(mensaje);
    });
    setTimeout(function () {
        $("[id=contenedorError]").each(function () {
            $(this).fadeOut(500);
        });
    }, 4000);
}

function procesarErrores(errores) {
    var mensaje = "";
    try {
        $.each(errores, function (key, value) {
            $.each(value, function (key2, value2) {
                mensaje += "<span class='glyphicon glyphicon-remove'></span> " + value2 + "</br>";
            });
        });
    } catch (err) {
        return mensaje = "<span class='glyphicon glyphicon-remove'></span> " + errores + "</br>";
    }
    return mensaje;
}

function mostrarOcultar(ocultar, div, parent) {
    if (parent == undefined) {
        parent = document;
    }
    if (ocultar) {
        $(parent).find('#' + div).find('input,select,textarea').removeAttr('required');
        $(parent).find('#' + div).hide();
    } else {
        $(parent).find('#' + div).show();
        $(parent).find('#' + div).find('input,select,textarea').attr('required', 'required');
    }
}

function guardarAyudasNavegador() {
    localStorage.clear();
    $.getJSON(baseUrl + "admin/tablas/ayudaCampos/todas", function (data) {
        $.each(data, function (index, obj) {
            localStorage.setItem(obj.formulario + "." + obj.campo, obj.ayuda);
        });
    });
}

function crearAyuda(formulario, campo) {
    var data = {
        formulario: formulario,
        campo: campo,
    };
    localStorage.setItem(formulario + "." + campo, "Pendiente por documentar");
    $.post(baseUrl + "admin/tablas/ayudaCampos/crear", data);
}

function buscarAyuda(evt) {
    var form = $(evt.target).closest('form');
    var input = $(evt.target);
    var url = location.href;
    if (url.startsWith(baseUrl + "administracion")) {
        return;
    }
    else if (form.attr('id') == undefined) {
        console.log("El formulario no tiene ID, debe tener un id para poder mostrar la ayuda");
    }
    else if (input.attr('id') == undefined) {
        console.log("El input no tiene ID, debe tener un id para poder mostrar la ayuda");
    } else {
        var ayuda = localStorage.getItem(form.attr('id') + "." + input.attr('id'));
        if (ayuda != undefined) {
            $('#contenedor-ayudas').html(ayuda);
        } else if (evt.type == "mouseenter") {
            crearAyuda(form.attr('id'), input.attr('id'));
        }
    }
}

function confirmarEliminacion() {
    $('.form-eliminar').unbind('submit');
    $('.form-eliminar').submit(function (e) {
        e.preventDefault();
        var form = this;
        confirmarIntencion("¿Esta seguro que desea eliminar el elemento seleccionado?", function () {
            $(form).unbind('submit');
            $(form).submit();
        });
    });
}

function confirmarIntencion(mensaje, confirmado) {
    $('#modalConfirmacion').modal('show');
    $('#mensajeModalConfirmacion').html(mensaje);
    $('#okModalConfirmacion').unbind('click');
    $('#okModalConfirmacion').click(confirmado);
    $('#okModalConfirmacion').click(function () {
        $('#modalConfirmacion').modal('hide');
    });
}

function volverAtras() {
    $('.btn-volver').unbind('click');
    $('.btn-volver').click(function () {
        var urlAtras = location.href;
        sect = urlAtras.split('?')[0].split('/');
        if (!isNaN(sect[sect.length - 1])) {
            delete sect[sect.length - 1];
            delete sect[sect.length - 2];
        } else {
            delete sect[sect.length - 1];
        }
        var url = sect.join('/');
        url = url.slice(0, -1);
        if (url.endsWith("/")) {
            url = url.slice(0, -1);
        }
        location.href = url;
    });
}

function iniciarSelect() {
    $('select.advanced-select').select2();
}

function iniciarDecimalFormat() {
    $(".decimal-format").autoNumeric('init', {
        aSep: ".",
        aDec: ","
    });

    $(".decimal-format").css('text-align', 'right');
}

function iniciarTooltipAyuda() {
    $('[data-toggle="tooltip"]').tooltip({html: true});

    $('input, select, textarea').each(function () {
        if ($(this).attr("data-tienetooltip") == undefined && $(this).attr('type') != "radio" && $(this).attr('type') != "hidden") {
            $(this).attr("data-tienetooltip", 1);
            $(this).tooltip({'trigger': 'focus hover', 'title': $(this).attr("placeholder")});
        }
        if ($(this).attr("data-tieneayuda") == undefined && $(this).attr('type') != "hidden") {
            $(this).attr("data-tieneayuda", 1);
//            $(this).hover(buscarAyuda);
//            $(this).focus(buscarAyuda);
        }
    });
}

function iniciarDatePicker() {
    $('.jqueryDatePicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "es"
    }).on('changeDate', function (ev) {
        $(this).datepicker('hide');
    });
}

function iniciarPopoverRaty() {
    $('[data-toggle="popover"]').popover();

    $('.raty').raty({
        score: 4
    });
}

function iniciarJqueryTable() {
    $('table.jqueryTable').each(function () {
        if ($(this).attr('data-esdatatable') == undefined) {
            $(this).attr('data-esdatatable', true);
            $(this).DataTable({
                "aaSorting": [],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
    });
}

function iniciarDropzone() {
    $('.disparadorArchivo').each(function () {
        var callback = $(this).attr('data-callback');
        try {
            $(this).dropzone({
                url: $(this).attr('data-urlsubir'),
                previewsContainer: ".destino",
                acceptedFiles: $(this).attr('data-tipoarchivo'),
                dictInvalidFileType: "El archivo posee una extensión invalida",
                success: function (file, response) {
                    this.removeFile(file);
                    $('#modalArchivo').modal('hide');
                    if (callback != undefined) {
                        eval(callback + '("' + response.url + '")');
                    }
                    window.location.reload();
                },
                processing: function () {
                    $('#modalArchivo').modal('show');
                },
                error: function (file, errorMessage, request) {
                    var response = JSON.parse(request.responseText);
                    this.removeFile(file);
                    $('#modalArchivo').modal('hide');
                    mostrarError(response.mensaje);
                }
            });
        } catch (err) {
//            mostrarError(err);
        }
    });
}

$.fn.clearForm = function () {
    return this.each(function () {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input', this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            $(this).val("");
        else if (type == 'hidden' && $(this).attr('name') != 'solicitud_id')
            $(this).val("");
    });
};

if (typeof String.prototype.startsWith != 'function') {
    String.prototype.startsWith = function (str) {
        return this.slice(0, str.length) == str;
    };
}

if (typeof String.prototype.endsWith !== 'function') {
    String.prototype.endsWith = function (suffix) {
        return this.indexOf(suffix, this.length - suffix.length) !== -1;
    };
}

function autoCompletado() {
    $('.autocompletado').each(function () {
        var url = $(this).data('url');
        $(this).typeahead({
            ajax: baseUrl + url
        });
    });
}

function ayudasNavegador() {
//    guardarAyudasNavegador();
    var msie = navigator.userAgent.match(/msie/i);
    $.browser = {};
    $.browser.msie = {};

    // Disbaling some functions for Internet Explorer
    if (msie) {
        $('#is-ajax').prop('checked', false);
        $('#for-is-ajax').hide();
        $('#toggle-fullscreen').hide();
        $('.login-box').find('.input-large').removeClass('span10');
    }
}

function navBar() {
    $('.navbar-toggle').click(function (e) {
        e.preventDefault();
        $('.nav-sm').html($('.navbar-collapse').html());
        $('.sidebar-nav').toggleClass('active');
        $(this).toggleClass('active');
    });

    var $sidebarNav = $('.sidebar-nav');

    // Hide responsive navbar on clicking outside
    $(document).mouseup(function (e) {
        if (!$sidebarNav.is(e.target) // if the target of the click isn't the container...
                && $sidebarNav.has(e.target).length === 0
                && !$('.navbar-toggle').is(e.target)
                && $('.navbar-toggle').has(e.target).length === 0
                && $sidebarNav.hasClass('active')
                )// ... nor a descendant of the container
        {
            e.stopPropagation();
            $('.navbar-toggle').click();
        }
    });

    // this code will prevent unexpected menu close when using some components (like accordion, forms, etc)
    $(document).on('click', '.yamm .dropdown-menu', function (e) {
        e.stopPropagation()
    })

}

function activeLink() {
    //highlight current / active link
    $('ul.main-menu li a').each(function () {
        if ($($(this))[0].href == String(window.location))
            $(this).parent().addClass('active');
    });
}

function establishHistroyVariables() {
    //establish history variables
    var
            History = window.History, // Note: We are using a capital H instead of a lower h
            State = History.getState(),
            $log = $('#log');

    //bind to State Change
    History.Adapter.bind(window, 'statechange', function () { // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        ejecutarAjaxNavegador(State);
    });
}

function acordion() {
    $('.accordion > a').click(function (e) {
        e.preventDefault();
        var $ul = $(this).siblings('ul');
        var $li = $(this).parent();
        if ($ul.is(':visible'))
            $li.removeClass('active');
        else
            $li.addClass('active');
        $ul.slideToggle();
    });

    $('.accordion li.active:first').parents('ul').slideDown();
}

function abrirModal() {
    $(document).on('click', '.abrir-modal', function (evt) {
        evt.preventDefault();
        var url = $(this).attr('href');
        $.get(url, function (data) {
            if ($("#modal-window1").is(':empty')) {
                $("#modal-window1").html(data);
                $("#modal-window1").modal('show');
            } else {
                $("#modal-window2").html(data);
                $("#modal-window2").modal('show');
            }
        });
    });
}

function resetearFormulario() {
    $(document).on('click', '.btn-reset', function () {
        $(this).closest('form').clearForm();
    });
}

function multiSelect() {
    $(document).on('change', 'select[data-child]', function () {
        if ($(this).val() === "") {
            return;
        }
        var child = $(this).data('child');
        var url = 'admin/tablas/' + $(this).data('url');
        var formParent = $(this).closest('form');
        ejecutarAjaxSelect(child, url, formParent);
    });
}

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

$(document).ready(function () {
    $('.ajax-request').click(function () {
        if ($(this).data("url") && $(this).data("target") && $(this).data("method") && $(this).data("type")) {
            var parametros = {url: $(this).data("url"), target: $(this).data("target"), method: $(this).data("method"), type: $(this).data("type")};
            $.ajax({
                url: baseUrl + parametros.url,
                type: parametros.method,
                cache: false,
                dataType: parametros.type,
                success: function (data) {
                    $('#' + parametros.target).html(data);
                },
                error: function () {
                    mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Recurso no encontrado)</i>");
                }
            });
        } else {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Parametro no definido)</i>");
        }
    });
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
            if (callback !== undefined) {
                callback();
            }
        }
    });
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
                    window.location.reload();
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

function ejecutarAjaxSelect(child, url, formParent) {
    $.ajax({
        type: "GET",
        url: baseUrl + url + "/" + $(this).val(),
        cache: false,
        dataType: 'json',
        success: function (data) //Si se ejecuta correctamente
        {
            var selectChild = $(formParent).find('#' + child);
            selectChild.empty();
            var ultimo, cantidad = 0;
            if (data != null) {
                $.each(data, function (i, value) {
                    if (i != "") {
                        ultimo = i;
                    }
                    cantidad++;
                    //Se quita la opcion enb blanco para cuando es multiselect
                    if (i != '' || selectChild.attr('multiple') == undefined) {
                        selectChild.append("<option value='" + i + "'>" + value + "</option>");
                    }
                });
                if (cantidad == 2) {
                    selectChild.val(ultimo);
                    selectChild.change();
                } else {
                    selectChild.val("");
                }
            }
            return;
        }
    });
    return;
}

function ejecutarAjaxNavegador(State) {
    $.ajax({
        url: State.url,
        success: function (msg) {
            $('#content').html($(msg).find('#content').html());
            $('#loading').remove();
            $('#content').fadeIn();
            var newTitle = $(msg).filter('title').text();
            $('title').text(newTitle);
            return;
        }
    });
    return;
}

$(document).ready(function () {
    documentReady();
});
//# sourceMappingURL=all.js.map
