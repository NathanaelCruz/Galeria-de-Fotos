$(document).ready( function() {
    $("#frm-gallery-save").validate({
        // Define as regras
        rules: {
            title: {
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 5
            },
            desphoto: {
                // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
                required: true
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
            desphoto: {
                required: "Por favor, escolha uma foto."
            },
            legphoto: {
                required: "Digite uma legenda para a foto.", minLength: "A sua legenda deve conter, no mínimo, 10 caracteres."
            }
        }
    });
});