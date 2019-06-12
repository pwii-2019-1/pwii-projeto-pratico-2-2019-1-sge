<?php


namespace core\controller;


use core\model\Evento;

class Eventos
{

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

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    /**
     * Efetua o cadastro do evento ao sistema
     * Aqui vc trata os dados e manda eles tratados pra outra pagina que vai efetuar e tratar a resposta
     * la
     * @param $dados
     * @return bool
     * @throws \Exception
     */
    public function cadastrar($dados)
    {

        $dados['nome'] = ucfirst($dados['nome']); // Deixa a primeira letra do nome do evento maiúscula
        $dados['descricao'] = ucfirst($dados['descricao']); // Deixa a primeira letra da descricao do evento maiúscula

        $dados['inativo'] = "0"; // Cadastra o evento como ativo
        $evento = new Evento();
        // Tratar o cadastro ou alteração aqui

        if (isset($dados['evento_id'])) {
            // Se for passado o evento_id será feito o update
            $resultado = $evento->alterar($dados);
        } else {
            //Senão, será feito o cadastro
            $resultado = $evento->adicionar($dados);
        }

        if ($resultado > 0) {
            return $resultado;
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
    public function listarEventos($dados = [])
    {
        $evento = new Evento();

        $busca = isset($dados['busca']) ? $dados['busca'] : [];

        if (isset($dados['pg']) && is_numeric($dados['pg'])) {
            $limite = ($dados['pg'] - 1) * self::LIMITE . ", " . self::LIMITE;
        } else {
            $limite = self::LIMITE;
        }

        if (isset($dados['busca']['me'])) {
            $campos = Evento::TABELA . "." . Evento::COL_EVENTO_ID . ", " .
                    Evento::COL_NOME . ", " .
                    Evento::COL_DATA_INICIO . ", " .
                    Evento::COL_DATA_TERMINO . ", " .
                    Evento::COL_DESCRICAO . ", " .
                    Evento::COL_DATA_PRORROGACAO . ", " .
                    Evento::COL_EVENTO_INICIO . ", " .
                    Evento::COL_EVENTO_TERMINO;

            $lista = $evento->listar($campos, $busca, Evento::COL_EVENTO_INICIO . " ASC", $limite);
            $paginas = count($lista);
            $this->__set("total_paginas", $paginas);

        } else {
            $lista = $evento->listar(null, $busca, Evento::COL_EVENTO_INICIO . " DESC", $limite);
            $paginas = $evento->listar("COUNT(*) as total", $busca, null, null);
            $this->__set("total_paginas", $paginas[0]->total);
        }

        if (count($lista) > 0 ) {
            $this->__set("lista_eventos", $lista);
        }

        return [
            "lista_eventos" => $this->lista_eventos,
            "total_paginas" => ceil($this->total_paginas / self::LIMITE)
        ];
    }

    public function listarEvento($evento_id)
    {
        $evento = new Evento();


        $dados = $evento->selecionarEvento($evento_id);

        $dados = $dados[0];
        return $dados;
    }

    public function invalidarEvento($evento_id)
    {

        $evento = new Evento();

        $dados['evento_id'] = $evento_id['evento_id'];
        $dados['inativo'] = "1";
        $resultado = $evento->alterar($dados);

        if ($resultado > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
}
