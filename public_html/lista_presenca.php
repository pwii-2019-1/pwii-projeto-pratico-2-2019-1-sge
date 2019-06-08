<?php
require_once 'header.php';

use core\controller\Eventos;
use core\controller\Atividades;
use core\controller\Presencas;
use core\sistema\Autenticacao;
use core\sistema\Footer;
use core\sistema\Util;

if (!Autenticacao::verificarLogin() || !Autenticacao::usuarioAdministrador()) {
    header('Location: login.php');
}

$evento_id = isset($_GET['evento_id']) ? $_GET['evento_id'] : "";
$atividade_id = isset($_GET['atividade_id']) ? $_GET['atividade_id'] : "";

$eventos = new Eventos();
$atividades = new Atividades();
$presencas = new Presencas();

$evento = $eventos->listarEvento($evento_id);
$atividade = $atividades->listarAtividade($atividade_id);
$presenca = $presencas->listarPresencas([$atividade_id, null], "nomes");

?>


<main role='main'>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1 class="display-4 text-center"><?= $evento->nome ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1 class="h3 mb-3 font-weight-normal text-center"><?= $atividade->titulo ?></h1>
                <h1 class="h4 mb-3 font-weight-normal text-center">Lista de Presença</h1>
            </div>
        </div>

        <form action="" id="formulario">
            <div class="row">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col-md-2 text-center">#</th>
                            <th class="col-md-4 text-center">Participante</th>
                            <th class="col-md-4 text-center">Título</th>
                            <th class="col-md-2 text-center">Presença</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php if (count($presenca[0]) > 0) {
                            foreach ($presenca as $j => $pre) {?>
                        <tr>
                            <td class="text-center"><?= ($j+1) ?></td>
                            <td class="text-center"><?= $pre->nome ?></td>
                            <td class="text-center"><?= $pre->cpf ?></td>
                            <td class="text-center"><input class="form-check-input" type="checkbox" id="<?= $pre->usuario_id ?>" value="<?= $pre->usuario_id ?>"></td>
                        </tr>
                    <?php }} else{ ?>
                        <tr>
                            <td class="text-center" colspan="4">Nenhum inscrito!</td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>

            </div>
            <div class="row mb-5">
                <div class="col-md-3 ml-md-auto">
                    <button class="btn btn-outline-success btn-block" id="botao_presenca" type="submit">Salvar</button>
                </div>
            </div>
        </form>
    </div>

</main>

<?php

$footer = new Footer();

$footer->setJS('assets/js/lista_presenca.js');

require_once 'footer.php';

?>
