$(".menu_rol").on("change", function() {
    var data = {
        menu_id: $(this).data("menuid"),
        rol_id: $(this).val(),
        _token: $("meta[name=csrf-token]").attr("content")
    };
    if ($(this).is(":checked")) {
        data.estado = 1; ///guarda
    } else {
        data.estado = 0; ///elimina
    }
    ajaxRequest("/biblioteca/public/admin/menus-roles", data);
});

function ajaxRequest(url, data) {
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function(respuesta) {
            Biblioteca.notificaciones(
                respuesta.respuesta,
                "Biblioteca",
                "success"
            );
        }
    });
}
