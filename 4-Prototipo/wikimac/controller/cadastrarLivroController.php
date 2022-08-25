<?php
require_once '../DTO/acervoDTO.php';
require_once '../DAO/acervoDAO.php';

// recuperar os dados do formulario
$autor1 = $_POST["autor1"];
$autor2 = $_POST["autor2"];
$titulo = $_POST["titulo"];
$subtitulo = $_POST["subtitulo"];
$editora = $_POST["editora"];
$isbn = $_POST["isbn"];
$n_edicao = $_POST["n_edicao"];
$categoria = $_POST["categoria"];
$linguagem = $_POST["linguagem_livro"];
$quantidade = $_POST["quantidade"];
$status = $_POST["status"];



$acervoDTO = new AcervoDTO();
$acervoDTO->setAutor1($autor1);
$acervoDTO->setAutor2($autor2);
$acervoDTO->setTitulo($titulo);
$acervoDTO->setSubtitulo($subtitulo);
$acervoDTO->setEditora($editora);
$acervoDTO->setIsbn($isbn);
$acervoDTO->setN_edicao($n_edicao);
$acervoDTO->setCategoria($categoria);
$acervoDTO->setLinguagem_livro($linguagem);
$acervoDTO->setQuantidade($quantidade);
$acervoDTO->setStatus($status);


$acervoDAO = new AcervoDAO();
$ok = $acervoDAO->salvar($acervoDTO);
if ($ok){
    $msg = "Cadastrado com sucesso";
    echo "<script>";
    echo "window.location='../view/formcadastro_livro.php?msg={$msg}';";
    echo "</script>";
} 
 
