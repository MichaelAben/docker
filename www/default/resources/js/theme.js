function collapseSidebarHandle() {
    if(document.body.clientWidth > 767) {
        $('#collapseSidebar').collapse('show')
    } else {
        $('#collapseSidebar').collapse('hide')
    }
}

$(window).ready(function () {
    collapseSidebarHandle();
    $(window).resize(collapseSidebarHandle);
});
