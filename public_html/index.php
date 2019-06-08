<?php

require_once '../vendor/autoload.php';

use core\controller\Eventos;
use core\sistema\Autenticacao;
use core\sistema\Footer;
use core\sistema\Util;

require_once 'header.php';

$pg = isset($_GET['pg']) ? $_GET['pg'] : null;

$busca = [];
if (isset($_GET['texto'])) $busca['texto'] = $_GET['texto'];
if (isset($_GET['data_inicio'])) $busca['data_inicio'] = $_GET['data_inicio'];
if (isset($_GET['data_termino'])) $busca['data_termino'] = $_GET['data_termino'];
if (isset($_GET['periodo'])) $busca['periodo'] = $_GET['periodo'];

$eventos = new Eventos();

$dados_eventos = [];

if ($pg != null) $dados_eventos['pg'] = $pg;
if (count($busca) > 0) $dados_eventos['busca'] = $busca;

$dados = $eventos->listarEventos($dados_eventos);

?>

<div class="container">
    <div class="row">
        <div class="col-sm ">
            <h1 class="display-4">
                <p class="text-center">Encontre aqui seu evento!</p>
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-4">
            <label for="periodo">Nome ou descrição do evento:</label>
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input id="texto" type="text" class="form-control" placeholder="Buscar">
            </div>
        </div>
        <div class="form-row col-4">
            <div class="form-group col-md-6">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" class="form-control" id="data_inicio" required value="<?= (isset($evento->data_inicio)) ? $evento->data_inicio : "" ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="data_termino">Data de Término:</label>
                <input type="date" class="form-control" id="data_termino" required value="<?= (isset($evento->data_termino)) ? $evento->data_termino : "" ?>">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group has-search">
                <label for="periodo">Período:</label>
                <span class="fa fa-search form-control-feedback"></span>
                <select id="periodo" class="custom-select form-control">
                    <option selected disabled>Selecione um período</option>
                    <option value="hoje">Hoje</option>
                    <option value="semana">Essa semana</option>
                    <option value="mes">Esse mês</option>
                </select>
            </div>
        </div>

        <button id="filtrar" class="col-1 btn btn-block btn-outline-dark">FILTRAR</button>

    </div>
</div>

<main role='main'>
    <div class="album py-2 bg-light">
        <div class="container">
            <div class="row">

                <?php if (count($dados['lista_eventos']) > 0) {
                    foreach ($dados['lista_eventos'] as $i => $evento) { ?>

                    <div class="col-md-4" style="">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="assets/imagens/default.svg" style="height:200px"alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><?= $evento->nome ?></h4>
                                <p class="card-text" style="min-height:15ch; max-height: 15ch;"><?= (strlen($evento->descricao)<= 150) ? $evento->descricao : substr($evento->descricao,0, 150). "<a href='evento.php?evento_id={$evento->evento_id}'> Mostrar Mais</a>"?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="evento.php?evento_id=<?= $evento->evento_id ?>" class="btn btn-sm btn btn-outline-secondary">Visualizar</a>
                                        <?php if (Autenticacao::usuarioAdministrador()){ ?>
                                            <a href="atividades.php?evento_id=<?= $evento->evento_id ?>" class="btn btn-sm btn-outline-success">
                                                Atividades
                                            </a>
                                        <?php } else { ?>
                                            <a href="atividades.php?evento_id=<?= $evento->evento_id ?>" class="btn btn-sm btn-outline-success" name="inscrever" data-toggle="modal" data-target="#">
                                                Inscrever-se
                                            </a>
                                        <?php }?>
                                    </div>
                                    <small class="text-muted"><?= Util::formataDataBR($evento->evento_inicio) ?></small>
                                </div>
                            </div>
                            <div class="card-footer text-muted bg-success p-1"></div>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente fazer inscrição neste evento?
                                </div>
                                <div class="modal-footer p-2">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Não</button>
                                    <a id="botao" href="#" class="btn btn-outline-success">Sim</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                } else { ?>
                    <h3 class="sem-resultado">Nenhum resultado encontrado!</h3>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php if (isset($dados['total_paginas']) && $dados['total_paginas'] > 0) { ?>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($pg == null || $pg < 2) ? "disabled" : "" ?>">
                    <a class="page-link" href="<?= ($pg == null || $pg <= 2) ? "index.php" : "index.php?pg=" . --$pg ?>">Anterior</a>
                </li>

                <?php for ($i = 1; $i <= $dados['total_paginas']; $i++) { ?>

                    <li class="page-item <?= (($pg == null && $i == 1) || $pg == $i) ? "disabled" : "" ?>">
                        <a class="page-link" href="index.php?pg=<?= $i ?>"><?= $i ?></a>
                    </li>

                <?php } ?>

                <li class="page-item <?= ($pg == $dados['total_paginas']) ? "disabled" : "" ?>">
                    <a class="page-link" href="index.php?pg=<?= ($pg == null) ? '2' : ++$pg ?>">Próximo</a>
                </li>
            </ul>
        </nav>
    <?php } ?>
</main>

<?php

$footer = new Footer();

$footer->setJS('assets/js/listagem_eventos.js');

require_once 'footer.php';
