<?php

require_once 'Conexao.php';

class Editora{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    public function  obter($nome_editora = null){
         try {

            $params = [];
            
            $sql = "
                    SELECT 
                        e.id_editora, 
                        e.nome, 
                        DATE_FORMAT(e.data_cadastro, '%d/%m/%Y') AS data_cadastro,
                    COUNT(l.id_livro) AS total_livros
                    FROM 
                        editora e 
                    LEFT JOIN 
                        livro l
                    ON
                        e.id_editora = l.id_editora 
                    ";
            
            if(!empty($nome_editora)){
                $sql .="
                        WHERE
                            UPPER(e.nome) 
                        LIKE 
                            UPPER(:nome_editora)
                    ";
                $params[':nome_editora'] = "%$nome_editora%";
            }

            $sql .= "
                    GROUP BY
                        e.id_editora, 
                        e.nome, 
                        e.data_cadastro 
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