<?php


require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Autores.php';
require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Editora.php';
require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Categorias.php';
require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Livros.php';
require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Imagem.php';


$autor = new Autor();
$editora = new Editora();
$categoria  = new Categoria();
$livro = new Livro();
$imagemClass = new Imagem();

$autores = $autor->obter();
$categorias = $categoria->obter();
$editoras = $editora->obter();

$tem_imagem_salva = false;
$caminho_da_imagem = '#';
$id_livro = '';


if(isset($_GET['id'])){
    if(!is_numeric($_GET['id'])){
        header('Location: index.php');
    }

    $id_livro = htmlspecialchars($_GET['id']);

    $dados_livros = $livro->obterId($id_livro);

    if(empty($dados_livros)){
        header('Location: index.php');
    }

    extract($dados_livros);

    $tem_imagem_salva = !empty($imagem);
    $caminho_da_imagem = $tem_imagem_salva ? '../imagens/' . $imagem : '#';
}


if(isset($_POST['titulo'])){
    $titulo = htmlspecialchars($_POST['titulo']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $autor = htmlspecialchars($_POST['autor']);
    $ano_publicacao = htmlspecialchars($_POST['ano_publicacao']);
    $editora = htmlspecialchars($_POST['editora']);
    $categoria = htmlspecialchars($_POST['categoria']);
    $isnb = htmlspecialchars($_POST['isnb']);
    $status = htmlspecialchars($_POST['status']);
    $imagem = '';


    $dados = [
        'titulo' => $titulo,
        'descricao' => $descricao,
        'autor' => $autor,
        'ano_publicacao' => $ano_publicacao,
        'editora' => $editora,
        'categoria' => $categoria,
        'isnb' => $isnb,
        'status' => $status,
        'imagem' => $imagem

    ];

    $msg_erro = $livro->validar($dados);

    if(empty($msg_erro)){
        $retorno = $imagemClass->salvar_Imagem($id_livro);

        if(empty($retorno['erro'])){
            $dados['imagem'] = $retorno['imagem_retorno'];
        }else{
            $msg_erro = $retorno['erro'];
        }

        if(empty($msg_erro)){
            if(!empty($id_livro)){
                $id_livro = $dados['id_livro'];
                if($livro->alterar($dados, $id_livro)){
                    header('Location: ficha_livro.php?id='.$id_livro);
                }else{
                    $msg_erro = "Falha na alteração do livro";
                }
            }else{
                $id_livro = $livro->incluir($dados);

                if(!empty($id_livro)){
                    header('Location: ficha_livro.php?id='.$id_livro);
                }else {
                    $msg_erro = "Falha no cadastro de livro";
                }
            }
        }
    }

}

?>
