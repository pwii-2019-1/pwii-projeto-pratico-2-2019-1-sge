<?php

namespace core\model;

use core\CRUD;

class Atividade extends CRUD {

    const TABELA = "atividade";
    const COL_ATIVIDADE_ID = "atividade_id";
    const COL_EVENTO_ID = "evento_id";
    const COL_TITULO = "titulo";
    const COL_RESPONSAVEL = "responsavel";
    const COL_CARGA_HORARIA = "carga_horaria";
    const COL_DATAHORA_INICIO = "datahora_inicio";
    const COL_DATAHORA_TERMINO = "datahora_termino";
    const COL_LOCAL = "local";
    const COL_QUANTIDADE_VAGA = "quantidade_vaga";
    const COL_TIPO = "tipo";

}
