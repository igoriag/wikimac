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
</head>
<body>
<script type="text/javascript">
                function alerta()
                {
                    alert("Senha alterada com sucesso! \n\nFaça login com a nova senha!")
                }
            </script>
<div id="header">
	
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
function NArray (n) 
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
document.write (NomeDiaWMOnline[dias] + ", " + dia + " de " + NomeMesWMOnline[mes] + " de " + ano)
</script>
		
	</div>
	<div id="logo">
            </br></br></br>
		<h1><a href="#">wikimac</a></h1>
		<h2><a href="#">Biblioteca online</a></h2>
	</div>
</div>

<div id="pagelogin">

	<div id="sidebar" align="center">
		<ul>
			
			<li id="search" align="center">
				<h2>Alterar Senha</h2>
                                <form method="post" action="index.php">
					<fieldset>
                                        Senha Atual </br><input type="password"  id="s2" name="senha" value="" /></br></br>
					Nova Senha </br><input type="password"  id="s2" name="nsenha" value="" /></br></br>
                                        Confirmar Nova Senha </br><input type="password"  id="s2" name="cnsenha" value="" /></br>
					<input class="button" type="submit" name="acao" onclick="alerta()" value="Confirmar" align="center" /></br>

					
					
					</fieldset>
				</form>
			</li>

			
		</ul>
		
	</div>

</div>
    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<div id="footer">
	<p id="legal">&copy;2013 wikimac. Todos os direitos reservados.</p>
	
</div>

<div id="logo2">
<!--<img src="../images/logo.png" alt="" width="90" height="90" /> -->
</div>
</body>
</html>
