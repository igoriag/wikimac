<?php
require_once '../DTO/emprestimoDTO.php';
require_once '../DAO/emprestimoDAO.php';

// recuperar os dados do formulario
$autor1 = $_POST["autor1"];
$autor2 = $_POST["autor2"];
$titulo = $_POST["titulo"];
$subtitulo = $_POST["subtitulo"];
$editora = $_POST["editora"];
$isbn = $_POST["isbn"];

$data_inicio = $_POST["data_inicio"];
$data_termino = $_POST["data_termino"];
$idacervo = $_POST["idacervo"];
$idusuario = $_POST["idusuario"];

$emprestimoDTO = new EmprestimoDTO();
$emprestimoDTO->setAutor1($autor1);
$emprestimoDTO->setAutor2($autor2);
$emprestimoDTO->setTitulo($titulo);
$emprestimoDTO->setSubtitulo($subtitulo);
$emprestimoDTO->setEditora($editora);
$emprestimoDTO->setIsbn($isbn);

$emprestimoDTO->setData_inicio($data_inicio);
$emprestimoDTO->setData_termino($data_termino);
$emprestimoDTO->setIdacervo($idacervo);
$emprestimoDTO->setIdusuario($idusuario);

//print_r($emprestimoDTO);
//exit();

$emprestimoDAO = new EmprestimoDAO();
$ok = $emprestimoDAO->salvar($emprestimoDTO);
if ($ok){
    $msg = "Cadastrado com sucesso";
    echo "<script>";
    echo "window.location='../view/wikimac.php?msg={$msg}';";
    echo "</script>";
} 
 
