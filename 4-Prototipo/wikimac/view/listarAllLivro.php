<?php
require_once '../DAO/acervoDAO.php';
include '../js/funcao.php';
?>
<?php include 'validarLogin.php'; ?>

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
            decisao = confirm("Deseja realmente excluir Livro?");
            if (decisao) {
                alert("Livro excluido com sucesso!");

            } else {
                alert("teste");

                exit();

            }
        }
    </script>
    <body>

        <?php
        $perfil = $_SESSION["perfil"];

        if ($perfil == "Administrador") {
            include 'menuAdministrador.php';
        } elseif ($perfil == "Usuario") {
            include 'menuUsuario.php';
        } elseif ($perfil == "Bibliotecario") {
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
        <div>
            <table align="center">
                <form action="" method="post">
                    <tr>
                        <td > Nome: <input type="text" name="pnome"/></td>
                        <td><input type="submit" value="Pesquisar"/></td>
                    </tr>
                </form>
            </table>
            <br>
                <div id="heade2">
                    <?php
                    $acervoDAO = new AcervoDAO();

                    if (!empty($_POST["pnome"])) {
                        $acervos = $acervoDAO->getLivroByNome($_POST["pnome"]);
                    } else {

                        $acervos = $acervoDAO->listarAllLivros();
                    }
                    echo "<table border='0' align='center'>";
                    echo "<tr style='background-color: #A2C9EA' align='center'>";
                    echo "  <td><b>Título</b></td>";
                    echo "  <td><b>Subtítulo</b></td>";
                    echo "  <td><b>1ª Autor</b></td>";
                    echo "  <td><b>2ª Autor</b></td>";

                    echo "  <td><b>Editora</b></td>";
                    echo "  <td><b>ISBN</b></td>";
                    echo "  <td><b>Nª Ediçao</b></td>";
                    echo "  <td><b>Categoria</b></td>";
                    echo "  <td><b>Linguagem</b></td>";
                    echo "  <td><b>Status</b></td>";
                    echo "  <td  colspan='3'><b>Serviços</b></td>";
                    echo "</tr>";
                    echo "<tr style='background-color:black'>";
                        echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";echo "<td>";echo "</td>";
                        echo "</tr>";



                    foreach ($acervos as $acervo) {
                        echo "<tr style='background-color:#eaf1f7' align='center'>";
                        echo "  <td>", $acervo["titulo"], "</td>";
                        echo "  <td>{$acervo["subtitulo"]}</td>";
                        echo "  <td>{$acervo["autor"]}</td>";
                        echo "  <td>{$acervo["segundo_autor"]}</td>";
                        echo "  <td>{$acervo["editora"]}</td>";
                        echo "  <td>{$acervo["isbn"]}</td>";
                        echo "  <td>{$acervo["edicao"]}</td>";
                        echo "  <td>{$acervo["categoria"]}</td>";
                        echo "  <td>{$acervo["linguagem"]}</td>";
                        if ($acervo["status"] == 'Disponivel') {

                            echo "  <td style='background-color: #99ff99'>{$acervo["status"]}</td>";
                        } elseif ($acervo["status"] == 'Ocupado') {
                            echo "  <td style='background-color: #ff9999'>{$acervo["status"]}</td>";
                        }

                        echo "  <td><a  onclick='alerta()' href='../controller/excluirLivroController.php?id={$acervo["idAcervo"]}'>Excluir</a></td>";
                        echo "  <td><a href='../view/formAlterarLivro.php?id={$acervo["idAcervo"]}'>Alterar</a></td>";
                        if ($_SESSION["perfil"] == 'Usuario') {
                        echo "  <td><a href='../view/formLocarLivro.php?id={$acervo["idAcervo"]}'>Locar</a></td>";
                        }
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
                <div id="footer">
                    <p id="legal">&copy;2014 Wikimac. Todos os direitos reservados. | <a href="www.weebsystem.com.br">Weebsystem</a></p>

                </div>

                <div id="logo2">
                    <a href="wikimac.php"><img src="../images/logo.png" alt="" width="90" height="90" /></a>
                </div>
                </body>
                </html>
