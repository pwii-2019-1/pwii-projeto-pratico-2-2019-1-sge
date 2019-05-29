<?php


namespace core\controller;


use core\model\Evento;

class Eventos {

    /**
     * Limite da listagem de eventos
     */
    const LIMITE = 9;

    private $evento_id = null;
    private $nome = null;
    private $data_inicio = null;
    private $data_termino = null;
    private $descricao = null;
    private $data_prorrogacao = null;
    private $evento_inicio = null;
    private $evento_termino = null;
    private $lista_eventos = [];
    private $total_paginas = null;

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    /**
     * Efetua o cadastro do evento ao sistema
     * Aqui vc trata os dados e manda eles tratados pra outra pagina que vai efetuar e tratar a resposta
     * la
     * @param $dados
     * @return bool
     */
    public function cadastrar($dados) {

        $dados['nome'] = ucfirst($dados['nome']); // Deixa a primeira letra do nome do evento maiúscula
        $dados['descricao'] = ucfirst($dados['descricao']); // Deixa a primeira letra da descricao do evento maiúscula

        $evento = new Evento();

        $resultado = $evento->adicionar($dados);

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

        $this->__set("lista_eventos", $lista);
        $this->__set("total_paginas", $paginas[0]->total);

        return [
            "lista_eventos" => $this->lista_eventos,
            "total_paginas" => ceil($this->total_paginas / self::LIMITE)
        ];
    }

}
