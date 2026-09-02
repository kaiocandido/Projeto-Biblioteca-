<?php

require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Categorias.php';
$categoria = new Categoria();

if(isset($_GET['id'])){
    if(!is_numeric($_GET['id'])){
        redirecionar();
    }

    $id = htmlspecialchars($_GET['id']);

    $categoria->excluir($id);
    redirecionar();

}else{
    redirecionar();
}


function redirecionar(){
    header("Localtion: lista_categorias.php");
    exit;
}