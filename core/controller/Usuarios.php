<?php


namespace core\controller;


use core\model\Usuario;

class Usuarios {
/**
     * Limite da listagem de usuario
     */
    /**
     * Limite da listagem de usuario
     */
    const LIMITE = 9;

    private $usuario_id = null;
    private $nome = null;
    private $cpf = null;
    private $senha = null;
    private $email = null;
    private $data_nascimento = null;
    private $telefone = null;
    private $endereco = null;
    private $bairro = null;
    private $estado = null;
    private $cidade = null;
    private $cep = null;
    private $nacionalidade = null;
    private $ocupacao = null;
    private $adm = null;
    private $lista_usuarios = [];

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    /**
     * Efetua o cadastro do usuario ao sistema
     * Aqui vc trata os dados e manda eles tratados pra outra pagina que vai efetuar e tratar a resposta
     * la
     * @param $dados
     * @return bool
     */
    public function cadastrar($dados) {

        $usuario = new Usuario();

        $resultado = $usuario->adicionar($dados);

        if ($resultado > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Listar usuários
     *
     * @return array
     */
    public function listarUsuarios() {
        $usuario = new Usuario();

        $campos = Usuario::COL_USUARIO_ID . ", " . Usuario::COL_NOME . ", " . Usuario::COL_EMAIL . ", " . Usuario::COL_ADMIN;

        $lista = $usuario->listar($campos, null, null, 100);

        if (count($lista) > 0) {
            $this->__set("lista_usuarios", $lista);
        }

        return $this->lista_usuarios;
    }

    /**
     * Altera as permissões dos usuários cadastrados
     *
     * @param $dados
     * @return bool
     * @throws \Exception
     */
    public function atualizarPermissoes($dados) {
        $user = new Usuario();

        $retorno = [];

        if (isset($dados['usuarios']) && count($dados['usuarios']) > 0) {
            foreach ($dados['usuarios'] as $usuario) {
                $retorno[] = $user->alterar($usuario);
            }
        }

        if (array_search('false', $retorno) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
