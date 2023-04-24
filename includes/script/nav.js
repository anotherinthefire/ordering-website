function checkScroll() {
    var startY = $(".nav-bar").height() * 2; //The point where the navbar changes in px

    if ($(window).scrollTop() > startY) {
        $(".nav-bar").addClass("scrolled");
    } else {
        $(".nav-bar").removeClass("scrolled");
    }
}

if ($(".nav-bar").length > 0) {
    $(window).on("scroll load resize", function() {
        checkScroll();
    });
}

// Get the modal
