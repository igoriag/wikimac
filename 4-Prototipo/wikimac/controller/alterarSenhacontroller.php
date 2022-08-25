<?php
session_start();
require_once '../DAO/loginDAO.php';

$confirmar_senhasenha = md5($_POST["confirmar_senha"]);
$senha = md5($_POST["senha"]);
$login = $_SESSION["login"];

echo $confirmar_senhasenha;
echo $senha;
echo $login;
//
//$sql1 = "UPDATE validar_usuario SET 
//                                        senha = ?
//                                         
//                                        
//                WHERE login = $login";
//            $stmt1 = $this->pdo->prepare($sql1);
//            $stmt1->bindValue(1, $senha);
//            
//
//            $stmt1->execute();
//exit();
//$loginDAO = new LoginDAO();
//$login = $loginDAO->validarLogin($login, $senha);

//if (!empty($login)){
//    $_SESSION["login"] = $login["login"];
//    $_SESSION["perfil"] = $login["nome"];
//    echo "<script>";
//    echo "window.location='../view/wikimac.php'";
//    echo "</script>";
//}else{
//    echo "<script>";
//    echo "window.location='../index.php'";
//    echo "</script>";    
//}
