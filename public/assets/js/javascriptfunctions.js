
function documentReady() {
    loadCarouselEvents();
    loadGeneralEvents();
    loadModalEvents();
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
//            "<img src='../img/image9.png' class='img-responsive' alt='prev'>",
//            "<img src='../img/image10.png' class='img-responsive' alt='next'>"

        ],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [750, 2],
        itemsTabletSmall: [523, 1],
        itemsMobile: [463, 1],
//        beforeInit: function (elem) {
//            //Parameter elem pointing to $("#owl-demo")
//            random(elem);
//        }
    });

}

function loadGeneralEvents() {
    var colors = ["#D2D2D2", "#808080", "#0094D8", "#1e3954"];
    $(".controls-wrapper").each(function (index) {
        if (index < 4) {
            $(this).css("background-color", colors[index]);
        } else if (index >= 4 && index <= 7) {
            $(this).css("background-color", colors[index - 4]);
        } else if (index >= 8 && index <=11) {
            $(this).css("background-color", colors[index - 8]);
        }  else if (index >= 12 && index <= 15) {
            $(this).css("background-color", colors[index - 12]);
        }   else if (index >= 16 && index <= 19) {
            $(this).css("background-color", colors[index - 16]);
        }   else if (index >= 20) {
            $(this).css("background-color", colors[index - 20]);
        }
    });
}

function loadModalEvents() {
    /* 
     * Funcion para mostrar ventana modal
     * Fecha : 27/11/2015
     */
    $(".modal-window").unbind("click");
    $(".modal-window").click(function () {
        $('#modal-window1').modal('toggle');
//        var element = $(this);
//        var url = element.attr("data-url");
//        $.get(url, function (data) {
//            if ($('#modal-window1').is(':empty')) {
//                $('#modal-window1').html(data);
//                $('#modal-window1').modal('toggle');
//            } else {
//                $('#modal-window2').html(data);
//                $('#modal-window2').modal('toggle');
//            }
//        });
        return false;
    });
    /* 
     * Funcion para limpiar ventana modal al cerrar
     * Fecha : 04/12/2015
     */
    $('#modal-window1').on('hidden.bs.modal', function (e) {
//        $("#modal-window1").empty();
//        window.location.reload();
//        if ($(this).children().attr('data-reload') != undefined) {
//            window.location.reload();
//        }
    });
//    $('#modal-window2').on('hidden.bs.modal', function (e) {
//        $("#modal-window2").empty();
//        if ($(this).children().attr('data-reload') != undefined) {
//            window.location.reload();
//        }
//    });
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

//function random(owlSelector) {
//    owlSelector.children().sort(function () {
//        return Math.round(Math.random()) - 0.5;
//    }).each(function () {
//        $(this).appendTo(owlSelector);
//    });
//}