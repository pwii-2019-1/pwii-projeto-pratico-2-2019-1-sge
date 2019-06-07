<?php

namespace core\model;

use core\CRUD;
use Exception;

class Presenca extends CRUD {

    const TABELA = "presenca";
    const COL_ATIVIDADE_ID = "atividade_id";
    const COL_USUARIO_ID = "usuario_id";
    const COL_PRESENCA = "presenca";

    /**
     * @param $dados
     * @return bool
     */
    public function adicionar($dados) {
        $retorno = 0;

        try {
            foreach ($dados["lista_presenca"] as $i => $value) {

                $this->deletarRelacao($value[self::COL_ATIVIDADE_ID], $value[self::COL_USUARIO_ID]);

                $this->create(self::TABELA, $value);
                $retorno++;
            }

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "\n Local: " . $e->getTraceAsString();
            return false;
        }

        return $retorno;
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

    /**
     * Remove a relação entre o Usuário e a Atividade antes de inserir/atualizar uma nova relação
     *
     * @param $atividade_id
     * @param $usuario_id
     * @return bool|mixed
     */
    public function deletarRelacao($atividade_id, $usuario_id) {

        $where_condicao = self::COL_ATIVIDADE_ID . " = ? AND " . self::COL_USUARIO_ID . " = ?";
        $where_valor = [$atividade_id, $usuario_id];

        try {

            $retorno = $this->delete(self::TABELA, $where_condicao, $where_valor);

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "\n Local: " . $e->getTraceAsString();
            return false;
        }

        return $retorno;

    }
}
