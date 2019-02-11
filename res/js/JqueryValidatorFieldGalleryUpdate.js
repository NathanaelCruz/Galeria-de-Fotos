$(document).ready( function() {
    $("#frm-gallery-update").validate({
        // Define as regras
        rules: {
            title: {
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 5
            },
            legphoto: {
                // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
                required: true, minlength: 10
            }
        },
        // Define as mensagens de erro para cada regra
        messages: {
            title: {
                required: "Digite um título para a foto.", minLength: "O seu título deve conter, no mínimo, 5 caracteres."
            },
            legphoto: {
                required: "Digite uma legenda para a foto.", minLength: "A sua legenda deve conter, no mínimo, 10 caracteres."
            }
        }
    });
});