<?php
session_start();
require_once '../DAO/loginDAO.php';

$login = $_POST["login"];
$senha = md5($_POST["senha"]);

$loginDAO = new LoginDAO();
$login = $loginDAO->validarLogin($login, $senha);

if (!empty($login)){
    $_SESSION["idusuario"] = $login["idvalidar_usuario"];
    $_SESSION["login"] = $login["login"];
    $_SESSION["perfil"] = $login["nome"];
    echo "<script>";
    echo "window.location='../view/wikimac.php'";
    echo "</script>";
}else{
    echo "<script>";
    echo "window.location='../index.php'";
    echo "</script>";    
}
