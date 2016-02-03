// Javascript para owl carousel de proyectos !
$(document).ready(function () {
    
    documentReady();
    
    var owl = $("#owl-proyectos");

    owl.owlCarousel({
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

});