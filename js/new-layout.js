// <------------------------------ main menu sidebar start ------------------------------>

// <------------ add/remove active class menu start ------------>
$(".main-menu-sidebar .navbar-nav .nav-item .nav-link").click(function(){
    $(".main-menu-sidebar .navbar-nav .nav-item .nav-link").parent().removeClass("active");
    $(this).parent().addClass("active");
    $(".submenu-content-wapper").hide();
});
// <------------ add/remove active class menu end ------------>

// <------------ find submenu content start ------------>
$(".main-menu-sidebar .navbar-nav .nav-item .innermenu-arrow-icon" ).each(function() {
    $(this).parent().parent().addClass("submenu-content");
});
// <------------ find submenu content end ------------>

// <------------ submenu content show/hide start ------------>
$(".main-menu-sidebar .navbar-nav .submenu-content .innermenu-arrow-icon" ).click(function() {
    $(this).parent().parent().find(".submenu-content-wapper").slideToggle();
    $(this).toggleClass("active-menu");
});
// <------------ submenu content show/hide end ------------>

// <------------ show only submenu li (other menu hide) start ------------>
$(".main-menu-sidebar .navbar-nav .nav-item.submenu-content .nav-link").click(function(){
    $(".main-menu-sidebar .navbar-nav .nav-item .nav-link").parent().parent().hide();
    $(this).parent().parent().show();
    $("#sidebar-backmenu-btn").removeClass("d-none");
    $(".main-menu-sidebar .navbar-nav").addClass("pt-1");
    $(this).parent().find(".innermenu-arrow-icon").addClass("active-menu");
    $(this).parent().parent().find(".submenu-content-wapper").show();
});
// <------------ show only submenu li (other menu hide) end ------------>

// <------------ back to main menu btn start ------------>
$("#sidebar-backmenu-btn").click(function(){
    $(".main-menu-sidebar .navbar-nav .nav-item").show();
    $(this).addClass("d-none");
    $(".main-menu-sidebar .navbar-nav").removeClass("pt-1");
    $(".submenu-content-wapper").hide();
    $(this).parent().find(".innermenu-arrow-icon").removeClass("active-menu");
});
// <------------ back to main menu btn end ------------>

// <------------------------------ main menu sidebar end ------------------------------>

