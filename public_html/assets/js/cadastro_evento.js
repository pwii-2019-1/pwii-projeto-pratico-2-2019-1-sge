const base = window.location.origin;
const url = window.location.pathname.split('/');
const baseUrl = `${base}/${url[1]}/${url[2]}/api.php`;



let construct = () => {
    eventos();
}

const eventos = () => {
    $('#formulario').on('submit', function (e) {
        e.preventDefault();

        let nome = $('#nome').val(),
            evento_inicio = $('#evento_inicio').val(),
            evento_termino = $('#evento_termino').val(),
            descricao = $('#descricao').val(),
            data_inicio = $('#data_inicio').val(),
            data_termino = $('#data_termino').val(),
            data_prorrogacao = $('#data_prorrogacao').val();

        const validaDatas = () => {

            date_evento_inicio = new Date(evento_inicio);
            date_evento_termino = new Date(evento_termino);
            date_data_inicio = new Date(data_inicio);
            date_data_termino = new Date(data_termino);
            date_data_prorrogacao = new Date(data_prorrogacao);

            if (date_evento_inicio <= date_evento_termino &&
                date_data_inicio < date_data_termino &&
                date_data_termino < date_data_prorrogacao) {

                return true;
            } else {
                $('#msg_alerta').toast('show');
                return false;
            }

        };



        if (nome !== "" &&
            evento_inicio !== "" &&
            evento_termino !== "" &&
            descricao !== "" &&
            data_inicio !== "" &&
            data_termino !== "" &&
            data_prorrogacao !== "" &&
            validaDatas()
        ) {
            let dados = {
                nome: nome,
                evento_inicio: evento_inicio,
                evento_termino: evento_termino,
                descricao: descricao,
                data_inicio: data_inicio,
                data_termino: data_termino,
                data_prorrogacao: data_prorrogacao
            };

            dados.acao = "Eventos/cadastrar";

            $.ajax({
                url: baseUrl,
                type: "POST",
                data: dados,
                dataType: "text",
                async: true,
                success: function (res) {
                    if (res) {
                        $('#msg_sucesso').toast('show'); // Para aparecer a mensagem de sucesso
                        $('#formulario').each( function () {
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