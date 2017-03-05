
$(document).ready(function() {
    $("#my-menu").mmenu({
        offCanvas: {
            position  : "left"
        },
        classNames: {
            selected: "current-menu-item"
        },
        navbar 		: {
            title		: ''
        }
    }, {
        // configuration
    });

    var $menu = $("#my-menu").clone();
    $menu.attr( "id", "my-mobile-menu" );
    $menu.mmenu({
        // options
    });

});

/*
// After scroll make menu less high
$(document).scroll(function(e){
    var t=$(document).scrollTop();
    if(t>10){
        $(".navbar").removeClass("navbar-standard").addClass("navbar-small")
    }else
    {
        $(".navbar").removeClass("navbar-small").addClass("navbar-standard")
    }
});
*/