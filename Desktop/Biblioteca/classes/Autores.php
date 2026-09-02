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

    public function incluir($nome){
        try {
            $sql = $this->conexao->prepare("INSERT INTO autor (nome) VALUES (:nome)");
            $sql->bindValue(":nome", $nome);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }catch (Exception $e) {
            return false;
        }
    }

    public function alterar($id_autor, $nome_autor){
        try {
            $sql =$this->conexao->prepare("UPDATE
                                                autor
                                            SET
                                                nome = :nome
                                            WHERE
                                                id_autor = :id_editora    
                                            ");
            $sql->bindValue(':id_editora', $id_autor);
            $sql->bindValue(':nome', $nome_autor);
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }catch(Exception $e){
            return false;
        }
    }


    public function obterId($id_autor){
        try {
            $sql = $this->conexao->prepare("SELECT 
                                                id_autor, 
                                                nome, 
                                                data_cadastro
                                            FROM
                                                autor
                                            WHERE
                                                id_autor = :id_autor
                                        ");
            $sql->bindValue(':id_autor', $id_autor);
            $sql->execute();

            $dadosAutor = $sql->fetch(PDO::FETCH_ASSOC);

            return $dadosAutor;
        } catch (PDOException $e) {
            return array();
        } catch (Exception $e){
            return array();
        }
    }

    public function excluir($id_autor){
        try {
            $sql = $this->conexao->prepare("DELETE 
                                            FROM
                                                autor
                                            WHERE
                                                id_autor = :id_autor
                                        ");
            $sql->bindValue(':id_autor', $id_autor);
            $sql->execute();   
            NULL;
        } catch (PDOException $e) {
            return array();
        } catch (Exception $e){
            return array();
        }
    }
}