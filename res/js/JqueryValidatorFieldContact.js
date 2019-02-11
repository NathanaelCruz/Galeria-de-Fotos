$(document).ready( function() {
    $("#frm-contact").validate({
        // Define as regras
        rules: {
            name: {
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 2
            },
            email: {
                // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
                required: true, email: true
            },
            subject: {
                // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
                required: true, minlength: 5
            },
            menssage: {
                // campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 10
            },
        },
        // Define as mensagens de erro para cada regra
        messages: {
            name: {
                required: "Digite o seu nome.", minLength: "O seu nome deve conter, no mínimo, 2 caracteres."
            },
            email: {
                required: "Digite o seu e-mail para contato.", email: "Digite um e-mail válido. Exemplo@exemplo.com.br"
            },
            subject: {
                required: "Digite o assunto para contato.", minLength: "O seu nome deve conter, no mínimo, 5 caracteres."
            },
            menssage: {
                required: "Digite a sua mensagem", minLength: "A sua mensagem deve conter, no mínimo, 10 caracteres"
            }
        }
    });
});
