let construct = () => {
    atividades();
};

const atividades = () => {
    $('#form_atividade').on('submit', function (e) {
        e.preventDefault();

        let a = $('#form_atividade').attr('data-count'),
            usuario_id = $('#form_atividade').attr('data-usuario_id'),
            lista_presenca = [];

        for (let i = 1; i < a * 2; i += 2) {
            lista_presenca.push({
                atividade_id: $('#atividade' + i).val(),
                usuario_id: usuario_id,
                presenca: $('#atividade' + i).is(':checked') ? 1 : 0
            });
        }

        let dados = {
            lista_presenca
        };

        dados.acao = "Presencas/cadastrar";
        console.log(dados);

        $.ajax({
            url: baseUrl,
            type: "POST",
            data: dados,
            dataType: "text",
            async: true,
            success: function (res) {
                if (res && Number(res) > 0) {
                    console.log(res);
                    console.log("foi");
                } else {
                    console.log("nao foi");
                }
            },
            error: function (request, status, str_error) {
                console.log(request, status, str_error)
            }
        });
    });
};

construct();
