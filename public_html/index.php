<?php

require_once '../vendor/autoload.php';

use core\controller\Eventos;
use core\sistema\Footer;
use core\sistema\Util;

require_once 'header.php';

$pg = isset($_GET['pg']) ? $_GET['pg'] : null;

$eventos = new Eventos();

$dados_eventos = [];

if ($pg != null) $dados_eventos['pg'] = $pg;

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
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Nome do evento">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <select class="custom-select form-control">
                    <option selected disabled>Situação do Evento</option>
                    <option value="1">Inscrições Abertas</option>
                    <option value="2">Em Andamento</option>
                    <option value="3">Evento Finalizado</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <select class="custom-select form-control">
                    <option selected disabled>Período</option>
                    <option value="1">Hoje</option>
                    <option value="2">Essa semana</option>
                    <option value="3">Esse mês</option>
                </select>
            </div>
        </div>

    </div>
</div>

<main role='main'>
    <div class="album py-2 bg-light">
        <div class="container">
            <div class="row">

                <?php if (count($dados['lista_eventos']) > 0) {
                    foreach ($dados['lista_eventos'] as $i => $evento) { ?>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="assets/imagens/default.svg" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><?= $evento->nome ?></h4>
                                <p class="card-text"><?= $evento->descricao ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="evento.php?evento_id=<?= $evento->evento_id ?>" class="btn btn-sm btn btn-outline-secondary">Visualizar</a>
                                        <a href="#" class="btn btn-sm btn-outline-success">Inscrever-se</a>
                                    </div>
                                    <small class="text-muted"><?= Util::formataDataBR($evento->evento_inicio) ?></small>
                                </div>
                            </div>
                            <div class="card-footer text-muted bg-success p-1"></div>
                        </div>
                    </div>

                    <?php }
                } else { ?>
                    <h3>Nenhum resultado encontrado!</h3>
                <?php } ?>
            </div>
        </div>
    </div>

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
</main>

<?php

$footer = new Footer();

require_once 'footer.php';
