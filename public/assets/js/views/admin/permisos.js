var recargarDiv = false;


//function concederPermiso(idgrupo, permiso) {
//    var url = 'administracion/seguridad/grupos/concederpermiso/'+idgrupo+'/'+permiso;
//    $.ajax({
//        type: "POST",
//        url: baseUrl + url,
//        cache: false,
//        dataType: 'json',
//        success: function(data) //Si se ejecuta correctamente
//        {
//            mostrarMensaje(data.mensaje);
//          
//            cargarDiv('administracion/seguridad/grupos/modificar/' + idgrupo, 'divModal');
//        },
//        error: function(data)
//        {
//            if (data.status == 400) {
//                mostrarError(procesarErrores(data.responseJSON.errores));
//            }
//        }
//    });
//}

function concederPermiso(idgrupo, permiso) {
    var url = 'grupos/concederpermiso/'+idgrupo+'/'+permiso;
    var url_modal = 'admin/seguridad/grupos/modificar/' + idgrupo;
    $.post(url, function(data) {
        mostrarMensaje(data.mensaje);
        if (recargarDiv === false) {
            cargarDiv(url_modal, 'divModal');
        }
    });
}

function concederPermisoPorGrupo(idAcordion, idgrupo) {
    recargarDiv = true;
    $('#'+idAcordion).find('button').each(function (i,data){
        $(this).click();
    });
    recargarDiv = false;
    cargarDiv('admin/seguridad/grupos/modificar/' + idgrupo, 'divModal');
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
        success: function(data) //Si se ejecuta correctamente
        {
            callback(data);
        },
        error: function(data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}
 

//function denegarPermiso(idgrupo, permiso) {
//    var url = 'administracion/seguridad/grupos/denegarpermiso/'+idgrupo+'/'+permiso;
//    $.ajax({
//        type: "POST",
//        url: baseUrl + url,
//        cache: false,
//        dataType: 'json',
//        success: function(data) //Si se ejecuta correctamente
//        {
//            mostrarMensaje(data.mensaje);
//           
//            cargarDiv('administracion/seguridad/grupos/modificar/' + idgrupo, 'divModal');
//        },
//        error: function(data)
//        {
//            if (data.status == 400) {
//                mostrarError(procesarErrores(data.responseJSON.errores));
//            }
//        }
//    });
//   }
function denegarPermiso(idgrupo, permiso) {
    var url = 'grupos/denegarpermiso/'+idgrupo+'/'+permiso;
    var url_modal = 'admin/seguridad/grupos/modificar/' + idgrupo;
    $.post(url, function(data) {
        mostrarMensaje(data.mensaje);
        if (recargarDiv === false) {
            cargarDiv(url_modal, 'divModal');
        }
    });
}


function denegarPermisoPorGrupo(idAcordion, idgrupo) {
    recargarDiv = true;
    $('#'+idAcordion).find('button').each(function (i,data){
        $(this).click();
    });
    recargarDiv = false;
    cargarDiv('admin/seguridad/grupos/modificar/' + idgrupo, 'divModal');
}

function guardarAjax(form) {
    guardarFormulario(form, true);
    return false;
}