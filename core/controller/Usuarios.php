<?php


namespace core\controller;


use core\model\Usuario;

class Usuarios {

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
     * Lista os eventos
     *
     * @param $dados
     * @return array
     */
}
