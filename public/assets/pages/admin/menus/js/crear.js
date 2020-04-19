$(document).ready(function() {
    Biblioteca.validacionGeneral(
        "form-general",
        {
            nombre: {
                required: true
            },
            url: {
                required: true
            }
        },
        {
            nombre: {
                required: function() {
                    toastr.error("El campo nombre es obligatorio");
                }
            },
            url: {
                required: function() {
                    toastr.error("El campo url es obligatorio");
                }
            }
        }
    );
    /**creo un evento blur qu cuando pierda el foco va a mostrar el icono */
    $("#icono").on("blur", function() {
        $("#mostrar-icono")
            .removeClass()
            .addClass($(this).val());
    });
});
