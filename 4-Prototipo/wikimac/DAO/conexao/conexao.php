<?php

abstract class Conexao {

    private static $instance;
    
    /**
     * Retorna uma conexao com o banco de dados
     * @return PDO 
     */
    public static function getInstance() {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO("mysql:host=localhost;dbname=wikimacdb_5", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        } catch (PDOException $exc) {
            echo "Erro ao conectar o Banco de Dados:", $exc->getMessage();
        }
    }

}
