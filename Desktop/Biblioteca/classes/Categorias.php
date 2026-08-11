<?php

require_once 'Conexao.php';

class Categoria{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    public function  obter($nome_categoria = null){
         try {

            $params = [];
            
            $sql = "
                    SELECT 
                        a.id_categoria, 
                        a.descricao, 
                    COUNT(l.id_livro) AS total_livros
                    FROM 
                        categoria a 
                    LEFT JOIN 
                        livro l
                    ON
                        a.id_categoria = l.id_categoria 
                    ";
            
            if(!empty($nome_categoria)){
                $sql .="
                        WHERE
                            UPPER(a.descricao) 
                        LIKE 
                            UPPER(:nome_categoria)
                    ";
                $params[':nome_categoria'] = "%$nome_categoria%";
            }

            $sql .= "
                    GROUP BY
                        a.id_categoria, 
                        a.descricao, 
                    ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute($params);
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dados;

         } catch (PDOException $e) {
            return array();
         }catch (Exception $e) {
            return array();
         }
    }

    public function obterId(){

    }

}