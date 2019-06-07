<?php

use core\sistema\Footer;

require_once 'header.php';

?>


<main role='main'>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1 class="display-4 text-center">Nome do Evento</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1 class="h3 mb-3 font-weight-normal text-center">Nome da Atividade</h1>
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
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Ciclano de Tal</td>
                            <td class="text-center">065.396.191-03</td>
                            <td class="text-center"><input class="form-check-input" type="checkbox" id="10" value=""></td>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Ciclano de Tal</td>
                            <td class="text-center">065.396.191-03</td>
                            <td class="text-center"><input class="form-check-input" type="checkbox" id="20" value=""></td>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Ciclano de Tal</td>
                            <td class="text-center">065.396.191-03</td>
                            <td class="text-center"><input class="form-check-input" type="checkbox" id="30" value=""></td>
                        </tr>
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