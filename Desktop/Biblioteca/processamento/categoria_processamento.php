<?php

require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Categorias.php';
$categoria = new Categoria();

if(isset($_GET['id']) && !is_numeric($_GET['id'])){
    redirecionar();
}

if(isset($_GET['id'])){
    $id_categoria = htmlspecialchars($_GET['id']);

    $dadosCategoria = $categoria->obterId($id_categoria);

    if(empty($dadosCategoria)){
        redirecionar();
    }

    extract($dadosCategoria);
}

if(isset($_POST['nome_categoria'])){
    $nome_categoria = htmlspecialchars($_POST['nome_categoria']);

    if(!empty($id_categoria)){
        if($categoria->alterar($id_categoria, $nome_categoria)){
            redirecionar();
        }else {
            $msgErro = "Falha na alteração de categorias.";
        }
    }else {
        if($categoria->incluir($nome_categoria)){
            redirecionar();
        }else {
            $msgErro = "Falha no cadastro de categoria.";
        }
    }
}


function redirecionar(){
    header("Localtion: lista_categorias.php");
    exit;
}