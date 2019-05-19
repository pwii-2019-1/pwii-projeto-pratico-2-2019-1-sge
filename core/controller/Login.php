<?php


namespace core\controller;


use core\sistema\Autenticacao;

class Login {

    /**
     * Efetua o login do usuário ao sistema
     *
     * @param $dados
     * @return bool
     */
    public function login($dados) {
        return Autenticacao::login($dados['cpf'], $dados['senha'], $dados['lembrar'], false);
    }
}
