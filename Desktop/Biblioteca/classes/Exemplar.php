<?php

require_once 'Conexao.php';

class Exemplar{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    public function obterPorIdLivro($id_livro){
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

    public function obterLivro($id_livro){
        try{
            $sql = $this->conexao->prepare("SELECT e.id_exemplar, 
                                                    e.codigo,
                                                    DATE_FORMAT(e.data_cadastro, '%d/$m/%Y) AS data_cadastro,
                                                    CASE WHEN (
                                                                SELECT 
                                                                    id_locacao 
                                                                FROM 
                                                                    locacao 
                                                                WHERE 
                                                                    id_exemplar = e.id_exemplar 
                                                                AND id_status_locacao <> 3
                                                            ) IS NOT NULL
                                                            THEN 
                                                                'Alugado'
                                                            ELSE
                                                                'Disponivel' END AS status_exemplar
                                                    FROM exemplar e 
                                                    WHERE e.id_livro = :id_livro");
            $sql->bindValue(':id_livro', $id_livro);
            $sql->execute();

            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            return $dados;
        }catch (PDOException $e) {
            return array();
        } catch (Exception $e){
            return array();
        }
    }
    
    public function obterLivroPorIdExemplar($id_exemplar){
        try{
            $sql = $this->conexao->prepare("SELECT id_livro FROM exemplar WHERE id_exemplar = :id_exemplar");
            $sql->bindValue(':id_exemplar', $id_exemplar);
            $sql->execute();

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            if(isset($dados['id_livro'])){
                return $dados['id_livro'];
            }else {
                return null;
            }
        }catch (PDOException $e) {
            return null;
        } catch (Exception $e){
            return null;
        }
    }


    public function excluir($id_exemplar){
        try{
            $sql = $this->conexao->prepare("DELETE FROM exemplar WHERE id_exemplar = :id_exemplar");
            $sql->bindValue(':id_exemplar', $id_exemplar);
            $sql->execute();
        }catch (PDOException $e) {
            null;
        } catch (Exception $e){
            null;
        }
    }
    
}