<?php
require_once '../DAO/usuarioDAO.php';

$idusuario = $_GET["id"];
echo $idusuario;
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->excluirUsuarioByid($idusuario);
?>
<script>
    window.location='../view/listarAllUsuario.php';
</script>
