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
$imagem = new Imagem();

$autores = $autor->obter();
$categorias = $categoria->obter();
$editoras = $editora->obter();

$tem_imagem_salva = false;
$caminho_da_imagem = '#';


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


?>
