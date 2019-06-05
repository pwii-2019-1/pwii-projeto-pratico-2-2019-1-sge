<?php

namespace core\model;

use core\CRUD;
use Exception;

class Evento extends CRUD {

    const TABELA = "evento";
    const COL_EVENTO_ID = "evento_id";
    const COL_NOME = "nome";
    const COL_DATA_INICIO = "data_inicio";
    const COL_DATA_TERMINO = "data_termino";
    const COL_DESCRICAO = "descricao";
    const COL_DATA_PRORROGACAO = "data_prorrogacao";
    const COL_EVENTO_INICIO = "evento_inicio";
    const COL_EVENTO_TERMINO = "evento_termino";

    /**
     * @param $dados
     * @return bool
     */
    public function adicionar($dados) {

        try {

            $retorno = $this->create(self::TABELA, $dados);

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "\n Local: " . $e->getTraceAsString();
            return false;
        }

        return $retorno;
    }

    /**
     * @param $dados
     * @return bool
     * @throws Exception
     */
    public function alterar($dados) {

        if (!isset($dados[self::COL_EVENTO_ID])) {
            throw new Exception("É necessário informar o ID do evento para atualizar");
        }

        $where_condicao = self::COL_EVENTO_ID . " = ?";
        $where_valor[] = $dados[self::COL_EVENTO_ID];

        try {

            $this->update(self::TABELA, $dados, $where_condicao, $where_valor);

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "\n Local: " . $e->getTraceAsString();
            return false;
        }

        return $dados[self::COL_EVENTO_ID];
    }

    /**
     * @param null $campos
     * @param array $busca
     * @param null $ordem
     * @param null $limite
     * @return array
     */
    public function listar($campos = null, $busca = [], $ordem = null, $limite = null) {

        $campos = $campos != null ? $campos : "*";
        $ordem = $ordem != null ? $ordem : self::COL_NOME . " ASC";

        $where_condicao = "1 = 1";
        $where_valor = [];

        if (count($busca) > 0) {

            if (isset($busca['texto']) && !empty($busca['texto'])) {
                $where_condicao .= " AND (" . self::COL_NOME . " LIKE ? OR " . self::COL_DESCRICAO . " LIKE ?)";
                $where_valor[] = "%{$busca['texto']}%";
                $where_valor[] = "%{$busca['texto']}%";
            }

            if (
                (isset($busca['data_inicio']) && !empty($busca['data_inicio'])) ||
                (isset($busca['data_termino']) && !empty($busca['data_termino']))
            ) {
                if (!empty($busca['data_inicio']) && empty($busca['data_termino'])) {

                    $where_condicao .= " AND " . self::COL_DATA_INICIO . " >= ?";
                    $where_valor[] = $busca['data_inicio'];

                } else if (!empty($busca['data_inicio']) && !empty($busca['data_termino'])) {

                    $where_condicao .= " AND " . self::COL_DATA_INICIO . " >= ? AND " . self::COL_DATA_TERMINO . " <= ?";
                    $where_valor[] = $busca['data_inicio'];
                    $where_valor[] = $busca['data_termino'];

                } else if (empty($busca['data_inicio']) && !empty($busca['data_termino'])) {

                    $where_condicao .= " AND " . self::COL_DATA_TERMINO . " <= ?";
                    $where_valor[] = $busca['data_termino'];

                }
            }

            if (isset($busca['periodo']) && !empty($busca['periodo'])) {
                if ($busca['periodo'] == "hoje") {

                    $where_condicao .= " AND " . self::COL_DATA_INICIO . " = ?";
                    $where_valor[] = date('Y-m-d');

                } else if ($busca['periodo'] == "semana") {

                    $where_condicao .= " AND " . self::COL_DATA_INICIO . " BETWEEN ? AND ?";
                    $where_valor[] = date('Y-m-d');
                    $where_valor[] = date('Y-m-d', strtotime('+7 days'));

                } else {

                    $where_condicao .= " AND MONTH(" . self::COL_DATA_INICIO . ") = ?";
                    $where_valor[] = date('m');

                }
            }
        }

        $retorno = [];

        try {

            $retorno = $this->read(self::TABELA, $campos, $where_condicao, $where_valor, null, $ordem, $limite);

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "\n Local: " . $e->getTraceAsString();
        }

        return $retorno;
    }

    /**
     * @param $evento_id
     * @return array
     */
    public function selecionarEvento($evento_id) {

        $where_condicao = self::COL_EVENTO_ID . " = ?";
        $where_valor[] = $evento_id;

        $retorno = [];

        try {

            $retorno = $this->read(self::TABELA, "*", $where_condicao, $where_valor, null, null, 1);

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "\n Local: " . $e->getTraceAsString();
        }

        return $retorno;
    }
}
