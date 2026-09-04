<?php

require_once "./Desktop/Biblioteca/classes/Livros.php";
$livro = new livro();

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $id_lvr = htmlspecialchars($_GET['id']);

    $livro->excluir($id_lvr);

    header('Location: lista_livro.php');

}else {
    header('Location: ../index.php');
}