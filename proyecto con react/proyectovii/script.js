$('document').ready(function () {
    // Validación del formulario
    $("#login-form").validate({
        rules: {
            password: {
                required: true,
            },
            user_email: {
                required: true,
                email: false
            },
        },
        messages: {
            password: {
                required: "Por favor ingrese Contraseña de Ingreso"
            },
            user_email: "Por favor ingrese su Usuario",
        },
        submitHandler: submitForm
    });

    // Manejo del envío del formulario
    function submitForm() {
        var data = $("#login-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'login_process.php',
            data: data,
            beforeSend: function () {
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Enviando ...');
            },
            success: function (response) {
                if (response == "ok") {
                    $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Ingresando ...');
                    setTimeout(function () {
                        window.location.href = "usuario/";
                    }, 2000);
                } else {
                    $("#error").fadeIn(1000, function () {
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' </div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en el envío: ", error);
                $("#error").fadeIn(1000, function () {
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Error al conectar con el servidor. Por favor, intente de nuevo. </div>');
                    $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                });
            }
        });
        return false;
    }
});
