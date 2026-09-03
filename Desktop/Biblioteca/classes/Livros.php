<?php

require_once 'Conexao.php';

class Livro{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    public function  obter($titulo = null, $autor = null, $categoria = null, $editora = null){
         try {

            $params = [];
            
            $sql = "
                    SELECT 
                        l.id_livro,
                        l.titulo,
                        l.descricao,
                        l.id_autor,
                        l.id_editora,
                        l.id_categoria,
                        l.data_cadastro,
                        l.ISBN,
                        l.status,
                        l.ano_publicacao,
                        l.imagem,
                        e.nome AS nome_editora,
                        a.nome AS nome_autor,
                        c.descricao AS categoria
                    FROM 
                        livro l
                    JOIN
                        autor a
                    ON
                        l.id_autor = a.id_autor
                    JOIN
                        categoria c 
                    ON
                        l.id_categoria = c.id_categoria
                    JOIN
                        editora e
                    ON
                        l.id_editora = e.id_editora
                    WHERE 
                        1=1
                    ";
            
            if(!empty($editora)){
                $sql .="
                        AND
                            UPPER(l.titulo) 
                        LIKE 
                            UPPER(:editora)
                    ";
                $params[':editora'] = "%$editora%";
            }
    
            if(!empty($categoria)){
                $sql .=" AND  c.id_categoria = :categoria";
                $params[':categoria'] = "%$categoria%";
            }

            if(!empty($titulo)){
                $sql .="
                        AND
                            UPPER(a.nome) 
                        LIKE 
                            UPPER(:titulo)
                    ";
                $params[':titulo'] = "%$titulo%";
            }

            if(!empty($autor)){
                $sql .="
                        AND
                            UPPER(a.nome) 
                        LIKE 
                            UPPER(:autornome_auto)
                    ";
                $params[':autor'] = "%$autor%";
            }

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

    public function obterId($id_livro){
        try {
            $sql = $this->conexao->prepare("
                    SELECT 
                        l.id_livro,
                        l.titulo,
                        l.descricao,
                        l.id_autor,
                        l.id_editora,
                        l.id_categoria,
                        DATE_FORMAT(l.data_cadastro, '%d/%/%y) AS data_cadastro,
                        l.ISBN,
                        l.status,
                        l.ano_publicacao,
                        l.imagem,
                        e.nome AS nome_editora,
                        a.nome AS nome_autor,
                        c.descricao AS categoria,
                    CASE
                        l.status 
                    WHEN 
                        1 
                    THEN ]
                        'Ativo'
                    ELSE
                        'Inativo'
                    END AS
                        status_desc
                    FROM 
                        livro l
                    JOIN
                        autor a
                    ON
                        l.id_autor = a.id_autor
                    JOIN
                        categoria c 
                    ON
                        l.id_categoria = c.id_categoria
                    JOIN
                        editora e
                    ON
                        l.id_editora = e.id_editora
                    WHERE 
                        id_livro = :id_livro
                    ");
            
            $sql->bindValue(':id_livro', $id_livro);
            $sql->execute();

            $dadosAutor = $sql->fetch(PDO::FETCH_ASSOC);

            return $dadosAutor;
        } catch (PDOException $e) {
            return array();
        } catch (Exception $e){
            return array();
        }
    }

    public function verificaLivroDisponivel($id_livro){
        try {
            $sql = $this->conexao->prepare("SELECT
                                                l.id_livro
                                            FROM
                                                livro l
                                            JOIN exemplar e 
                                            ON l.id_livro = e.id_livro
                                            WHERE 
                                                l.id_livro = :id_livro
                                            AND NOT EXISTS (SELECT 1 
                                                            FROM
                                                                locacao lo 
                                                            WHERE
                                                                lo.id_exemplar = e.id_exemplar
                                                            AND 
                                                                lo.id_status_locacao = 1
                                                            )
                                        ");
            $sql->bindValue(":id_livro", $id_livro);
            $sql->execute();
            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            if(isset($dados['id_livro'])){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }catch (Exception $e) {
            return false;
        }
    }

    
}