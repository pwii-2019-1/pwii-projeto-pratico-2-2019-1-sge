<?php


namespace core\sistema;


use core\model\Usuario;

class Autenticacao {

    const COOKIE_USUARIO = "usuario";
    const COOKIE_ACESSO = "acesso";

    /**
     * Retorna o valor do cookie do usuario logado
     *
     * @return bool|mixed
     */
    public static function getCookieUsuario() {
        if (self::verificarLogin()) {
            return $_COOKIE[self::COOKIE_USUARIO];
        } else return false;
    }

    /**
     * Retorna o valor do cookie de acesso do usuario logado
     *
     * @return bool|mixed
     */
    public static function getCookieAcesso() {
        if (self::verificarLogin()) {
            return $_COOKIE[self::COOKIE_ACESSO];
        } else return false;
    }

    /**
     * Verifica se o usuário já está logado no sistema
     */
    public static function verificarLogin() {
        if (isset($_COOKIE[self::COOKIE_USUARIO]) && isset($_COOKIE[self::COOKIE_ACESSO])) {
            return true;
        } else {
            self::logout();
            return false;
        }
    }

    /**
     * Efetua o login do usuário no sistema
     *
     * @param $usuario_cpf
     * @param $senha
     * @param bool $lembrar
     * @param bool $senha_md5
     * @return bool
     */
    public static function login($usuario_cpf, $senha, $lembrar = false, $senha_md5 = false) {

        $nova_senha = ($senha_md5) ? $senha : md5($senha);

        $user = new Usuario();
        $resultado = $user->autenticarUsuario($usuario_cpf, $nova_senha);

        if (count($resultado) > 0) {
            $usuario_id = $resultado->usuario_id;
        } else {
            return false;
        }

        $lembrar_acesso = $lembrar ? time() + 604800 : null;

        setcookie(self::COOKIE_USUARIO, $usuario_id, $lembrar_acesso, PATH_COOKIE);
        setcookie(self::COOKIE_ACESSO, $nova_senha, $lembrar_acesso, PATH_COOKIE);

        return true;
    }

    /**
     * Efetua o logout no sistema e remove os cookies de acesso
     */
    public static function logout() {
        if (isset($_COOKIE[self::COOKIE_USUARIO]) && isset($_COOKIE[self::COOKIE_ACESSO])) {
            setcookie(self::COOKIE_USUARIO, "", time() - 1, PATH_COOKIE);
            setcookie(self::COOKIE_ACESSO, "", time() - 1, PATH_COOKIE);
        }
    }
}
