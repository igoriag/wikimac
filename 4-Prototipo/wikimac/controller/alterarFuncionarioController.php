<?php
require_once '../DTO/usuarioDTO.php';
require_once '../DAO/usuarioDAO.php';
include '../js/funcao.php';
// recuperar os dados do formulário

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$cep = $_POST["cep"];
$email = $_POST["email"];
$data_nascimento = ($_POST["data_nascimento"]);
$cidade = ($_POST["cidade"]);
$idusuario = $_POST["idusuario"];

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setNome($nome);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setRg($rg);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setEndereco($endereco);
$usuarioDTO->setCep($cep);
$usuarioDTO->setEmail($email);
$usuarioDTO->setData_nascimento($data_nascimento);
$usuarioDTO->setCidade($cidade);
$usuarioDTO->setIdusuario($idusuario);


$usuarioDAO = new UsuarioDAO();
$usuarioDAO->alterar($usuarioDTO);
//var_dump($usuarioDTO);

?>
<script>
    window.location='../view/listarAllFuncionario.php';
</script>