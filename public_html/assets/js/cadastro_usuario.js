let construct = () => {
    eventos();
};

const eventos = () => {
   
    $('#formulario').on('submit', function (e) {
        e.preventDefault();
        
        let nome = $('#nome').val(),
            cpf = $('#cpf').val(),
            data_nascimento = $('#data_nascimento').val(),
            nacionalidade = $('#nacionalidade').val(),
            ocupacao = $('#ocupacao').val(),
            email = $('#email').val(),
            senha = $('#senha').val(),
            conf_senha = $('#confirm_senha').val(),
            endereco = $('#endereco').val(),
            bairro = $('#bairro').val(),
            cep = $('#cep').val(),
            estado  = $('#estado').val(),
            cidade  = $('#cidade').val();
            alert(nome);
        
        


        if (nome !== "" &&
            cpf !== "" &&
            data_nascimento !== "" &&
            nacionalidade !== "" &&
            ocupacao !== "" &&
            email !== "" &&
            senha !== "" 
        ) {
            let dados = {
                nome: nome,
                cpf: cpf,
                data_nascimento: data_nascimento,
                nacionalidade: nacionalidade,
                ocupacao: ocupacao,
                email:email,
                senha:senha,
                endereco : endereco,
                bairro: bairro,
                cep: cep,
                estado: estado,
                cidade: cidade
            };

            console.log(dados)

            dados.acao = "Usuarios/cadastrar";

            $.ajax({
                url: baseUrl,
                type: "POST",
                data: dados,
                dataType: "text",
                async: true,
                success: function (res) {
                    if (res) {
                        $('#msg_sucesso').toast('show'); // Para aparecer a mensagem de sucesso
                        $('#formulario').each(function () {
                            this.reset(); // Pra limpar o formulário
                        });
                    } else {
                        $('#msg_erro').toast('show');
                    }
                },
                error: function (request, status, str_error) {
                    console.log(request, status, str_error)
                }
            });
        }
    });
};

construct();
