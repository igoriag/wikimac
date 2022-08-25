<?php

require_once 'conexao/conexao.php';

class EmprestimoDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(EmprestimoDTO $emprestimoDTO) {
        try {

            $sql = "INSERT INTO emprestimo (data_inicio,
                                            data_termino,
                                            
                                            usuario_idusuario,
                                            acervo_idAcervo)
                    VALUES (?,?,?,?)";

            $stmt2 = $this->pdo->prepare($sql);
            $stmt2->bindValue(1, $emprestimoDTO->getData_inicio());
            $stmt2->bindValue(2, $emprestimoDTO->getData_termino());
            
            $stmt2->bindValue(3, $emprestimoDTO->getIdusuario());
            $stmt2->bindValue(4, $emprestimoDTO->getIdacervo());
            $stmt2->execute();
            
            $sql2 = "update acervo set status='Ocupado' 
                where idAcervo=?";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $emprestimoDTO->getIdacervo());
            
            
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    

    
    public function getId($idusuario) {
        try {
            $sql = "SELECT u.nome, u.idusuario
                   FROM validar_usuario v
                   INNER JOIN usuario u 
                   ON v.idvalidar_usuario = u.validar_usuario_idvalidar_usuario 
                   where v.login='$idusuario'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarAllEmprestimos() {
        try {
//            SELECT column_name(s)
//FROM table1
//INNER JOIN table2
//ON table1.column_name=table2.column_name;
//            
            $sql = "SELECT a.titulo,a.subtitulo,u.nome, a.status, e.data_inicio, e.data_termino,e.cpf_usuario,e.usuario_idusuario,e.acervo_idAcervo
                   FROM emprestimo e
                   INNER JOIN usuario u 
                   ON e.usuario_idusuario = u.idusuario
                   INNER JOIN acervo a
                   ON e.acervo_idAcervo = a.idAcervo";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $emprestimos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $emprestimos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarAllEmprestimos_u() {
        try {
     
            $sql = "SELECT vu.login,a.titulo,a.status,a.subtitulo,u.nome,e.idemprestimo, e.data_inicio, e.data_termino,e.usuario_idusuario,e.acervo_idAcervo
                   FROM emprestimo e
                   INNER JOIN usuario u 
                   ON e.usuario_idusuario = u.idusuario
                   INNER JOIN validar_usuario vu
                   ON u.validar_usuario_idvalidar_usuario = idvalidar_usuario
                   INNER JOIN acervo a
                   ON e.acervo_idAcervo = a.idAcervo";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $emprestimos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $emprestimos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getEmprestimoByNome($nome) {
        try {
//            SELECT column_name(s)
//FROM table1
//INNER JOIN table2
//ON table1.column_name=table2.column_name;
//            
            $sql = "SELECT a.titulo,a.subtitulo,a.status,u.nome,e.idemprestimo, e.data_inicio, e.data_termino,e.usuario_idusuario,e.acervo_idAcervo
                   FROM emprestimo e
                   INNER JOIN usuario u 
                   ON e.usuario_idusuario = u.idusuario
                   INNER JOIN acervo a
                   ON e.acervo_idAcervo = a.idAcervo
                   WHERE u.nome LIKE '%{$nome}%' or a.titulo LIKE '%{$nome}%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $emprestimos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $emprestimos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
