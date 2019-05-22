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
                <h1 class="h3 mb-3 font-weight-normal text-center">Cadastro Atividade</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <form class="needs-validation">
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="data">Data:</label>
                            <input type="date" class="form-control" id="data" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hora_inicio">Hora de Início:</label>
                            <input type="time" class="form-control" id="hora_inicio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hora_termino">Hora de Término:</label>
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
                                <option value="">Palestra</option>
                                <option value="">Minicurso</option>
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
    </div>
</main>

<?php

$footer = new Footer();

require_once '../footer.php';

?>
