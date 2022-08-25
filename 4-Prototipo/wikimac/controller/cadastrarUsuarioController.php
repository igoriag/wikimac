<?php
require_once '../DTO/usuarioDTO.php';
require_once '../DAO/usuarioDAO.php';
include '../js/funcao.php';
// recuperar os dados do formulario
$perfil = $_POST["perfil"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$telefone = $_POST["telefone"];
$telefone2 = $_POST["telefone2"];
$data_nascimento = ($_POST["data_nascimento"]);
$endereco = $_POST["endereco"];
$cep = $_POST["cep"];
$cidade = ($_POST["cidade"]);
$email = $_POST["email"];
$login = $_POST["login"];
$senha = md5($_POST["senha"]);
$confirmar_senha = md5($_POST["confirmar_senha"]);

//echo $cidade;
//echo '<br>';
//echo $login;
//echo '<br>';
//echo $senha;
//echo '<br>';
//echo $confirmar_senha;
//exit();
if($senha == $confirmar_senha)
    
    {

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setNome($nome);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setRg($rg);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setTelefone2($telefone2);
$usuarioDTO->setData_nascimento($data_nascimento);
$usuarioDTO->setEndereco($endereco);
$usuarioDTO->setCep($cep);
$usuarioDTO->setCidade($cidade);
$usuarioDTO->setEmail($email);
$usuarioDTO->setLogin($login);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setPerfil($perfil);

$usuarioDAO = new UsuarioDAO();
$ok = $usuarioDAO->salvar($usuarioDTO);
if ($ok){
    $msg = "Cadastrado com sucesso";
    echo "<script>";
    echo "window.location='../view/formcadastro_usuario.php?msg={$msg}';";
    echo "</script>";
} 
 
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
    