<?php

require_once 'header.php';

use core\controller\Usuarios;
use core\sistema\Footer;

$usuarios = new Usuarios();

$lista_usuarios = $usuarios->listarUsuarios();

?>

<main role="main">
    <div class="container center-block mb-4">

        <?php if (count($lista_usuarios) > 0) { ?>

            <h2 class="mb-4">Lista de usuários</h2>

            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" width="10%">ID</th>
                    <th scope="col" width="40%">Nome</th>
                    <th scope="col" width="35%">E-mail</th>
                    <th scope="col" width="15%">Administrador</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($lista_usuarios as $i => $usuario) { ?>

                    <tr>
                        <td><?= $usuario->usuario_id ?></td>
                        <td><?= $usuario->nome ?></td>
                        <td><?= $usuario->email ?></td>
                        <td class="check_admin">
                            <input type="checkbox" id="<?= $usuario->usuario_id ?>" value="<?= $usuario->admin ?>" <?= $usuario->admin == 1 ? 'checked' : '' ?>>
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

            <div class="row d-flex justify-content-end mb-4">
                <button id="atualiza_permissao" class="btn btn-outline-success">Atualizar</button>
            </div>

        <?php } else { ?>

            <h3>Não há usuários cadastrados</h3>

        <?php } ?>

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
                Pronto, as permissões dos usuários foram atualizadas com sucesso.
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
                Desculpe, não conseguimos atualizar as permissões dos usuários.
            </div>
            <div class="card-footer text-muted bg-warning p-1"></div>
        </div>
        <!-- Toast -->
    </div>
</main>

<?php

$footer = new Footer();

$footer->setJS('assets/js/listagem_usuarios.js');

require_once 'footer.php';

?>
