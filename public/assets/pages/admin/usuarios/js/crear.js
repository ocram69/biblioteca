$(document).ready(function () {
    Biblioteca.validacionGeneral("form-usuario", {
        nombre: {
            required: true,
            maxlength: 50,
        },
        email: {
            required: true,
            email: true,
            maxlength: 100,
        },
        usuario: {
            required: true,
            maxlength: 50,
        },
        password: {
            required: true,
            minlength: 5,
            maxlength: 100,
        },
        confirmarPassword: {
            equalTo: "#password",
        },
        "rol[]": {
            required: true,
        },
    });
    $("#rol_id").select2({
        placeholder: "Seleccione el rol o roles",
        theme: "bootstrap4",
    });
});
