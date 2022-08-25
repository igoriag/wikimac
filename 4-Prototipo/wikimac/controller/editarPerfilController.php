<?php
session_start();
require_once '../DTO/usuarioDTO.php';
require_once '../DAO/usuarioDAO.php';

// recuperar os dados do formulário
$id_usuario = $_POST["id_usuario"];
$login = $_POST["login"];
$senha = md5($_POST["senha"]);
$confirmar_senha = md5($_POST["confirmar_senha"]);

if($senha == $confirmar_senha)
    
    {

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setId_usuario($id_usuario);
$usuarioDTO->setLogin($login);
$usuarioDTO->setSenha($senha);


$usuarioDAO = new UsuarioDAO();
//print_r($usuarioDTO);
//exit();
$usuarioDAO->alterar_senha($usuarioDTO);

//var_dump($_SESSION["perfil"]);

?>
<script>
    window.location='../view/wikimac.php';
</script>
<?php
}
    
    else 
    {
        
        ?>
<h3 align="center">As senhas devem ser identicas!</h3>
<center>
     <a align="center" href=javascript:history.back(2)>Voltar</... 
</center>
   
        <?php
    }
    