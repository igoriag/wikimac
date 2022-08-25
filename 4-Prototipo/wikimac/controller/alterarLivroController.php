<?php
require_once '../DTO/acervoDTO.php';
require_once '../DAO/acervoDAO.php';
include '../js/funcao.php';
// recuperar os dados do formulário

$autor = $_POST["autor1"];
$segundo_autor = $_POST["autor2"];
$titulo = $_POST["titulo"];
$subtitulo = $_POST["subtitulo"];
$editora = $_POST["editora"];
$isbn = $_POST["isbn"];
$n_edicao = $_POST["n_edicao"];
$categoria = $_POST["categoria"];
$linguagem = $_POST["linguagem_livro"];
$quantidade = $_POST["quantidade"];
$idacervo = $_POST["idacervo"];
$autor_idautor = $_POST["autor_idautor"];

$acervoDTO = new AcervoDTO();
$acervoDTO->setAutor1($autor);
$acervoDTO->setAutor2($segundo_autor);
$acervoDTO->setTitulo($titulo);
$acervoDTO->setSubtitulo($subtitulo);
$acervoDTO->setEditora($editora);
$acervoDTO->setIsbn($isbn);
$acervoDTO->setN_edicao($n_edicao);
$acervoDTO->setCategoria($categoria);
$acervoDTO->setLinguagem_livro($linguagem);
$acervoDTO->setQuantidade($quantidade);
$acervoDTO->setIdacervo($idacervo);
$acervoDTO->setAutor_idautor($autor_idautor);


$acervoDAO = new AcervoDAO();
$acervoDAO->alterar($acervoDTO);
//var_dump($acervoDTO);
//exit();
?>
<script>
    window.location='../view/listarAllLivro.php';
</script>