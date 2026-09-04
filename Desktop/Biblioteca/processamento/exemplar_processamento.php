<?php

    require_once './Desktop/Biblioteca/classes/Exemplar.php';
    require_once './Desktop/Biblioteca/classes/Livros.php';


    $livro = new Livro();
    $exemplar = new Exemplar();

    if(isset($_GET['id_livro']) && is_numeric($_GET['id_livro'])){
        $id_livro = htmlspecialchars($_GET['id_livro']);

        $dados_livro = $livro->obterId($id_livro);

        if(empty($dados_livro)){
            header('Location: ../index.php');
        }
        
    }else {
      header('Location: ../index.php');
    }

    if(isset($_POST['codigo_exemplar'])){
      $codigo_exemplar = $_POST['codigo_exemplar'];

      $exemplar->incluir($codigo_exemplar, $id_livro);

      header('Location: ficha_livro.php?id='. $id_livro);
    }