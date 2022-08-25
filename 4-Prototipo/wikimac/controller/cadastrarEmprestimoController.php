<?php
require_once '../DTO/emprestimoDTO.php';
require_once '../DAO/emprestimoDAO.php';
// recuperar os dados do formulario


//$autor1 = $_POST["autor1"];
//$autor2 = $_POST["autor2"];
//$titulo = $_POST["titulo"];
//$subtitulo = $_POST["subtitulo"];
//$editora = ($_POST["editora"]);
//$n_edicao = $_POST["n_edicao"];

$acervo_idacervo = $_POST["idacervo"];
$cpf = $_POST["cpf"];
$data_inicio = ($_POST["data_inicio"]);
$data_termino = $_POST["data_termino"];

$emprestimoDTO = new EmprestimoDTO();
$emprestimoDTO->setIdacervo($acervo_idacervo);
$emprestimoDTO->setData_inicio($data_inicio);
$emprestimoDTO->setData_termino($data_termino);
$emprestimoDTO->setCpf_usuario($cpf);



$emprestimoDAO = new EmprestimoDAO();
$ok = $emprestimoDAO->salvar($emprestimoDTO);
if ($ok){
    $msg = "Cadastrado com sucesso";
    echo "<script>";
    echo "window.location='../view/formcadastro_usuario.php?msg={$msg}';";
    echo "</script>";
} 
 ?>
    
<center>
     <a align="center" href=javascript:history.back(2)>Voltar</... 
</center>
   
       
    