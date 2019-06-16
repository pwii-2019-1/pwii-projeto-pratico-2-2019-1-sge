let construct = () => {
    eventos();
    marcarAtividades();
    validaHorarios();
    confirmacaoA();
};

const eventos = () => {
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
                    $('#msg_sucesso').toast('show'); // Para aparecer a mensagem de sucesso
                } else {
                    $('#msg_erro').toast('show');
                }
            },
            error: function (request, status, str_error) {
                console.log(request, status, str_error)
            }
        });
    });

    $('#botao_excluir').on('click', function (event) {
        event.preventDefault();
        let atividade_id = $(this).attr('data-atividade_id');

        let dados = {
            atividade_id: atividade_id
        };

        dados.acao = "Atividades/invalidarAtividade";
        console.log(dados);
        $.ajax({
            url: baseUrl,
            type: "POST",
            data: dados,
            dataType: "text",
            async: true,
            success: function (res) {
                console.log(res);
                if (res > 0 ) {
                    window.location.href = `${base}/${url[1]}/`;
                } else {
                    $('#msg_exclusao_erro').toast('show');
                }
            },
            error: function (request, status, str_error) {
                console.log(request, status, str_error);
            }
        });
    });
};

// Função que marca as atividades que o usuário já está inscrito
const marcarAtividades = () => {
    $('#tabela').ready(function () {
        // Pega o atributo da table que contém todos os eventos que o usuário está inscrito
        var presencas = $('#tabela').attr('data-presencas');
        // Transforma os eventos que estavam em string (1-2-3) em um array
        presencas = presencas.split("-");

        // Seleciona todas as checkbox da página
        var checkbox = document.querySelectorAll("input[type='checkbox']");

        // Para cada checkbox selecionado, ele verifica se o id da atividade que pertence o checkbox
        // está no array de atividades que o usuário está inscrito
        $.each(checkbox, function () {
            var atividade = $(this).attr("value");
            if (presencas.includes(atividade)) {
                // Se o id da atividade estiver dentro do array de presencas, ele marca o checkbox
                $(this).prop('checked', true);
            }
        });

    });
};

const validaHorarios = () => {
    $("input[type='checkbox']").on("click", function (event) {
        // event.preventDefault();

        if (($(this).is(':checked'))) {
            // console.log('Checked');
            var atividade_id = $(this).attr('value');

            var data_evento = $(this).attr('data-data_evento');
            // console.log(data_evento);
            var aux = $(this).attr("data-horario_inicio").split(':');
            var horario_inicioNovo = new Date(Date.UTC(0, 0, 0, aux[0], aux[1], 0));

            var aux = $(this).attr("data-horario_termino").split(':');
            var horario_terminoNovo = new Date(Date.UTC(0, 0, 0, aux[0], aux[1], 0));

            // console.log(horario_inicioNovo);
            // console.log(horario_terminoNovo);

            var horarios = $('#form_atividade').find("input:checked[value!='" + atividade_id + "'][data-data_evento='" + data_evento + "']");
            // console.log(horarios);
            $.each(horarios, function () {

                var aux = $(this).attr("data-horario_inicio").split(':');
                var horario_inicioAntigo = new Date(Date.UTC(0, 0, 0, aux[0], aux[1], 0));

                var aux = $(this).attr("data-horario_termino").split(':');
                var horario_terminoAntigo = new Date(Date.UTC(0, 0, 0, aux[0], aux[1], 0));


                if ((horario_inicioAntigo.getTime() < horario_inicioNovo.getTime() && horario_terminoAntigo.getTime() > horario_inicioNovo.getTime()) ||
                    (horario_inicioNovo.getTime() < horario_inicioAntigo.getTime() && horario_terminoNovo.getTime() > horario_inicioAntigo.getTime()) ||
                    ((horario_inicioAntigo.getTime() == horario_inicioNovo.getTime()) && (horario_terminoAntigo.getTime() == horario_terminoNovo.getTime()))
                ) {
                    // console.log("Conflito");
                    event.preventDefault();
                    $('#msg_alerta').toast('show');
                    // console.log(horario_inicioAntigo.getUTCMilliseconds());
                    // console.log(horario_terminoAntigo.getUTCMilliseconds());
                    // console.log(horario_inicioNovo.getUTCMilliseconds());
                    // console.log(horario_terminoNovo.getUTCMilliseconds());

                } else {
                    // console.log("Não existe conflito!");
                    // console.log((horario_inicioAntigo.getUTCMilliseconds() == horario_inicioNovo.getUTCMilliseconds() ) && (horario_terminoAntigo.getUTCMilliseconds() == horario_inicioNovo.getUTCMilliseconds()));
                    // console.log(horario_inicioAntigo.getUTCMilliseconds());
                    // console.log(horario_terminoAntigo.getUTCMilliseconds());
                    // console.log(horario_inicioNovo.getUTCMilliseconds());
                    // console.log(horario_terminoNovo.getUTCMilliseconds());
                }

            });
        } else {
            // console.log('Not Checked');
        }
    });
};

const confirmacaoA = () => {
    $("a[name='excluir']").click(function () {
        let id = $(this).attr('data-atividade_id');

        $('#botao_excluir').attr('data-atividade_id',id);
        $('#confirmModal').modal('show');
    });
};

construct();
