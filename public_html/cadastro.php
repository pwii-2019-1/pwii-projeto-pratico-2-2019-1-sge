<?php

require_once 'header.php';

use core\sistema\Footer;

?>

<main role="main">
    <div class="container center-block mb-4">
        <div class="row">
            <div class="col">
                <h1 class="display-4 text-center">SGE</h1>
                <h1 class="h3 mb-3 font-weight-normal text-center">Cadastre-se</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <form id="formulario" class="needs-validation">
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" placeholder="Insira seu nome completo"
                                   required autofocus >
                        </div>
                        <div class="form-group col-md-5">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" placeholder="000.000.000-00" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nacionalidade">Nacionalidade</label>
                            <input type="text" class="form-control" id="nacionalidade"
                                   placeholder="Insira sua nacionalidade" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ocupacao">Ocupação</label>
                            <input type="text" class="form-control" id="ocupacao" placeholder="Insira sua ocupação"
                                   required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Insira seu e-mail"
                                   required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" placeholder="Crie uma senha"
                                   required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm_senha">Confirmação de Senha:</label>
                            <input type="password" class="form-control" id="confirm_senha"
                                   placeholder="Confirme sua senha" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="endereco">Logradouro:</label>
                            <input type="text" class="form-control" id="endereco" placeholder="Insira seu logradouro"
                                   required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" placeholder="Insira seu bairro"
                                   required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control" id="cep" placeholder="00000-000" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estado">Estado:</label>
                            <select id="estado" class="custom-select" required>
                                <option value="">Selecione seu estado</option>
                                <option value="1"></option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade">Cidade</label>
                            <select id="cidade" class="custom-select" required>
                                <option value="">Selecione sua cidade</option>
                                <option value="1"></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8"></div>
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
               Pronto, o Usuario foi cadastrado com sucesso.
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
               Desculpe, não conseguimos efetuar seu login.
            </div>
            <div class="card-footer text-muted bg-warning p-1"></div>
        </div>
        <!-- Toast -->

        <!-- Toast Alerta -->

        <div class="toast" id="msg_alerta" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: absolute; top: 4rem; right: 1rem;">
            <div class="toast-header">
                <strong class="mr-auto">Houve um erro!</strong>
                <small>Agora</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
               Por favor, confira todos os dados informados.
            </div>
            <div class="card-footer text-muted bg-warning p-1"></div>
        </div>
        <!-- Toast -->
<?php

$footer = new Footer();
$footer->setJS('assets/js/cadastro_usuario.js');
require_once 'footer.php';

?>
