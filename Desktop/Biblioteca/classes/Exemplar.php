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
    
}