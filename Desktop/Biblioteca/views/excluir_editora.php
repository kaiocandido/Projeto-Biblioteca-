<?php

require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Editora.php';
$editora = new Editora();

if(isset($_GET['id'])){
    if(!is_numeric($_GET['id'])){
        redirecionar();
    }

    $id = htmlspecialchars($_GET['id']);

    $editora->excluir($id);
    redirecionar();

}else{
    redirecionar();
}


function redirecionar(){
    header("Localtion: lista_editoras.php");
    exit;
}