const base = window.location.origin;
const url = window.location.pathname.split('/');
const baseUrl = `${base}/${url[1]}/${url[2]}/api.php`;



let construct = () => {
    eventos();
}

const eventos = () => {
    $('#botao_submit').on('click', function (e){
        e.preventDefault();

        let nome = $('#nome').val(),
            evento_inicio = $('#evento_inicio').val(),
            evento_termino = $('#evento_termino').val(),
            descricao = $('#descricao').val(),
            data_inicio = $('#data_inicio').val(),
            data_termino = $('#data_termino').val(),
            data_prorrogacao = $('#data_prorrogacao').val();

            
            if (nome !== "" && 
                evento_inicio !== "" &&
                evento_termino !== "" && 
                descricao !== "" && 
                data_inicio !== "" && 
                data_termino !== "" &&
                data_prorrogacao !== ""
                ){
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

                    console.log(dados);
                    $.ajax({
                        url: baseUrl,
                        type: "POST",
                        data: dados,
                        dataType: "text",
                        async: true,
                        success: function (res){
                            if (res) {
                                alert('Cadastro efetuado com sucesso!');
                                // window.location.href = `${base}/${url[1]}`;
                            } else {
                                alert('Houve um erro no cadastro, verifique os dados novamente!');
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