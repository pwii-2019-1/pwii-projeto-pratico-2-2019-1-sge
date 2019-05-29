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
                    if (res && res === '1') {
                        alert('Login efetuado com sucesso!');
                        window.location.href = `${base}/${url[1]}/`;
                    } else {
                        alert('Usuário/senha inválidos!');
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



