<?php

use core\sistema\Footer;

require_once '../../vendor/autoload.php';
require_once '../header.php';

?>

<main role='main'>
    <div class="container center-block">
        <div class="row">
            <div class="col">
                <h1 class="display-4 text-center">SGE</h1>
                <h1 class="h3 mb-3 font-weight-normal text-center">Alterar Senha</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form class="form-signin">
                    <div class="form-row mb-4">
                        <div class="form-group col">
                            <label for="senha">Senha Atual:</label>
                            <input type="password" id="senha" class="form-control" placeholder="Digite sua senha atual"
                                   required autofocus>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="senha_nova">Nova Senha:</label>
                            <input type="password" id="senha_nova" class="form-control"
                                   placeholder="Digite sua nova senha" required autofocus>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="confirm_senha">Confirmação de Senha:</label>
                            <input type="password" id="confirm_senha" class="form-control"
                                   placeholder="Confirme sua nova senha" required autofocus>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 ml-md-auto">
                            <button class="btn btn-outline-primary btn-block" type="submit">Alterar</button>
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
