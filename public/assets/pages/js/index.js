$(document).ready(function () {
    $("#tabla-data").on("submit", ".form-eliminar", function () {
        event.preventDefault();
        const form = $(this);
        swal.fire({
            title: "¿ Está seguro que desea eliminar el registro ?",
            text: "Esta acción no se puede deshacer!",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si! eliminara",
        }).then((result) => {
            if (result.value) {
                ajaxRequest(form);
            }
        });
    });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents("tr").remove();
                    Biblioteca.notificaciones(
                        "El registro fue eliminado correctamente",
                        "Biblioteca",
                        "success"
                    );
                } else {
                    Biblioteca.notificaciones(
                        "El registro no pudo ser eliminado, hay recursos usandolo",
                        "Biblioteca",
                        "error"
                    );
                }
            },
            error: function () {},
        });
    }
});
