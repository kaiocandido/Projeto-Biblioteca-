<?php

require_once '../classes/Editora.php';
$editora = new Editora();

if(isset($_GET['id']) && !is_numeric($_GET['id'])){
    redirecionar();
}

if(isset($_GET['id'])){
    $id_editora = htmlspecialchars($_GET['id']);

    $dadosEditora = $editora->obterId($id_editora);

    if(empty($dadosEditora)){
        redirecionar();
    }

    extract($dadosEditora);
}

if(isset($_POST['nome_editora'])){
    $nome_editora = htmlspecialchars($_POST['nome_editora']);

    if(!empty($id_editora)){
        if($editora->alterar($id_editora, $nome_editora)){
            redirecionar();
        }else {
            $msgErro = "Falha no cadastro de editoras.";
        }
    }else {
        if($editora->incluir($nome_editora)){
            redirecionar();
        }else {
            $msgErro = "Falha na alteração de editora.";
        }
    }
}


function redirecionar(){
    header("Localtion: lista_editoras.php");
    exit;
}