$(document).ready( function() {
    $("#frm-login").validate({
        // Define as regras
        rules: {
            deslogin: {
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 5
            },
            despassword: {
                // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
                required: true, minlength: 5
            }
        },
        // Define as mensagens de erro para cada regra
        messages: {
            deslogin: {
                required: "Digite seu login.", minLength: "O seu login deve conter, no mínimo, 5 caracteres."
            },
            despassword: {
                required: "Digite sua senha.", minLength: "A sua senha deve conter, no mínimo, 5 caracteres."
            }
        }
    });
});