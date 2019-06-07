<?php


namespace core\controller;


use core\model\Presenca;

class Presencas {

    /**
     * Limite da listagem de eventos
     */
    const LIMITE = 9;

    private $atividade_id = null;
    private $usuario_id = null;
    private $presenca = null;
    private $lista_eventos = [];

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    /**
     * Efetua o cadastro do usuario nas atividades selecionadas
     * Aqui vc trata os dados e manda eles tratados pra outra pagina que vai efetuar e tratar a resposta la
     *
     * @param $dados
     * @return bool
     * @throws \Exception
     */
    public function cadastrar($dados) {

        $presenca = new Presenca();

        if (isset($dados['alterar'])) {
            $resultado = $presenca->alterar($dados);
        } else {
            $resultado = $presenca->adicionar($dados);
        }

        if ($resultado > 0) {
            return echo $resultado;
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
    public function listarEventos($dados = []) {
        $evento = new Evento();

        $busca = isset($dados['busca']) ? $dados['busca'] : [];

        if (isset($dados['pg']) && is_numeric($dados['pg'])) {
            $limite = ($dados['pg'] - 1) * self::LIMITE . ", " . self::LIMITE;
        } else {
            $limite = self::LIMITE;
        }

        $lista = $evento->listar(null, $busca, Evento::COL_EVENTO_INICIO . " DESC", $limite);
        $paginas = $evento->listar("COUNT(*) as total", $busca, null, null);

        if (count($lista) > 0 && isset($lista[0]) && count($lista[0]) > 0) {
            $this->__set("lista_eventos", $lista);
        }

        $this->__set("total_paginas", $paginas[0]->total);

        return [
            "lista_eventos" => $this->lista_eventos,
            "total_paginas" => ceil($this->total_paginas / self::LIMITE)
        ];
    }

    public function listarEvento($evento_id) {
        $evento = new Evento();


        $dados = $evento->selecionarEvento($evento_id);

        $dados = $dados[0];
        return $dados;
    }
}
