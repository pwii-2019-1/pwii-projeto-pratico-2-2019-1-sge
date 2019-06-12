<?php


namespace core\controller;


use core\model\Atividade;

class Atividades {
    /**
     * Limite da listagem de atividade
     */
    const LIMITE = 9;

    private $atividade_id = null;
    private $evento_id = null;
    private $titulo = null;
    private $responsavel = null;
    private $carga_horaria = null;
    private $datahora_inicio = null;
    private $datahora_termino = null;
    private $local = null;
    private $quantidade_vaga = null;
    private $tipo = null;
    private $lista_atividades = [];

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    /**
     * Efetua o cadastro da atividade ao sistema
     * Aqui vc trata os dados e manda eles tratados pra outra pagina que vai efetuar e tratar a resposta
     * la
     * @param $dados
     * @return bool
     */

    public function cadastrar($dados){


        $dados['titulo'] = ucfirst($dados['titulo']); // Deixa a primeira letra do nome da atividade maiúscula
        $dados['responsavel'] = ucfirst($dados['responsavel']); // Deixa a primeira letra do responsavel da atividade maiúscula
        $dados['inativo'] = 0;

        $atividade = new Atividade();

        $resultado = $atividade->adicionar($dados);

        if ($resultado > 0) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Listar atividades
     *
     * @return array
     */
    public function listarAtividades($evento_id) {
        $atividade = new Atividade();

        $lista = $atividade->listar($evento_id, null, null, null);

        if (count($lista) > 0) {
            $this->__set("lista_atividades", $lista);

            $dias = $atividade->listar($evento_id, "DATE(datahora_inicio) AS data", "data", "data ASC");
            $this->__set("total_dias", $dias);
        }

        return [
            "lista_atividades" => $this->lista_atividades,
            "total_dias" => $this->total_dias
        ];
    }

    public function listarAtividade($atividade_id) {
        $atividade = new Atividade();

        $dados = $atividade->selecionarAtividade($atividade_id);

        $dados = $dados[0];
        return $dados;
    }

    public function invalidarAtividade($atividade_id) {
        $atividade = new Atividade();

        $dados['atividade_id'] = $atividade_id['atividade_id'];
        $dados['inativo'] = "1";

        $resultado = $atividade->alterar($dados);

        if ($resultado > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
}
