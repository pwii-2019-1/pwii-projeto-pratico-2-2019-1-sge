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
<<<<<<< HEAD
                    if (res) {
                        //alert('Login efetuado com sucesso!');
                        //window.location.href = `${base}/${url[1]}/`;
                        $('#msg_sucesso').toast('show'); // Para aparecer a mensagem de sucesso
                        $('#formulario').each( function () {
                        this.reset(); // Pra limpar o formulário
                        });
=======
                    if (res && res === '1') {
                        alert('Login efetuado com sucesso!');
                        window.location.href = `${base}/${url[1]}/`;
>>>>>>> 0d331167685894df71aa94052229b2996461d7a5
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



