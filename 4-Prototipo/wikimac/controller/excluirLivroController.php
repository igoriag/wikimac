<?php
require_once '../DAO/acervoDAO.php';

$idacervo = $_GET["id"];

$acervoDAO = new AcervoDAO();
$acervoDAO->excluirLivroByid($idacervo);
?>
<script>
    window.location='../view/listarAllLivro.php';
</script>
