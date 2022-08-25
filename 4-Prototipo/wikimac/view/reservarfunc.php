<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>wikimac</title><link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <link href="../css/wikimac.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
<script type="text/javascript">
            function alerta()
            {
                alert("Reserva efetuada com sucesso!")
            }
        </script>


        <div id="header">
           <div id='cssmenu'>
                <ul align="center">
                    <li class='active'><a href="wikimac.php"><span>Wikimac</span></a></li>




                    <li class='has-sub'><a href='servicos.php'><span>Serviços</span></a>
                        <ul>
                            <li><a href='formcadastro_funcionario.php' target="centropag"><span>Cadastrar Funcionarios</span></a></li>
                            <li><a href='formcadastro_usuario.php' target="centropag"><span>Cadastrar Usuário</span></a></li>
                            <li><a href='formcadastro_livro.php' target="centropag"><span>Cadastrar Livros</span></a></li>
                            <li><a href='reservarfunc.php' target="centropag"><span>Reservar Livros</span></a></li>
                            <li><a href='#' target="centropag"><span>Renovar Reserva</span></a></li>



                        </ul>
                    </li>
                    <li class='has-sub'><a href='relatorios.php'><span>Relatorios</span></a>
                        <ul>
                            <li><a href='#' target="centropag"><span>Relatorio de Emprestimos</span></a></li>
                            <li><a href='#' target="centropag"><span>Relatorio Diario</span></a></li>
                            <li><a href='#' target="centropag"><span>Relatorio Semanal</span></a></li>
                            <li><a href='#' target="centropag"><span>Relatorio Mensal</span></a></li>

                        </ul>
                    </li>
                    <li class='active'><a href="conta.php"><span>Conta</span></a>
                        <ul>
                            <li><a href='alterarSenha.php' target="centropag"><span>Alterar senha </span></a></li>

                            <li><a href='renovarSenha.php' target="centropag"><span>Renovar senha</span></a></li>
                            <li><a href='index.php' target="centropag"><span>Sair</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
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

        </br></br>
        <table cellspacing="15px"  align="center" >
            <tr >
                <td valign="top">
                    <div id="home" align="center">
                        <ul>
                            <li align="center" id="search">
                                <big><big><h2 align="center">Reservar</h2></big></big>
                                <p align="center">Digite o codigo do livro desejado</p>
                                <form align="center" method="get" action="">
                                    <fieldset>
                                        <input align="center"   type="text" maxlength="500" id="s" name="s" value="" /></br></br>
                                        <input align="center" type="submit" id="x" onclick="alerta()" value="Reservar" />
                                    </fieldset>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>




            </tr>
        </table>




        <div id="footer">
            <p id="legal">&copy;2014 Wikimac. Todos os direitos reservados. | <a href="www.weebsystem.com.br">Weebsystem</a></p>

        </div>

        <div id="logo2">
            <a href="wikimac.php"><img src="../images/logo.png" alt="" width="90 " height="90" /></a>
        </div>
    </body>
</html>
  