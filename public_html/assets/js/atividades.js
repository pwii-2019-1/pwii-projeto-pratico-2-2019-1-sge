let construct = () => {
    atividades();
};

const atividades = () => {
    $('#form_atividade').on('submit', function(e) {
        e.preventDefault();

        let a = $('#form_atividade').attr('data-count'),
            usuario_id = $('#form_atividade').attr('data-usuario_id'),
            atividade_id = [];

        for (let i=1; i < a*2; i+=2){
            if ($('#atividade'+i).is(':checked')) {
                atividade_id.push($('#atividade'+i).val());
            }
        }

        let dados = {
            atividade_id: atividade_id,
            usuario_id: usuario_id
        };

        dados.acao = "Presencas/cadastrar";
        console.log(dados);

        $.ajax({
            url: baseUrl,
            type: "POST",
            data: dados,
            dataType: "text",
            async: true,
            success: function(res) {
                if (res) {
                    console.log(res);
                    console.log("foi");
                } else {
                    console.log("nao foi");
                }
            },
            error: function(request, status, str_error) {
                console.log(request, status, str_error)
            }
        });
    });
};

construct();
