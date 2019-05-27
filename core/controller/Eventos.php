<?php


namespace core\controller;


use core\model\Evento;

class Eventos {
    
    /**
     * Efetua o cadastro do evento ao sistema
     * Aqui vc trata os dados e manda eles tratados pra outra pagina que vai efetuar e tratar a resposta
     * la 
     * @param $dados
     * @return bool 
     */
    
    public function cadastrar($dados){

        $dados['nome'] = ucfirst($dados['nome']); // Deixa a primeira letra do nome do evento maiúscula
        $dados['descricao'] = ucfirst($dados['descricao']); // Deixa a primeira letra da descricao do evento maiúscula



        $evento = new Evento();

        $resultado = $evento->adicionar($dados);

        echo "Controler/Eventos.php";
        echo '<br>';
        echo '<pre>';
        echo $resultado;
        if ($resultado > 0) {
            return true;
        } else {
            return false;
        }
        
    }

}
