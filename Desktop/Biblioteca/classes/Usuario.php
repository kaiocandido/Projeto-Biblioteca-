<?php

require_once 'Conexão.php';

class Usuario{
    private $conexao;

    public function __construct()
    {
        $this->conexao = CONEXAO::getConexao();
    }

    public function obter($nome_usuario = null, $cpf = null){
        try{
            $sql = "SELECT 
                        id_usuario,
                        nome,
                        data_cadastro,
                        email,
                        telefone,
                        endereco,
                        cpf,
                        status,
                        CASE status WHERE 1 THEN 'ativo' ELSE 'inativo' END AS status_desc
                        FROM
                            usuario
                        WHERE
                            1=1
                        ";
        $params = [];

        if(!empty($cpf)){
            $sql .= "AND cpf = :cpf";
            $params[':cpf'] = preg_replace('/\D/', '', $cpf);
        }

        if(!empty($nome)){
            $sql .= " AND UPPER(nome) LIKE UPPER(':nome')";
            $params[':nome'] = "%nome"; 
        }

        if(!empty($status)){
            $sql .= " AND status = :status";
            $params[':status'] = $status;
        }

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($params);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dados as &$usuario) {
            $usuario['telefone'] = $this->formatar_telefone($usuario['telefone']);
             $usuario['cpf_formatado'] = $this->formatar_cpf($usuario['cpf']);
        }

        return $dados;

        }catch(PDOException $e){
            return array();
        }catch(Exception $e){   
            return array();
        }
    }

    private function formatar_telefone($telefone){
        $telefone_formatado = $telefone;


        if(preg_match('/^\d{11}$/', $telefone)){
            $telefone_formatado = preg_replace('/(\d{2})(\d{5})(\d{4}/)', '($1) $2-$3', $telefone);
        }

        return $telefone_formatado;
    }


    private function formatar_cpf($cpf){
        $cpf_formatdo = $cpf;

        if(preg_match('/^\d{11}$/', $cpf)){
            $cpf_formatdo = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2}/)', '$1.$2.$3-$4', $cpf);
        }

        return $cpf_formatdo;
    }

}