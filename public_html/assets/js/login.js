const base = window.location.origin;
const url = window.location.pathname.split('/');
const baseUrl = `${base}/${url[1]}/${url[2]}/api.php`;

let construct = () => {
    eventos();
};

const eventos = () => {
    $('#botao_login').on('click', function (e) {
        e.preventDefault();

        let cpf = $('#cpf').val(),
            senha = $('#senha').val();

        if (cpf !== "" && senha !== "") {

            let dados = {
                cpf: cpf,
                senha: senha,
                lembrar: $('#lembrar').is(':checked')
            };

            dados.acao = "Login/login";

            $.ajax({
                url: baseUrl,
                type: "POST",
                data: dados,
                dataType: "text",
                async: true,
                success: function (res) {
                    if (res) {
                        //alert('Login efetuado com sucesso!');
                        //window.location.href = `${base}/${url[1]}/`;
                        $('#msg_sucesso').toast('show'); // Para aparecer a mensagem de sucesso
                        $('#formulario').each( function () {
                        this.reset(); // Pra limpar o formulário
                        });
                    } else {
                        //alert('Usuário/senha inválidos!');
                        alert('Usuário/senha inválidos!');
                        $('#msg_erro').toast('show');
                    }
                },
                error: function (request, status, str_error) {
                    console.log(request, status, str_error);
                }
            });
        }
    });
};

construct();



