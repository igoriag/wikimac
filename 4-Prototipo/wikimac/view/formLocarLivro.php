<?php
require_once '../DAO/acervoDAO.php';
require_once '../DAO/emprestimoDAO.php';


?>
<?php include 'validarLogin.php';?>
<div id="session">
            <td colspan="2" align="right">
                    
                <?php echo "Login:",$_SESSION["login"];
                echo '<br>';?> 
                    <?php echo "Perfil:",$_SESSION["perfil"];
                echo '<br>';?>
                    <a href="../controller/sairController.php">sair</a>
                </td>
            </div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>wikimac</title><link rel="shortcut icon" type="../image/x-icon" href="../favicon.ico">
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <link href="../css/wikimac.css" rel="stylesheet" type="text/css" />
            <script language="JavaScript" src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="../js/jquery.validate.min.js" type="text/javascript"></script> 
        <script language="JavaScript" src="../js/jquery.maskedinput.js" type="text/javascript"></script>
            
    </head>
    <body>
        <script type="text/javascript">
                function alerta()
                {
                    alert("Operaçao realizada com sucesso!")
                }
            </script>
         <?php 
        $acervoDAO = new AcervoDAO();
       
        $acervo = $acervoDAO->getAcervoById($_GET["id"]);
        
        ?>
        <?php 
        $emprestimoDAO = new EmprestimoDAO();
       
        $emprestimo = $emprestimoDAO->getId($_SESSION["login"]);
        
        ?>
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

        <div id="page">
            <div align="center">
                <ul>
                    <li id="search" align="center">
                        <h1>Locar livro</h1>
                        <table border='0' align='center'>
                            <tr>
                                <td>
                                    <form method="post" action="../controller/locarLivroController.php">
                                        <TABLE BORDER='0' align='center'> 
                                            <tr>  
                                                
                                                <input  type="hidden" name="autor_idautor" value="<?php echo $acervo["autor_idautor"]?>"/>
                                                <input type="hidden" name="idacervo" value="<?php echo $acervo["idAcervo"]?>"/>
                                                
                                                <input type="hidden" name="idusuario" value="<?php echo $emprestimo["idusuario"]?>"/>
                                                <td align='right'> 1ª autor </td><td> <input required='required' type="text" readonly='readonly' id="s2" name="autor1" value="<?php echo $acervo["autor"]?>" /></td>
                                                <td align='right'>2ª autor </td><td><input type="text" id="s2"  name="autor2" readonly='readonly' value="<?php echo $acervo["segundo_autor"]?>" /> </td>
                                            </tr>
                                            <tr>
                                                <td align='right'>Título </td><td><input type="text" id="s2" required='required' readonly='readonly' name="titulo" value="<?php echo $acervo["titulo"]?>" /></td> 
                                                <td align='right'> Subtítulo </td><td><input type="text" id="s2"  name="subtitulo" readonly='readonly' value="<?php echo $acervo["subtitulo"]?>" /></td>

                                            </tr>  
                                            <tr>  
                                                <td align='right'> Editora  </td><td><input type="text" id="s2" required='required' readonly='readonly' name="editora" value="<?php echo $acervo["editora"]?>" /></td>
                                                <td align='right'> ISBN</td><td> <input type="text" id="s2" required='required' readonly='readonly' name="isbn" value="<?php echo $acervo["isbn"]?>" /></td>
                                            </tr>
<!--                                            <tr> 
                                                <td align='right'>Nª da edição  </td><td><input type="text" id="s2" required='required' name="n_edicao" value="<?php echo $acervo["edicao"]?>" /> </td>
                                                <td align='right'>cpf  </td><td><input type="text" id="cpf" required='required' name="cpf" value="" /> </td>
                                               
                                               
                                            </tr>-->
                                            <tr> 
                                                <td align='right'>Data Inicio  </td><td><input type="date" id="s2" required='required' readonly='readonly' name="data_inicio" value="<?php echo date('Y-m-d'); ?>"  /> </td>
                                                <td align='right'>Data Termino  </td><td><input type="date" id="s2" required='required' readonly='readonly'  name="data_termino" value="<?php echo date('Y-m-d' , strtotime('+15 days'));?>" /> </td>
                                                <td>
                                                    
                                                </td>
                                               
                                            </tr>
                                            <tr> 
                                                
                                                </br>
                                                <td align="center" COLSPAN=4>
                                                    <input class="button" type="submit" name="acao" onclick="alerta()" value="Salvar" align="center" />
<!--                                                    <input class="button" type="reset" value="limpar" name="limpar" align="center"/></br>-->
                                                </td>
                                                <tr>
                                                    <td align="center" COLSPAN=4><a href=javascript:history.back(2)>Voltar</... </td>
                                                </tr>
                                            </tr>
                                        </TABLE>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        
                    </li>
                </ul>
            </div>
        </div>
            <script type="text/javascript">
        jQuery(function($) {
            $("#cpf").mask("999.999.999-99");
            $("#data").mask("99/99/9999");
            $("#tdata").mask("99/99/9999");
        });
    </script> 
        
        <!-- end page -->
        <div id="footer">
            <p id="legal">&copy;2014 Wikimac. Todos os direitos reservados. | <a href="www.weebsystem.com.br">Weebsystem</a></p>

        </div>

        <div id="logo2">
            <a href="wikimac.php"><img src="../images/logo.png" alt="" width="90" height="90" /></a>
        </div>
    </body>
</html>
