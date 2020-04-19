$(".permiso_rol").on("change", function () {
    var data = {
        permiso_id: $(this).data("permisoid"),
        rol_id: $(this).val(),
        _token: $("meta[name=csrf-token]").attr("content"),
    };
    if ($(this).is(":checked")) {
        data.estado = 1; ///guarda
    } else {
        data.estado = 0; ///elimina
    }
    ajaxRequest("/biblioteca/public/admin/permisos-roles", data);
});

function ajaxRequest(url, data) {
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (respuesta) {
            Biblioteca.notificaciones(
                respuesta.respuesta,
                "Biblioteca",
                "success"
            );
        },
    });
}
