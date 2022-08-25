<?php

require_once 'conexao/conexao.php';

class UsuarioDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(UsuarioDTO $usuarioDTO) {
        try {
            $sql1 = "INSERT INTO validar_usuario (login,senha,perfil_idperfil)
                 VALUES (?,?,?)";
            $stmt1 = $this->pdo->prepare($sql1);
            $stmt1->bindValue(1, $usuarioDTO->getLogin());
            $stmt1->bindValue(2, $usuarioDTO->getSenha());
            $stmt1->bindValue(3, $usuarioDTO->getPerfil());
            $stmt1->execute();
            $idvalidar_usuario = $this->pdo->lastInsertId();

            $sql = "INSERT INTO usuario (nome,cpf,rg,telefone,endereco,cep,email,data_nascimento,validar_usuario_idvalidar_usuario,cidade,telefone2)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            $stmt2 = $this->pdo->prepare($sql);
            $stmt2->bindValue(1, $usuarioDTO->getNome());
            $stmt2->bindValue(2, $usuarioDTO->getCpf());
            $stmt2->bindValue(3, $usuarioDTO->getRg());
            $stmt2->bindValue(4, $usuarioDTO->getTelefone());
            $stmt2->bindValue(5, $usuarioDTO->getEndereco());
            $stmt2->bindValue(6, $usuarioDTO->getCep());
            $stmt2->bindValue(7, $usuarioDTO->getEmail());
            $stmt2->bindValue(8, $usuarioDTO->getData_nascimento());
            $stmt2->bindValue(9, $idvalidar_usuario);
            $stmt2->bindValue(10, $usuarioDTO->getCidade());
            $stmt2->bindValue(11, $usuarioDTO->getTelefone2());

            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAllUsuario() {
        try {
//            SELECT column_name(s)
//FROM table1
//INNER JOIN table2
//ON table1.column_name=table2.column_name;
//            
            $sql = "SELECT u.idusuario, u.nome,u.telefone2,u.cpf, u.rg, u.telefone, u.cidade, u.endereco, u.cep, u.email, u.data_nascimento, v.login, p.nome AS pnome
                    FROM usuario u
                    INNER JOIN validar_usuario v ON u.validar_usuario_idvalidar_usuario = v.idvalidar_usuario
                    INNER JOIN perfil p ON v.perfil_idperfil = p.idperfil
                    WHERE v.perfil_idperfil =2
                    ORDER BY nome ASC ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarAllFuncionario() {
        try {
//            SELECT column_name(s)
//FROM table1
//INNER JOIN table2
//ON table1.column_name=table2.column_name;
//            
            $sql = "SELECT u.idusuario, u.nome, u.cpf, u.rg, u.telefone,u.telefone2,u.endereco, u.cep, u.email, u.data_nascimento, u.cidade, v.login, p.nome AS pnome
                    FROM usuario u
                    INNER JOIN validar_usuario v ON u.validar_usuario_idvalidar_usuario = v.idvalidar_usuario
                    INNER JOIN perfil p ON v.perfil_idperfil = p.idperfil
                    WHERE v.perfil_idperfil
                    IN ( 3, 4 ) 
                    ORDER BY nome ASC ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAllEstado() {
        try {
            $sql = "SELECT * FROM estado ORDER BY nome ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $estados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $estados;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAllCidade() {
        try {
            $sql = "SELECT * FROM cidade ORDER BY nome ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $cidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cidades;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAllPerfil() {
        try {
            $sql = "SELECT * FROM perfil ORDER BY nome ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $perfils = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $perfils;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluirUsuarioByid($idusuario) {
        try {
            $sql = "DELETE FROM usuario WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterar(UsuarioDTO $usuarioDTO) {
        try {

            $sql = "UPDATE usuario SET 
                                        nome = ?, 
                                        cpf = ?, 
                                        rg = ?, 
                                        telefone = ?, 
                                        endereco = ?, 
                                        cep = ?, 
                                        email = ?, 
                                        data_nascimento = ?, 
                                        cidade_idcidade = ?
                WHERE idusuario = ?"; 
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->bindValue(2, $usuarioDTO->getCpf());
            $stmt->bindValue(3, $usuarioDTO->getRg());
            $stmt->bindValue(4, $usuarioDTO->getTelefone());
            $stmt->bindValue(5, $usuarioDTO->getEndereco());
            $stmt->bindValue(6, $usuarioDTO->getCep());
            $stmt->bindValue(7, $usuarioDTO->getEmail());
            $stmt->bindValue(8, $usuarioDTO->getData_nascimento());
            $stmt->bindValue(9, $usuarioDTO->getCidade());
            $stmt->bindValue(10, $usuarioDTO->getIdusuario());

            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getUsuarioById($idusuario) {
        try {
            $sql = "SELECT * FROM usuario WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getUsuarioByNome($nome) {
        try {
            $sql = "SELECT u.idusuario, u.nome, u.cpf, u.rg, u.telefone,u.telefone2,u.endereco, u.cep, u.email, u.data_nascimento, u.cidade, v.login, p.nome AS pnome
                    FROM usuario u
                    INNER JOIN validar_usuario v ON u.validar_usuario_idvalidar_usuario = v.idvalidar_usuario
                    INNER JOIN perfil p ON v.perfil_idperfil = p.idperfil
                    WHERE u.nome LIKE '%{$nome}%' AND v.perfil_idperfil = 2
                    
                    ORDER BY nome ASC";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getFuncionarioByNome($nome) {
        try {
            $sql = "SELECT u.idusuario, u.nome, u.cpf, u.rg, u.telefone,u.telefone2,u.endereco, u.cep, u.email, u.data_nascimento, u.cidade, v.login, p.nome AS pnome
                    FROM usuario u
                    INNER JOIN validar_usuario v ON u.validar_usuario_idvalidar_usuario = v.idvalidar_usuario
                    INNER JOIN perfil p ON v.perfil_idperfil = p.idperfil
                    WHERE u.nome LIKE '%{$nome}%' AND v.perfil_idperfil
                    IN ( 3, 4 ) 
                    
                    ORDER BY nome ASC";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
