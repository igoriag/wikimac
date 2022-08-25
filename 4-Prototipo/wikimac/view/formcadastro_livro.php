<?php
require_once '../DAO/acervoDAO.php';
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
            <script type="text/javascript" src="../js/java_script.js"></script>
            <script type="text/javascript">
                function alerta()
                {
                    alert("livro cadastrao com sucesso!")
                }
            </script>
    </head>
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

        <div id="page">
            <div align="center">
                <ul>
                    <li id="search" align="center">
                        <h1>Cadastro de livro</h1>
                        <div >
                                    <form method="post" action="../controller/cadastrarLivroController.php">
                                        <TABLE BORDER='0' align='center'> 
                                            <tr>  
                                                <input  type="hidden" name="status" value="Disponivel"/>
                                                <td align='right'> 1ª autor </td><td> <input class="maiusculo" required='required' type="text" id="s2" name="autor1" value="" /></td>
                                                <td align='right'>2ª autor </td><td><input class="maiusculo" type="text" id="s2"  name="autor2" value="" /> </td>
                                            </tr>
                                            <tr>
                                                <td align='right'>Título </td><td><input type="text" class="maiusculo" id="s2" required='required' name="titulo" value="" /></td> 
                                                <td align='right'> Subtítulo </td><td><input class="maiusculo" type="text" id="s2"  name="subtitulo" value="" /></td>

                                            </tr>  
                                            <tr>  
                                                <td align='right'> Editora  </td><td><input class="maiusculo" type="text" id="s2" required='required' name="editora" value="" /></td>
                                                <td align='right'> ISBN</td><td> <input type="text" id="s2" required='required' name="isbn" value="" /></td>
                                            </tr>
                                            <tr> 
                                                <td align='right'>Nª da edição  </td><td><input type="text" id="s2" required='required' name="n_edicao" value="" /> </td>
                                                <td align='right'>Quantidade</td><td><input type="text" id="s2" required='required' name="quantidade" value="" /></td>
                                               
                                               
                                            </tr>
                                            <tr> 
                                                <tr>  
                                                    <td align='right'> Linguagem</td>
                                                <td align="left"> 
                                                    <select name=linguagem_livro required='required'>
                                                        <option name=linguagem_livro value=português> Portugues  </option>
                                                        <option name=linguagem_livro value=español > Espanol </option>
                                                        <option name=linguagem_livro value=English > English </option>
                                                    </select>
                                                </td>
                                                    <td align='right'>Categoria  </td>
                                                <td align="left">
                                                    <select name=categoria required='required'>
                                                        <option  value=utoajuda> Autoajuda  </option>
                                                        <option  value=Aventura > Aventura  </option>
                                                        <option  value=Biografia > Biografia </option>
                                                        <option value=Ciências> Ciências </option>
                                                        <option  value=Clássico> Clássico </option>
                                                        <option  value=Drama> Drama </option>
                                                        <option  value=Economia > Economia </option>
                                                        <option  value=Erótico > Erótico </option>
                                                        <option  value=Ficção> Ficção </option>
                                                   
                                                        <option  value=Filosofia> Filosofia  </option>
                                                        <option  value=Infantil > Infantil  </option>
                                                   
                                                        <option  value=Mitologia> Mitologia </option>
                                                        <option  value=Poesia> Poesia </option>
                                                        <option  value=Policial> Policial </option>
                                                        <option  value=Religiões > Religiões </option>
                                                        <option  value=Romance > Romance </option>
                                                        <option  value=Suspense> Suspense </option>
                                                        <option  value=terror> terror </option>
                                                        <option  value=Técnico> Técnico </option>
                                                    </select>
                                                </td>
                                                    
                                                    
                                                    
                                                </tr>
                                                </br>
                                                <td align="center" COLSPAN=4>
                                                    <input class="button" type="submit"  name="acao" value="Salvar" align="center" />
                                                    <input class="button" type="reset" value="limpar" name="limpar" align="center"/></br>
                                                </td>
                                                <tr>
                                                    <td align="center" COLSPAN=4><a href=javascript:history.back(2)>Voltar</... </td>
                                                </tr></br>
                                            </tr>
                                        </TABLE>
                                    </form>
                        </div>
                        <center>
                        <?php
        if (!empty($_GET["msg"])) {
            echo "<font color='red'><i>", $_GET["msg"], "</i></font>";
        }
        ?></center>
                        </br></br>
                    </li>
                </ul>
            </div>
        </div>

        </br>
        <!-- end page -->
        <div id="footer">
            <p id="legal">&copy;2014 Wikimac. Todos os direitos reservados. | <a href="www.weebsystem.com.br">Weebsystem</a></p>

        </div>

        <div id="logo2">
            <a href="wikimac.php"><img src="../images/logo.png" alt="" width="90" height="90" /></a>
        </div>
    </body>
</html>
