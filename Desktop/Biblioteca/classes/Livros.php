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

    public function excluir($id_livro){
        try{
            $sql = $this->conexao->prepare("DELETE FROM livro WHERE id_livro = :id_livro ");
            $sql->bindValue(":id_livro", $id_livro);
            $sql->execute();
        }catch (PDOException $e) {
            null;
        }catch (Exception $e) {
            null; 
        }

    }

    public function remover_imagem_banco($id_livro){
        try{
            $sql = $this->conexao->prepare("UPDATE livro SET imagem = null WHERE id_livro = :id_livro ");
            $sql->bindValue(":id_livro", $id_livro);
            $sql->execute();
        }catch (PDOException $e) {
            null;
        }catch (Exception $e) {
            null; 
        }
    }

    public function validar($dados){
        if(!$this->validarAnoPublicacao($dados['ano_publicacao'])){
            return 'Ano de publicação invalido!!';
        }

        if(!in_array($dados['status'], [0, 1])){
            return 'Status invalido!!';
        }

        if(!is_numeric($dados['autor'])){
            return 'Autor invalido!!';
        }

        if(!is_numeric($dados['editora'])){
            return 'Editora invalida!!';
        }

        if(!is_numeric($dados['categoria'])){
            return 'Categoria invalida!!';
        }

        if(strlen($dados['titulo']) > 200 ){
            return 'Insira um titulo com até 200 caracteres!!';
        }

        if(strlen($dados['titulo']) > 1000 ){
            return 'Insira uma descrição com até 1000 caracteres!!';
        }

        if(!$this->validarIsbn($dados['isbn'])){
            return 'Isbn invalido!!';
        }

        return null;
    }   

    private function validarAnoPublicacao($ano){
        $ano = trim($ano);
        $anoAtual = date('Y');

        return ctype_digit($ano) && $ano >= 1000 && $ano <= $anoAtual;
    }

    private function validarIsbn($isbn){
        if(empty($isbn)){
            return true;
        }

        $isbn = str_replace(['-', ' '], '', $isbn);

        if(strlen($isbn) === 10){
            if(!preg_match('/^\d{9}[\dXx]$/', $isbn)) return false;

            $soma = 0;

            for($i =0; $i < 9; $i++){
                $soma += (int)$isbn[$i] * (10 -$i);
            }

            $digitoVerificador = strtoupper($isbn[9]);
            $soma += ($digitoVerificador === 'X') ? 10 : (int)$digitoVerificador;

            return $soma % 11 === 0;

        }

        if(strlen($isbn) === 13 && preg_match('/^\d{13}$/', $isbn)){
            $soma = 0;

            for($i = 0; $i < 12; $i++){
                $soma += (int)$isbn[$i] * ($i % 2 === 0 ? 1 : 3);
            }

            $digitoVerificador = (10 - ($soma % 10)) % 10;

            return $digitoVerificador === (int)$isbn[12];
        }

    }

    public function incluir($dados) {
        try{
            $sql = $this->conexao->prepare("INSERT INTO livro (
                                            titulo,
                                            descricao,
                                            id_autor,
                                            id_editora,
                                            id_categoria,
                                            ISBN,
                                            status,
                                            ano_publicacao,
                                            imagem    
                                            )
                                            VALUES
                                            (
                                            :titulo,
                                            :descricao,
                                            :id_autor,
                                            :id_editora,
                                            :id_categoria,
                                            :ISBN,
                                            :status,
                                            :ano_publicacao,
                                            :imagem    
                                            )
                                                ");
            $sql->bindValue(":titulo", $dados['titulo']);
            $sql->bindValue(":descricao", $dados['descricao']);
            $sql->bindValue(":id_autor", $dados['autor']);
            $sql->bindValue(":id_editora", $dados['editora']);
            $sql->bindValue(":id_categoria", $dados['categoria']);
            $sql->bindValue(":ISBN", $dados['isbn']);
            $sql->bindValue(":status", $dados['status']);
            $sql->bindValue(":ano_publicacao", $dados['ano_publicacao']);
            $sql->bindValue(":imagem", $dados['imagem']);
            $sql->execute();

            return $this->conexao->lastInsertId();
        }catch (PDOException $e) {
            return null;
        }catch (Exception $e) {
            return null; 
        }
    }

    public function alterar($dados, $id_livro) {
        try{
            $sql = $this->conexao->prepare("UPDATE  livro SET
                                            titulo = :titulo,
                                            descricao = :descricao,
                                            id_autor = :id_autor,
                                            id_editora = :id_editora,
                                            id_categoria = :id_categoria,
                                            ISBN = :ISBN,
                                            status = :status,
                                            ano_publicacao = :ano_publicacao,
                                            imagem = :imagem 
                                            WHERE id_livro = :id_livro");
            $sql->bindValue(":titulo", $dados['titulo']);
            $sql->bindValue(":descricao", $dados['descricao']);
            $sql->bindValue(":id_autor", $dados['autor']);
            $sql->bindValue(":id_editora", $dados['editora']);
            $sql->bindValue(":id_categoria", $dados['categoria']);
            $sql->bindValue(":ISBN", $dados['isbn']);
            $sql->bindValue(":status", $dados['status']);
            $sql->bindValue(":ano_publicacao", $dados['ano_publicacao']);
            $sql->bindValue(":imagem", $dados['imagem']);
            $sql->bindValue(":id_livro", $dados['id_livro']);
            $sql->execute();

            return true;
        }catch (PDOException $e) {
            return false;
        }catch (Exception $e) {
            return false; 
        }
    }
}