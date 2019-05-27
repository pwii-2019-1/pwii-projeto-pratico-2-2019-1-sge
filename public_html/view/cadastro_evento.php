<?php

use core\sistema\Footer;

require_once '../../vendor/autoload.php';
require_once '../header.php';

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
                <form class="needs-validation">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" placeholder="Insira o nome do evento" required
                               autofocus>
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
                        <textarea id="descricao" class="form-control" rows="2"
                                  placeholder="Insira a descrição do evento" required></textarea>
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
                            <input type="date" class="form-control" id="data_prorrogacao">
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
    </div>
</main>

<?php

$footer = new Footer();
$footer->setJS('../assets/js/cadastro_evento.js');

require_once '../footer.php';


?>
