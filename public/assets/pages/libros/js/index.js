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
                ajaxRequest(
                    form.serialize(),
                    form.attr("action"),
                    "eliminarLibro",
                    form
                );
            }
        });
    });

    $(".ver-libro").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        const data = {
            _token: $("meta[name=csrf-token]").attr("content"),
        };
        ajaxRequest(data, url, "verLibro");
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (respuesta) {
                if (funcion == "eliminarLibro") {
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
                } else if (funcion == "verLibro") {
                    $("#modal-ver-libro .modal-body").html(respuesta);
                    $("#modal-ver-libro").modal("show");
                }
            },
            error: function () {},
        });
    }
});
