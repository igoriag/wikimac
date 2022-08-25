<?php

require_once 'conexao/conexao.php';

/**
 * Classe DAO de persistência com o Banco de Dados
 * @author Professor Sávio
 * @version 1.0
 */
class LoginDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function 
            validarLogin($login, $senha) {
        try {
            $sql = "SELECT vu.login,vu.idvalidar_usuario, p.nome
                
                FROM validar_usuario vu 
                INNER JOIN perfil p ON vu.perfil_idperfil = p.idperfil
                    WHERE vu.login = ? AND vu.senha = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $login);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
