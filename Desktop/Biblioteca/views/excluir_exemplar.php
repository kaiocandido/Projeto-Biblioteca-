<?php

require_once "./Desktop/Biblioteca/classes/Exemplar.php";
$exemplar = new Exemplar();

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $id_exemplar = htmlspecialchars($_GET['id']);

    $id_livro = $exemplar->obterLivroPorIdExemplar($id_exemplar);

    if(empty($id_livro)){
        header('Location: ../index.php');
    }

    $exemplar->excluir($id_exemplar);

    header('Location: ficha_livro.php?id=' . $id_livro);

}else {
    header('Location: ../index.php');
}