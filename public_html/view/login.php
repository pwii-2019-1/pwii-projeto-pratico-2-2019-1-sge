<?php

require_once '../../vendor/autoload.php';
require_once '../../config.php';

use core\sistema\Autenticacao;
use core\sistema\Footer;

if (Autenticacao::verificarLogin()) {
    header('Location: ../index.php');
}

require_once '../header.php';

?>

<main role='main'>
    <div class="container center-block">
        <div class="row ">
            <div class="col"></div>
            <div class="col-md-6">
                <h1 class="display-4 text-center">SGE</h1>
                <form class="form-signin" action="" method="post">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Logue-se</h1>
                    <div class="form-group">
                        <label for="cpf" class="sr-only">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" required
                               autofocus>
                    </div>

                    <div class="form-group">
                        <label for="senha" class="sr-only">Password</label>
                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha"
                               required>
                    </div>
                    <div class="checkbox">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <input type="checkbox" id="lembrar" value="Lembrar-me">
                                    <label for="lembrar">Lembrar-me</label>
                                </div>
                                <div class="col">
                                    <p class="text-right"><a href="#">Esqueci minha senha</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="botao_login">Entrar</button>
                    <hr>
                    <p class="text-center">Ainda não está no SGE? <a href="#">Cadastre-se</a></p>
                </form>
            </div>
            <div class="col">
                <div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

$footer = new Footer();
$footer->setJS('../assets/js/login.js');

require_once '../footer.php';
