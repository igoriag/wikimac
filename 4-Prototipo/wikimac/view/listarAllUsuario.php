<?php
require_once '../DAO/usuarioDAO.php';
include '../js/funcao.php';
?>
<?php include 'validarLogin.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>wikimac</title><link rel="shortcut icon" type="../image/x-icon" href="../favicon.ico">
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <link href="../css/wikimac.css" rel="stylesheet" type="text/css" />
    </head>
    <script type="text/javascript">
        function alerta()
        {
            decisao = confirm("Deseja realmente excluir Usuário?");
if (decisao){
        alert ("Usuário excluido com sucesso!");
	
} else {
        alert ("teste");
	
	exit();
        
        }
    }
    </script>
    <body>

            <?php 
            $perfil = $_SESSION["perfil"];
            
            if ($perfil == "Administrador")
                {
                include 'menuAdministrador.php';
            }
            elseif ($perfil == "Usuario") {
                include 'menuUsuario.php';
            }
            elseif ($perfil == "Bibliotecario") {
                include 'menuBibliotecario.php';
            }
            
            
            ?>
            <div id="hora">
                <script language="JavaScript">
                    hoje = new Date()
                    dia = hoje.getDate()
                    dias = hoje.getDay()
                    mes = hoje.getMonth()
                    ano = hoje.getYear()
                    if (dia < 10)
                        dia = "0" + dia
                    if (ano < 2000)
                        ano = 1900 + ano
                    function NArray(n)
                    {
                        this.length = n
                    }
                    NomeDiaWMOnline = new NArray(7)
                    NomeDiaWMOnline[0] = "Domingo"
                    NomeDiaWMOnline[1] = "Segunda-feira"
                    NomeDiaWMOnline[2] = "Terça-feira"
                    NomeDiaWMOnline[3] = "Quarta-feira"
                    NomeDiaWMOnline[4] = "Quinta-feira"
                    NomeDiaWMOnline[5] = "Sexta-feira"
                    NomeDiaWMOnline[6] = "Sábado"
                    NomeMesWMOnline = new NArray(12)
                    NomeMesWMOnline[0] = "janeiro"
                    NomeMesWMOnline[1] = "fevereiro"
                    NomeMesWMOnline[2] = "março"
                    NomeMesWMOnline[3] = "abril"
                    NomeMesWMOnline[4] = "maio"
                    NomeMesWMOnline[5] = "junho"
                    NomeMesWMOnline[6] = "julho"
                    NomeMesWMOnline[7] = "agosto"
                    NomeMesWMOnline[8] = "setembro"
                    NomeMesWMOnline[9] = "outubro"
                    NomeMesWMOnline[10] = "novembro"
                    NomeMesWMOnline[11] = "dezembro"
                    document.write(NomeDiaWMOnline[dias] + ", " + dia + " de " + NomeMesWMOnline[mes] + " de " + ano)
                </script>

            </div>
            <div id="logo">
                </br></br></br>
                    <h1><a href="#">wikimac</a></h1>
                    <h2><a href="#">Biblioteca online</a></h2>
            </div>
        </div>
<div id="session">
            <td colspan="2" align="right">
                    
                <?php echo "Login:",$_SESSION["login"];
                echo '<br>';?> 
                    <?php echo "Perfil:",$_SESSION["perfil"];
                echo '<br>';?>
                    <a href="../controller/sairController.php">sair</a>
                </td>
            </div>
    <br></br><br></br>
        <table align="center">
            <form action="" method="post">
            <tr>
                <td>Nome:<input type="text" name="pnome"/></td>
                <td><input type="submit" value="Pesquisar"/></td>
            </tr>
            </form>
        </table>
        <br>
            <div id="heade2">
        <?php                       
        $usuarioDAO = new UsuarioDAO();
        
        if(!empty($_POST["pnome"])){
             $usuarios = $usuarioDAO->getUsuarioByNome($_POST["pnome"]);
        }else{
             $usuarios = $usuarioDAO->listarAllUsuario();
        }
       
        
        echo "<table border='0' align='center'>";
        echo "<tr  style='background-color: #A2C9EA' align='center'>";
        echo "  <td><b>Nome</b></td>";
        echo "  <td><b>CPF</b></td>";
        echo "  <td><b>RG</b></td>";
        echo "  <td><b>Telefone</b></td>";
        echo "  <td><b>Telefone2</b></td>";
        echo "  <td><b>Endereço</b></td>";
        echo "  <td><b>CEP</b></td>";
        echo "  <td><b>Email</b></td>";
        echo "  <td><b>Data Nascimento</b></td>";
        echo "  <td><b>Cidade</b></td>";
        echo "  <td><b>Perfil</b></td>";
        echo "  <td  colspan='2'><b>Serviços</b></td>";
       
        echo "</tr>";
        echo "<tr style='background-color:black'>";
                        echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";
                        echo "</tr>";
        
        foreach ($usuarios as $usuario) {
            echo "<tr style='background-color:#eaf1f7' align='center'>";
            echo "  <td>", $usuario["nome"], "</td>";
            echo "  <td>{$usuario["cpf"]}</td>";
            echo "  <td>{$usuario["rg"]}</td>";
            echo "  <td>{$usuario["telefone"]}</td>";
            echo "  <td>{$usuario["telefone2"]}</td>";
            echo "  <td>{$usuario["endereco"]}</td>";
            echo "  <td>{$usuario["cep"]}</td>";
            echo "  <td>{$usuario["email"]}</td>";
            echo "  <td>",dataUSAtoBR($usuario["data_nascimento"]),"</td>";
            echo "  <td>{$usuario["cidade"]}</td>";
            echo "  <td>{$usuario["pnome"]}</td>";
            echo "  <td><a onclick='alerta()' href='../controller/excluirUsuarioController.php?id={$usuario["idusuario"]}'>Excluir</a></td>";
            echo "  <td><a href='../view/formAlterarUsuario.php?id={$usuario["idusuario"]}'>Alterar</a></td>";
            echo "</tr>";
            echo "<tr style='background-color:black'>";
                        echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";
                        echo "</tr>";
        }
        
        echo "</table>";
        ?>
                    <br>
            </div>
            <center>
                <a href=javascript:history.back(2)>Voltar</... 
            </center>
</br>

        <div id="footer">
            <p id="legal">&copy;2014 Wikimac. Todos os direitos reservados. | <a href="www.weebsystem.com.br">Weebsystem</a></p>

        </div>

        <div id="logo2">
            <a href="wikimac.php"><img src="../images/logo.png" alt="" width="90" height="90" /></a>
        </div>
    </body>
</html>
