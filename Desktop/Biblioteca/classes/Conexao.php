<?php

class Conexao {
    private static $instacia;

    private function __construct()
    {
    }


    public static function getConexao(){
        try {
            if(!isset(self::$instacia)){
                $dbname = 'biblioteca';
                $host   = 'localhost';
                $user   = 'root';
                $password  = '';
                
                try {
                    self::$instacia = new PDO('mysql:dbname=' .$dbname. 'host='. $host, $user, $password);
                    self::$instacia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    return null;
                }
            }
        } catch (Exception $e) {
            return null;
        }
    }
}

