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

    public function incluir($descricao){
        try {
            $sql = $this->conexao->prepare("INSERT INTO categoria (descricao) VALUES (:descricao)");
            $sql->bindValue(":descricao", $descricao);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }catch (Exception $e) {
            return false;
        }
    }

    public function alterar($id_categoria, $descricao){
        try {
            $sql =$this->conexao->prepare("UPDATE
                                                categoria
                                            SET
                                                descricao = :descricao
                                            WHERE
                                                id_categoria = :id_categoria   
                                            ");
            $sql->bindValue(':id_categoria', $id_categoria);
            $sql->bindValue(':descricao', $descricao);
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }catch(Exception $e){
            return false;
        }
    }


    public function obterId($id_categoria){
        try {
            $sql = $this->conexao->prepare("SELECT 
                                                id_categoria, 
                                                descricao,
                                            FROM
                                                categoria
                                            WHERE
                                                id_categoria = :id_categoria
                                        ");
            $sql->bindValue(':id_categoria', $id_categoria);
            $sql->execute();

            $dadosCategoria = $sql->fetch(PDO::FETCH_ASSOC);

            return $dadosCategoria;
        } catch (PDOException $e) {
            return array();
        } catch (Exception $e){
            return array();
        }
    }

    public function excluir($id_categoria){
        try {
            $sql = $this->conexao->prepare("DELETE 
                                            FROM
                                                categoria
                                            WHERE
                                                id_categoria = :id_categoria
                                        ");
            $sql->bindValue(':id_categoria', $id_categoria);
            $sql->execute();   
            NULL;
        } catch (PDOException $e) {
            return array();
        } catch (Exception $e){
            return array();
        }
    }
}