$(document).ready(function () {
    /*$.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });*/

    $("#nestable")
        .nestable({ group: 1, maxDepth: 5 })
        .on("change", function () {
            const data = {
                menu: window.JSON.stringify(
                    $("#nestable").nestable("serialize")
                ),
                _token: $("meta[name=csrf-token]").attr("content"),
            };
            $.ajax({
                url: "/biblioteca/public/admin/menus/guardar-orden",
                type: "POST",
                dataType: "JSON",
                data: data,
                success: function (respuesta) {},
            });
        });

    $("#nestable").nestable("expandAll");
    $(".form-eliminar").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("action");
        swal.fire({
            title: "¿ Está seguro que desea eliminar el registro ?",
            text: "Esta acción no se puede deshacer!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#001f3f",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si! eliminara",
        }).then((result) => {
            if (result.value) {
                $(this).submit();
            }
        });
    });
});
