<?php

class DAOProduto{
    public function cadastrar(Produto $produto){
        $sql = "INSERT INTO Produto
        VALUES (default, :nome, :preco, :descricao, :departamento)";
        
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":nome", $produto->getNome());
        $con->bindValue(":preco", $produto->getPreco());
        $con->bindValue(":descricao", $produto->getDescricao());
        //$produto->getDepartamento() um objeto da classe departamento
        //entao $produto->getDepartamento()->getId() retorna o id do departamento
        $con->bindValue(":departamento", $produto->getDepartamento()->getId());
      
        $con->execute();
        return "Cadastro com sucesso";
    }   
        //
        public function listaProduto(){
            $sql = "SELECT 
                        produto.nome,
                        produto.preco,
                        produto.pk_produto as 'id',
                        departamento.nome as 'departamento'
                        FROM produto INNER JOIN departamento 
                        ON produto.fk_departamento_produto = 
                        departamento.pk_departamento"
                    ;
            $con = Conexao::getInstance()->prepare($sql);
            $con->execute();
    
            $lista = array();
    
            while($produto = $con->fetch(PDO::FETCH_ASSOC)){
                $lista[] = $produto;
            }
            return $lista;
        }
    
        public function buscaPorId($id){
    
            $sql = "SELECT * FROM produto WHERE pk_produto = :id";
            $con = Conexao::getInstance()->prepare($sql);
            $con->bindValue(":id", $id);
            $con->execute();
    
            $produto = new Produto();
    
            $produto = $con->fetch(PDO::FETCH_ASSOC);
            //print_r($cliente);//testa saida 
            return $produto;
    
        }

    
}
?>