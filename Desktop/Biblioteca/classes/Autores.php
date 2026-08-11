<?php

require_once 'Conexao.php';

class Autor{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    public function  obter($nome_autor = null){
         try {

            $params = [];
            
            $sql = "
                    SELECT 
                        a.id_autor, 
                        a.nome, 
                        DATE_FORMAT(e.data_cadastro, '%d/%m/%Y') AS data_cadastro,
                    COUNT(l.id_livro) AS total_livros
                    FROM 
                        autor a 
                    LEFT JOIN 
                        livro l
                    ON
                        a.id_autor = l.id_autor 
                    ";
            
            if(!empty($nome_autor)){
                $sql .="
                        WHERE
                            UPPER(a.nome) 
                        LIKE 
                            UPPER(:nome_autor)
                    ";
                $params[':nome_autor'] = "%$nome_autor%";
            }

            $sql .= "
                    GROUP BY
                        a.id_autor, 
                        a.nome, 
                        a.data_cadastro 
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