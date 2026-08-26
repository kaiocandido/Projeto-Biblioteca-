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

    public function incluir($nome){
        try {
            $sql = $this->conexao->prepare("INSERT INTO editora (nome) VALUES (:nome)");
            $sql->bindValue(":nome", $nome);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }catch (Exception $e) {
            return false;
        }
    }
    
    public function obterId($id_editora){
        try {
            $sql = $this->conexao->prepare("SELECT 
                                                id_editora, 
                                                nome, 
                                                data_cadastro
                                            FROM
                                                editora
                                            WHERE
                                                id_editora = :id_editora
                                        ");
            $sql->bindValue(':id_editora', $id_editora);
            $sql->execute();

            $dadosEditora = $sql->fetch(PDO::FETCH_ASSOC);

            return $dadosEditora;
        } catch (PDOException $e) {
            return array();
        } catch (Exception $e){
            return array();
        }
    }


    public function alterar($id_editora, $nome_editora){
        try {
            $sql =$this->conexao->prepare("UPDATE
                                                editora
                                            SET
                                                nome = :nome
                                            WHERE
                                                id_editora = :id_editora    
                                            ");
            $sql->bindValue(':id_editora', $id_editora);
            $sql->bindValue(':nome', $nome_editora);
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }catch(Exception $e){
            return false;
        }
    }

    private function excluirExemplaresEditora($id_editora){
        $sql = $this->conexao->prepare("DELETE 
                                        FROM 
                                            exemplar 
                                        WHERE 
                                            id_livro IN (SELECT id_livro FROM  livro WHERE id_editora = :id_editora)
                                        ");
        $sql->bindValue('id_editora', $id_editora);
        $sql->execute();
    }

    private function excluirLivrosEditora($id_editora){
        $sql = $this->conexao->prepare("DELETE 
                                        FROM 
                                            livro 
                                        WHERE 
                                            id_editora = :id_editora
                                        ");
        $sql->bindValue('id_editora', $id_editora);
        $sql->execute();
    }

    private function excluirEditora($id_editora){
        $sql = $this->conexao->prepare("DELETE 
                                        FROM 
                                            editora 
                                        WHERE 
                                            id_editora = :id_editora
                                        ");
        $sql->bindValue('id_editora', $id_editora);
        $sql->execute();
    }

    private function excluirLocacao($id_editora){
        $sql = $this->conexao->prepare("DELETE 
                                        FROM 
                                            locacao 
                                        WHERE 
                                            id_exemplar 
                                        IN (
                                            SELECT 
                                                e.id_exemplar 
                                            FROM 
                                                exemplar 
                                            JOIN 
                                                livro l 
                                            ON 
                                                e.id_livro = l.id_livro 
                                            WHERE 
                                                l.id_editora = :id_editora
                                        ");
        $sql->bindValue('id_editora', $id_editora);
        $sql->execute();
    }

    public function excluir($id_editora){
        try {
            $this->conexao->beginTransaction();
            
            $this->excluirLocacao($id_editora);
            $this->excluirExemplaresEditora($id_editora);
            $this->excluirLivrosEditora($id_editora);
            $this->excluirEditora($id_editora);

            $this->conexao->commit();
        }catch(PDOException $e){
            $this->conexao->rollback();
        }catch(Exception $e){
            $this->conexao->rollback();
        }
    }
}