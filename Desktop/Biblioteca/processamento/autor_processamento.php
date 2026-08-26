<?php

require_once '../classes/Autores.php';
$autor = new Autor();

if(isset($_GET['id']) && !is_numeric($_GET['id'])){
    redirecionar();
}

if(isset($_GET['id'])){
    $id_autor = htmlspecialchars($_GET['id']);

    $dadosAutor = $autor->obterId($id_autor);

    if(empty($dadosAutor)){
        redirecionar();
    }

    extract($dadosAutor);
}

if(isset($_POST['nome_autor'])){
    $nome_autor = htmlspecialchars($_POST['nome_autor']);

    if(!empty($id_autor)){
        if($autor->alterar($id_autor, $nome_autor)){
            redirecionar();
        }else {
            $msgErro = "Falha na alteração de autor.";
        }
    }else {
        if($autor->incluir($nome_autor)){
            redirecionar();
        }else {
            $msgErro = "Falha no cadastro de autor.";
        }
    }
}


function redirecionar(){
    header("Localtion: lista_autores.php");
    exit;
}