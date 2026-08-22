<?php

require_once '../classes/Editora.php';
$editora = new Editora();


if(isset($_POST['nome_editora'])){
    $nome_editora = htmlspecialchars($_POST['nome_editora']);

    if($editora->incluir($nome_editora)){
        header("Localtion: lista_editoras.php");
    }else {
        echo "Deu erro";
    }



}
