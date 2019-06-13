<?php


namespace core\controller;


use core\model\Atividade;

class Atividades {
    
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


        $atividade = new Atividade();

        $resultado = $atividade->adicionar($dados);

        if ($resultado > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    

}
