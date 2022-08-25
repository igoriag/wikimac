<?php
require_once '../DAO/acervoDAO.php';

$idacervo = $_GET["id"];
//echo $idacervo;
//exit();
$acervoDAO = new AcervoDAO();
$acervoDAO->devolverLivroByid($idacervo);
?>
<script>
    window.location='../view/listarAllEmprestimo.php';
</script>
