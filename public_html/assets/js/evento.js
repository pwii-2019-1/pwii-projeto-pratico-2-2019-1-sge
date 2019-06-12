let construct = () => {
    eventos();
};


const eventos = () => {
    $('#botao_excluir').on('click', function (event) {
        event.preventDefault();
        let evento_id = $(this).attr('data-evento_id');

        let dados = {
            evento_id: evento_id
        };

        dados.acao = "Eventos/invalidarEvento";

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
construct();
