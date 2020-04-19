$(document).ready(function () {
    //Tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    //Cerrar Las Alertas Automaticamente
    const $element = $(".alert");
    timeout = $element.data("auto-dismiss");
    setTimeout(function () {
        $element.alert("close");
    }, timeout);
    //Activo el menu para su despliege, optengo el li lo despliego y activo el item del menu
    $li = $("ul.nav-sidebar").find("a.active").parents("li.has-treeview");
    $li.addClass("menu-open");
    $li.children("a").addClass("active");
});
