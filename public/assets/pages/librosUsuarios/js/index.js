$(document).ready(function () {
    $(".libro-devolucion").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        const data = {
            _token: $("meta[name=csrf-token]").attr("content"),
            _method: "put",
        };
        ajaxRequest(data, url, $(this));
    });

    function ajaxRequest(data, url, link) {
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    const fecha = respuesta.fecha_devolucion;
                    link.closest("tr").find("td.fecha-devolucion").text(fecha);
                    link.tooltip("dispose");
                    link.remove();
                    Biblioteca.notificaciones(
                        "El Libro fue devuelto correctamente",
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
