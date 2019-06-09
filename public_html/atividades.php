<?php
require_once 'header.php';

use core\controller\Eventos;
use core\controller\Atividades;
use core\controller\Presencas;
use core\sistema\Autenticacao;
use core\sistema\Footer;
use core\sistema\Util;

if (!Autenticacao::verificarLogin()) {
    header('Location: login.php');
}

$evento_id = isset($_GET['evento_id']) ? $_GET['evento_id'] : header('Location: login.php');

$eventos = new Eventos();
$atividades = new Atividades();
$presencas = new Presencas();

$evento = $eventos->listarEvento($evento_id);
$atividade = $atividades->listarAtividades($evento_id);
$ativUsuario = $presencas->listarPresencas([$evento_id, Autenticacao::getCookieUsuario()], "atividades");
$atiInscritas = $presencas->listarAtividadesInscritas([$evento_id, Autenticacao::getCookieUsuario()], "atividades");
$x = 0;
?>

<main role='main'>
    <div class="jumbotron mt-n3" style="border-radius:0px; background:url(assets/imagens/default.svg);">
        <div class="container mb-5">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1 class="display-4 text-center"><?= $evento->nome ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <?php if (!Autenticacao::usuarioAdministrador()) { ?>
                    <h1 class="h3 mb-3 font-weight-normal text-center">Inscreva-se nas Atividades</h1>
                <?php } else { ?>
                    <h1 class="h3 mb-3 font-weight-normal text-center">Gerenciar as Atividades</h1>
                <?php }?>
            </div>
        </div>

        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
            <?php if (count($atividade["total_dias"][0]) > 0) {
                foreach ($atividade["total_dias"] as $i => $dia) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $i == 0 ? "active" : "" ?>" id="dia<?= $i ?>-tab" data-toggle="tab" href="#dia<?= $i ?>" role="tab" aria-controls="dia<?= $i ?>" aria-selected="true">
                            <?= Util::dia($dia->data) ."/". Util::mes($dia->data) ?>
                        </a>
                    </li>
                <?php }
            } else { ?>
                <li class="nav-item">
                    <a class="nav-link active" id="dia1-tab" data-toggle="tab" href="#dia1" role="tab" aria-controls="dia1" aria-selected="true">
                        Programação
                    </a>
                </li>
            <?php } ?>
        </ul>

        <form id="form_atividade" data-usuario_id="<?= Autenticacao::getCookieUsuario() ?>" data-count="<?= count($atividade["lista_atividades"]) ?>">
            <div class="tab-content mb-2" id="myTabContent">
                <?php foreach ($atividade["total_dias"] as $i => $dia) { ?>
                    <div class="tab-pane fade <?= $i == 0 ? "show active" : "" ?>" id="dia<?= $i ?>" role="tabpanel" aria-labelledby="dia<?= $i ?>-tab">
                        <table class="table table-hover" id="tabela" data-presencas="<?= implode("-",$atiInscritas)?>">
                            <thead class="thead-dark">
                                <tr>
                                    <?php if (!Autenticacao::usuarioAdministrador()) { ?>
                                        <th scope="col"></th>
                                    <?php } ?>
                                    <th scope="col">Horário</th>
                                    <th class="col-md-6" scope="col">Título</th>
                                    <th scope="col">Responsável</th>
                                    <th scope="col">Local</th>
                                    <?php if (Autenticacao::usuarioAdministrador()) { ?>
                                        <th scope="col">Opções</th>
                                    <?php } else { ?>
                                        <th scope="col">Vagas</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($atividade["lista_atividades"][0]) > 0) {
                                    foreach ($atividade["lista_atividades"] as $j => $ativ) {
                                        if (Util::dia($ativ->datahora_inicio) == Util::dia($dia->data)) {?>
                                            <tr>
                                                <!-- Colocar o 'atividade_id' da atividade no id e no for -->
                                                <?php if (!Autenticacao::usuarioAdministrador()) { ?>
                                                    <td class="align-middle">
                                                        <input type="checkbox" value="<?= $ativ->atividade_id ?>" id="atividade<?= ++$x ?>" data-presenca="">
                                                    </td>
                                                <?php } ?>
                                                <td class="align-middle">
                                                    <?= Util::hora($ativ->datahora_inicio) .":". Util::min($ativ->datahora_inicio) ?> às
                                                    <?= Util::hora($ativ->datahora_termino) .":". Util::min($ativ->datahora_termino) ?>
                                                </td>
                                                <td class="align-middle"><label class="mb-0" for="atividade<?= $x++ ?>"><?= $ativ->titulo ?></label></td>
                                                <td class="align-middle"><?= $ativ->responsavel ?></td>
                                                <td class="align-middle"><?= $ativ->local ?></td>

                                                <!-- verificar se não está muito proximo de começar a atividade para não deixar Excluir e Editar -->
                                                <?php if (Autenticacao::usuarioAdministrador()) { ?>
                                                    <td class="align-middle">
                                                        <a class="btn btn-outline-info" href="#" id="botao_alterar" title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-outline-danger" href="#" id="botao_excluir" title="Excluir">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                        <a class="btn btn-outline-success" href="lista_presenca.php?evento_id=<?= $evento->evento_id ?>&atividade_id=<?= $ativ->atividade_id ?>" id="" title="Inscritos">
                                                            <i class="fas fa-users"></i>
                                                        </a>
                                                    </td>
                                                <?php } else{
                                                    $presenca = $presencas->listarPresencas([$ativ->atividade_id, null], "nomes");
                                                    if (empty($presenca[0])) unset($presenca[0]);?>
                                                    <td class="align-middle"><?= ($ativ->quantidade_vaga-count($presenca)) . "/" . $ativ->quantidade_vaga?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php }
                                    }
                                } else { ?>
                                    <tr>
                                        <td class="text-center" colspan="4">Em Breve!</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
            <div class="row mb-5">
                <div class="col-md-3 ml-md-auto">
                    <button class="btn btn-outline-success btn-block" id="botao_atividade" type="submit">Salvar</button>
                </div>
            </div>
        </form>

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
                Pronto, as atividades foram cadastradas com sucesso.
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
                Desculpe, não conseguimos efetuar sua inscrições.
            </div>
            <div class="card-footer text-muted bg-warning p-1"></div>
        </div>
        <!-- Toast -->

    </div>
</div>
</main>

<?php
$footer = new Footer();
$footer->setJS('assets/js/atividades.js');

require_once 'footer.php';
?>
