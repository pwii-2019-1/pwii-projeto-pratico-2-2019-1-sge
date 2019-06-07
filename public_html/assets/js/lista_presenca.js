

let construct = () => {
    presenca();
};

const presenca = () => {

    $('#formulario').on('submit', function (e) {
        e.preventDefault();
        let presentes = formulario.querySelectorAll("input:checked");
        console.log(presentes);

        let presentes_id = [];
        console.log(presentes[0].id);
        
        for (i = 0; i < presentes.length; i++){
            presentes_id.push(parseInt(presentes[i].id));
        }
        // Vai ter que pegar o id da atividade de algum jeito 
        // Pode ser tbm pela url
        // atividade_id = $('#formulario').attr('data-atividade_id');
        atividade_id = 1;
        let dados = {
            presentes: presentes_id,
            atividade: atividade_id
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

    });
};

construct();