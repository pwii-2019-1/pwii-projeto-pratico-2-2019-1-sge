<?php

require_once 'header.php';

use core\sistema\Footer;

?>

<main role="main">
<div class="container center-block mb-4">
    <div class="row">
        <div class="col">
            <h1 class="display-4 text-center">SGE</h1>
            <h1 class="h3 mb-3 font-weight-normal text-center">Cadastro Atividade</h1>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <form class="needs-validation" id="formulario">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Insira o título da atividade"
                        required autofocus>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="responsavel">Responsável:</label>
                        <input type="text" class="form-control" id="responsavel"
                            placeholder="Insira nome do responsável" required autofocus>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="carga_horaria">Carga Horária:</label>
                        <input type="text" class="form-control" id="carga_horaria"
                            placeholder="Carga horaria da atividade" required autofocus>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="data">Data:</label>
                        <input type="date" class="form-control" id="data" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="datahora_inicio">Hora de Início:</label>
                        <input type="time" class="form-control" id="hora_inicio" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="datahora_termino">Hora de Término:</label>
                        <input type="time" class="form-control" id="hora_termino" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="local">Local:</label>
                        <input type="text" class="form-control" id="local" placeholder="Insira o local da atividade"
                            required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="quantidade_vaga">Quantidade de Vagas:</label>
                        <input type="text" class="form-control" id="quantidade_vaga"
                            placeholder="Insira a quantidade de vagas" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipo">Tipo:</label>
                        <select id="tipo" class="custom-select" required>
                            <option value="">Selecione o tipo</option>
                            <option value="1">Palestra</option>
                            <option value="2">Minicurso</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-7"></div>
                    <div class="col-md-1">
                        <button type="" class="btn btn-block btn-outline-dark"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-md-2">
                        <button type="reset" class="btn btn-block btn-outline-info">Limpar</button>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-block btn-outline-success">Cadastrar</button>
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
            Pronto, a atividade foi cadastrada com sucesso.
            </div>
            git<div class="card-footer text-muted bg-success p-1"></div>
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
    $footer->setJS('assets/js/cadastro_atividade.js');

    require_once 'footer.php';

    ?>
