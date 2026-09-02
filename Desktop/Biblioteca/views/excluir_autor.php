<?php

require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Autores.php';
$autor = new Autor();

if(isset($_GET['id'])){
    if(!is_numeric($_GET['id'])){
        redirecionar();
    }

    $id = htmlspecialchars($_GET['id']);

    $autor->excluir($id);
    redirecionar();

}else{
    redirecionar();
}


function redirecionar(){
    header("Localtion: lista_autor.php");
    exit;
}