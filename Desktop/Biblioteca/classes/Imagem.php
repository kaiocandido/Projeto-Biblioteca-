<?php

require_once '../Projeto-Biblioteca-/Desktop/Biblioteca/classes/Livros.php';

class Imagem{
    const DIRETORIO_IMAGEM = './Desktop/Biblioteca/imagens';

    private $livro;

    public function __construct()
    {
        $this->livro = new Livro();
    }

    public function salvar_imagem($id_livro = null){
        $erro = '';
        $imagemRetorno = '';
        $imagemAntiga = '';

        $alteracao = !empty($id_livro);

        if($alteracao){
            $imagemAntiga = $this->livro->obterId($id_livro)['imagem'];
        }

        if(!empty($_FILES['imagem']['name'])){
            $retorno = $this->gravar_imagem_fisica();

            if(!empty($retorno['erro'])){
                $erro = $retorno['erro'];
                $imagemRetorno = '';
            }else {
                $imagemRetorno = $retorno['erro'];
            }

            if($alteracao && empty($erro)){
                $this->remover_imagem(htmlspecialchars($imagemAntiga), $id_livro);
            }

        }else if(isset($_POST['remover_imagem']) && $_POST['remover_imagem'] == '1'){
            $this->remover_imagem($imagemAntiga, $id_livro);
        }else {
            $imagemRetorno = $imagemAntiga;
        }

        $resposta = [
            "erro" => $erro,
            "imagem_retorno" => $imagemRetorno
        ];

        return $resposta;
    }

    public function remover_imagem($nome_imagem, $id_livro=null){
        if(!empty($id_livro)){
            $this->livro->remover_imagem_banco($id_livro);
        }

        $this->remover_imagem($nome_imagem);
    }
    

    public function gravar_imagem_fisica(){
        try {
            $retorno = [
                "erro" => '',
                "imagem" => ''
            ];


        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}