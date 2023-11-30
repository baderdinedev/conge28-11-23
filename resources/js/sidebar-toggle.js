$(document).ready(function () {
    $("#sidebarToggle").click(function () {
        $("#sidebar").toggleClass("collapsed");
        $("#sidebar").toggleClass("expanded");
        $(".sidebar").toggleClass("toggled");
        $(".main-content").toggleClass("toggled");
    });
});