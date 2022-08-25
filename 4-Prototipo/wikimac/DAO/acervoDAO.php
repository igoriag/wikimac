<?php

require_once 'conexao/conexao.php';

class AcervoDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(AcervoDTO $acervoDTO) {
        try {
            $sql1 = "INSERT INTO autor (autor,segundo_autor)
                 VALUES (?,?)";
            $stmt1 = $this->pdo->prepare($sql1);
            $stmt1->bindValue(1, $acervoDTO->getAutor1());
            $stmt1->bindValue(2, $acervoDTO->getAutor2());

            $stmt1->execute();
            $idautor = $this->pdo->lastInsertId();

            $sql = "INSERT INTO acervo (titulo,subtitulo,editora,isbn,edicao,categoria,linguagem,quantidade,status,autor_idautor)
                    VALUES (?,?,?,?,?,?,?,?,?,?)";

            $stmt2 = $this->pdo->prepare($sql);
            $stmt2->bindValue(1, $acervoDTO->getTitulo());
            $stmt2->bindValue(2, $acervoDTO->getSubtitulo());
            $stmt2->bindValue(3, $acervoDTO->getEditora());
            $stmt2->bindValue(4, $acervoDTO->getIsbn());
            $stmt2->bindValue(5, $acervoDTO->getN_edicao());
            $stmt2->bindValue(6, $acervoDTO->getCategoria());
            $stmt2->bindValue(7, $acervoDTO->getLinguagem_livro());
            $stmt2->bindValue(8, $acervoDTO->getQuantidade());
            $stmt2->bindValue(9, $acervoDTO->getStatus());
            $stmt2->bindValue(10, $idautor);
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAllLivros() {
        try {
//            SELECT column_name(s)
//FROM table1
//INNER JOIN table2
//ON table1.column_name=table2.column_name;
//            
            $sql = "SELECT `idAcervo`, `titulo`, `subtitulo`, `editora`, `isbn`, `edicao`, `categoria`, `linguagem`, `quantidade`, `status`, `autor_idautor`, `autor`,`segundo_autor` "
                    . "FROM `acervo` "
                    . "INNER JOIN autor ON acervo .autor_idautor = autor.idautor ORDER BY titulo ASC ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $acervos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $acervos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getLivroByNome($nome) {
        try {
            
            $sql = "SELECT a.idAcervo, a.titulo, a.subtitulo, a.editora, a.isbn, a.edicao, a.categoria, a.linguagem, a.quantidade, a.status, a.autor_idautor, au.autor, au.segundo_autor
            FROM acervo a INNER JOIN autor au ON a.autor_idautor = au.idautor
            WHERE a.titulo LIKE '%$nome%' or a.subtitulo LIKE '%$nome%' or au.autor LIKE '%$nome%' or au.segundo_autor LIKE '%$nome%' or a.categoria LIKE '%$nome%' or a.isbn LIKE '%$nome%' or a.editora LIKE '%$nome%' ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $acervo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //print_r($acervo);
            //exit();
            return $acervo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluirLivroByid($idacervo) {
        try {
            $sql = "DELETE FROM acervo WHERE idacervo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idacervo);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function devolverLivroByid($idacervo) {
        try {
            $sql2 = "update acervo set status='Disponivel' 
                where idAcervo=?";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $idacervo);
            
            
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getAcervoById($idacervo) {
        try {
            $sql = "SELECT `idAcervo`, `titulo`, `subtitulo`, `editora`, `isbn`, `edicao`, `categoria`, `linguagem`, `quantidade`, `status`, `autor_idautor`, `autor`,`segundo_autor` "
                    . "FROM `acervo` "
                    . "INNER JOIN autor ON acervo .autor_idautor = autor.idautor"
                    . " WHERE idAcervo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idacervo);
            $stmt->execute();
            $acervo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $acervo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getacervoByNome($nome) {
        try {
            $sql = "SELECT `idAcervo`, `titulo`, `subtitulo`, `editora`, `isbn`, `edicao`, `categoria`, `linguagem`, `quantidade`, `status`, `autor_idautor`, `autor`,`segundo_autor` "
                    . "FROM `acervo` "
                    . "INNER JOIN autor ON acervo .autor_idautor = autor.idautor ORDER BY titulo ASC ";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $acervo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $acervo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterar(AcervoDTO $acervoDTO) {
        try {

            $sql1 = "UPDATE acervo SET 
                                        titulo = ?, 
                                        subtitulo = ?, 
                                        editora = ?, 
                                        isbn = ?, 
                                        edicao = ?, 
                                        categoria = ?, 
                                        linguagem = ?, 
                                        quantidade = ?, 
                                        autor_idautor = ?
                WHERE idacervo = ?";
            $stmt1 = $this->pdo->prepare($sql1);
            $stmt1->bindValue(1, $acervoDTO->getTitulo());
            $stmt1->bindValue(2, $acervoDTO->getSubtitulo());
            $stmt1->bindValue(3, $acervoDTO->getEditora());
            $stmt1->bindValue(4, $acervoDTO->getIsbn());
            $stmt1->bindValue(5, $acervoDTO->getN_edicao());
            $stmt1->bindValue(6, $acervoDTO->getCategoria());
            $stmt1->bindValue(7, $acervoDTO->getLinguagem_livro());
            $stmt1->bindValue(8, $acervoDTO->getQuantidade());
            $stmt1->bindValue(9, $acervoDTO->getAutor_idautor());
            $stmt1->bindValue(10, $acervoDTO->getIdacervo());

            $stmt1->execute();

            $sql = "UPDATE autor SET 
                                        autor = ?, 
                                        segundo_autor = ?
                WHERE idautor = ?";
            $stmt2 = $this->pdo->prepare($sql);
            $stmt2->bindValue(1, $acervoDTO->getAutor1());
            $stmt2->bindValue(2, $acervoDTO->getAutor2());
            $stmt2->bindValue(3, $acervoDTO->getAutor_idautor());
            $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
