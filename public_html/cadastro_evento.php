<?php

require_once 'header.php';

use core\sistema\Footer;

?>

<main role="main">
    <div class="container center-block mb-4">
        <div class="row">
            <div class="col">
                <h1 class="display-4 text-center">SGE</h1>
                <h1 class="h3 mb-3 font-weight-normal text-center">Cadastro Evento</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <form class="needs-validation" id="formulario">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" placeholder="Insira o nome do evento" required autofocus>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="evento_inicio">Data de Início:</label>
                            <input type="date" class="form-control" id="evento_inicio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="evento_termino">Data de Término:</label>
                            <input type="date" class="form-control" id="evento_termino" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="descricao">Descrição:</label>
                        <textarea id="descricao" class="form-control" rows="2" placeholder="Insira a descrição do evento" required></textarea>
                    </div>
                    <hr class="mb-3">
                    <h1 class="h4 mb-3 font-weight-normal">Inscrições</h1>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="data_inicio">Data de Início:</label>
                            <input type="date" class="form-control" id="data_inicio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="data_termino">Data de Término:</label>
                            <input type="date" class="form-control" id="data_termino" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="data_prorrogacao">Data de Prorrogação:</label>
                            <input type="date" class="form-control" id="data_prorrogacao" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2">
                            <button type="reset" class="btn btn-block btn-outline-info">Limpar</button>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" id="botao_submit" class="btn btn-block btn-outline-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Toast Sucesso -->
        <div class="toast" id="msg_sucesso" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: absolute; top: 4rem; right: 1rem;">
            <div class="toast-header">
                <strong class="mr-auto">Deu tudo certo!</strong>
                <small>Agora</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
               Pronto, o evento foi cadastrado com sucesso.
            </div>
            <div class="card-footer text-muted bg-success p-1"></div>
        </div>
        <!-- Toast -->

        <!-- Toast Erro -->
        <div class="toast" id="msg_erro" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: absolute; top: 4rem; right: 1rem;">
            <div class="toast-header">
                <strong class="mr-auto">Houve um erro!</strong>
                <small>Agora</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
               Desculpe, não conseguimos efetuar seu cadastro.
            </div>
            <div class="card-footer text-muted bg-warning p-1"></div>
        </div>
        <!-- Toast -->

        <!-- Toast Alerta -->

        <div class="toast" id="msg_alerta" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: absolute; top: 4rem; right: 1rem;">
            <div class="toast-header">
                <strong class="mr-auto">Houve um erro!</strong>
                <small>Agora</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
               Por favor, confira todos os dados informados.
            </div>
            <div class="card-footer text-muted bg-warning p-1"></div>
        </div>
        <!-- Toast -->

    </div>
</main>

<?php

$footer = new Footer();
$footer->setJS('assets/js/cadastro_evento.js');

require_once 'footer.php';


?>
