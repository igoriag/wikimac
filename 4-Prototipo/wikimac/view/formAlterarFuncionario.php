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
                <?php
require_once '../DAO/usuarioDAO.php';
include '../js/funcao.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script type="text/javascript">
                function alerta()
                {
                    alert("Funcionário alterado com sucesso!")
                }
            </script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>wikimac</title><link rel="shortcut icon" type="../image/x-icon" href="../favicon.ico">
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <link href="../css/wikimac.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="../js/jquery-1.8.2.js"></script>
            <script language="JavaScript" src="../js/jquery.maskedinput.js" type="text/javascript"></script>
            <script language="JavaScript" src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="../js/jquery.validate.min.js" type="text/javascript"></script> 
<script type="text/javascript">
$(document).ready(function(){
	
	<!-- Carrega os Paises -->
	$('#btnPais').click(function(e){
		$('#btnPais').hide();
		$('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');  
		
		$.getJSON('consulta.php?opcao=pais', function (dados){
			
		   if (dados.length > 0){ 	
			  var option = '<option>Selecione o País</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.sigla+'">'+obj.nome+'</option>';
			  })
			  $('#mensagem').html('<span class="mensagem">Total de paises encontrados.: '+dados.length+'</span>'); 
			  $('#cmbPais').html(option).show();
		   }else{
			   Reset();
			   $('#mensagem').html('<span class="mensagem">Não foram encontrados paises!</span>');
		   }
		})
	})
	
	<!-- Carrega os Estados -->
	$('#cmbPais').change(function(e){
		var pais = $('#cmbPais').val();
		$('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');  
		
		$.getJSON('consulta.php?opcao=estado&valor='+pais, function (dados){ 
		
		   if (dados.length > 0){	
			  var option = '<option>Selecione o Estado</option>';
			  $.each(dados, function(i, obj){
				  option += '<option value="'+obj.sigla+'">'+obj.nome+'</option>';
			  })
			  $('#mensagem').html('<span class="mensagem">Total de estados encontrados.: '+dados.length+'</span>'); 
		   }else{
			  Reset();
			  $('#mensagem').html('<span class="mensagem">Não foram encontrados estados para esse país!</span>');  
		   }
		   $('#cmbEstado').html(option).show(); 
		})
	})
	
	<!-- Carrega as Cidades -->
	$('#cmbEstado').change(function(e){
		var estado = $('#cmbEstado').val();
		$('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');  
		
		$.getJSON('consulta.php?opcao=cidade&valor='+estado, function (dados){
			
			if (dados.length > 0){ 	
				var option = '<option>Selecione a Cidade</option>';
				$.each(dados, function(i, obj){
					option += '<option>'+obj.nome+'</option>';
				})
				$('#mensagem').html('<span class="mensagem">Total de cidades encontradas.: '+dados.length+'</span>');
			}else{
				Reset();
				$('#mensagem').html('<span class="mensagem">Não foram encontradas cidades para esse estado!</span>');  
			}
			$('#cmbCidade').html(option).show();
		})
	})
	
	<!-- Resetar Selects -->
	function Reset(){
		$('#cmbPais').empty().append('<option>Carregar Paises</option>>');
		$('#cmbEstado').empty().append('<option>Carregar Estados</option>>');
		$('#cmbCidade').empty().append('<option>Carregar Cidades</option>');
	}
});
</script>
    
    <script language="JavaScript" src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script language="JavaScript" src="../js/jquery.validate.min.js" type="text/javascript"></script> 
        <script language="JavaScript" src="../js/jquery.maskedinput.js" type="text/javascript"></script>
    </head>
    <script type="text/javascript">
        function alerta()
        {
            alert("Fincionario Alterado com sucesso!")
        }
    </script>

    <body>
       <?php 
        $usuarioDAO = new UsuarioDAO();
        $estados = $usuarioDAO->listarAllEstado();
        $cidades = $usuarioDAO->listarAllCidade();
        $usuario = $usuarioDAO->getUsuarioById($_GET["id"]);
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
            </br></br></br>
                <div id="logo">
                    <h1><a href="#">wikimac</a></h1>
                    <h2><a href="#">Biblioteca online</a></h2>
                </div>
        </div>



        <div id="page">

            <div align="center">
                <ul>

                    <li id="search" align="center">
                        <h1>Alterar Funcionario</h1>
                        <table border='0' align='center'>

                            <form action="../controller/alterarFuncionarioController.php" method="post">
                                <TABLE BORDER='0' align='center'> </br></br>

                                    <fieldset>	
                                        <tr>
                                            <td>
                                            Tipo Funcionário
                                            </td>
                                         <td>
                                    <?php
                                        echo "<select disabled id='s2' >";
                                        echo "     <option value=''>Bibliotecario</option>";
                                        

                                        echo "</select>";
                                        ?>                                       
                                    </td>
                                            <input  type="hidden" name="perfil" value="2"/>
                                            <input type="hidden" name="idusuario" value="<?php echo $usuario["idusuario"]?>"/>
                                        <td align='right'> Nome </td><td><input type="text" id="s2"  name="nome" value="<?php echo $usuario["nome"]?>" /></td>
                                        </tr>
                                        <tr>  
                                            <td align='right'> CPF </td><td>  <input type="text" value="<?php echo $usuario["cpf"]?>" name="cpf" id="cpf" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);"  maxlength="14" />
<script>
    function validarCPF( cpf ){
	var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
	
	if(!filtro.test(cpf))
	{
		window.alert("CPF inválido. Tente novamente.");
		return false;
	}
   
	cpf = remove(cpf, ".");
	cpf = remove(cpf, "-");
	
	if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
		cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
		cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
		cpf == "88888888888" || cpf == "99999999999")
	{
		window.alert("CPF inválido. Tente novamente.");
		return false;
   }

	soma = 0;
	for(i = 0; i < 9; i++)
	{
		soma += parseInt(cpf.charAt(i)) * (10 - i);
	}
	
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	if(resto != parseInt(cpf.charAt(9))){
		window.alert("CPF inválido. Tente novamente.");
		return false;
	}
	
	soma = 0;
	for(i = 0; i < 10; i ++)
	{
		soma += parseInt(cpf.charAt(i)) * (11 - i);
	}
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	
	if(resto != parseInt(cpf.charAt(10))){
		window.alert("CPF inválido. Tente novamente.");
		return false;
	}
	
	return true;
 }
 
function remove(str, sub) {
	i = str.indexOf(sub);
	r = "";
	if (i == -1) return str;
	{
		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
	}
	
	return r;
}

/**
   * MASCARA ( mascara(o,f) e execmascara() ) CRIADAS POR ELCIO LUIZ
   * elcio.com.br
   */
function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function cpf_mask(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que nï¿½o ï¿½ dï¿½gito
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dï¿½gitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dï¿½gitos
	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dï¿½gitos
	return v
}
    </script></td>
                                            <td align='right'>RG </td><td><input type="text" id="rg" required='required' name="rg" value="<?php echo $usuario["rg"]?>" /> </td>
                                        </tr>

                                        <tr>  
                                            <td align='right'> Telefone</td><td> <input type="text" id="telefone"  name="telefone" required='required' value="<?php echo $usuario["telefone2"]?>" /></td>
                                            <td align='right'> Telefone 2</td><td> <input  id="telefone2" required='required' name="telefone2" value="<?php echo $usuario["telefone2"]?>" /></td>
                                            
                                        </tr>

                                        <tr>  
                                            <td align='right'> Endereço</td><td> <input required='required' type="text" id="s2"  name="endereco" value="<?php echo $usuario["endereco"]?>" /></td>
                                            <td align='right'>CEP  </td><td><input type="text" id="s2" required='required' name="cep" value="<?php echo $usuario["cep"]?>" /> </td>
                                        </tr> 
                                                
                                        <tr> 
                                            
                                            <td align='right'>E-mail</td>
                                            <td><input type="text" id="s2"  name="email" required='required' value="<?php echo $usuario["email"]?>" /></td>
                                            <td align='right'> Data nascimento</td><td> <input type="date" id="s2" required='required' name="data_nascimento" value="<?php echo $usuario["data_nascimento"]?>" /></td>

                                        </tr>
                                       

                                       
                                        <tr>   
                                            
                                            <div id="pais">
                                                <td align='right'>
                                            <label>Selecione o País:</label>
                                                </td>
                                                <td>
                                             <select required='required' id="cmbPais">
                                             <option>Carregar Paises</option>
                                            </select>
                                                    <input required='required' type="button" size="100px" value="Carregar Pais" id="btnPais" class="botao"/>
                                                </td>
                                             </div>
                                            <div id="estado">
                                           
                                             
                                            <td  align='right'>
                                                 <label>Selecione o Estado:</label>
                                            </td>
                                            <td>
                                                <select required='required' id="cmbEstado">
                                                <option>Carregar Estados</option>
                                                 </select> 
                                            </td>
                                             </div>
                                        </tr>
                                        
                                        <tr>
                                            <td></td>
                                            <div id="cidade">
         
          
                                            <td  align='right'>
                                                 <label>Selecione a Cidade:</label>
                                            </td>
                                            
                                            <td>
                                                <select name="cidade" required='required' id="cmbCidade">
                                                  <option>Carregar Cidades</option>
                                                   </select>
                                                   </div>
                                            </td>
                                            
                                        </tr>

 <tr>

     <td align='center' colspan="5" ><input align="center" class="button" type="submit" onclick="alerta()" value="Alterar" align="center" />
                                                
                                               

                                        </tr>

                                        <tr>
                                            <td  align='center' colspan="5" ><a href=javascript:history.back(2)>Voltar</... 
                                                </br></td>
                                        </tr>
                                </TABLE>

                                
                                </li>
                        </table>

                        <script type="text/javascript">
        jQuery(function($) {
            $("#cpf").mask("999.999.999-99");
            $("#telefone").mask("(99) 9999-9999");
            $("#telefone2").mask("(99) 9999-9999");
            $("#rg").mask("9.999.999");
            $("#cep").mask("99.999.999");
        });
    </script>

                       

                    </li>

                </ul>
            </div>
            


        </div>


       
        <div id="footer">
            <p id="legal">&copy;2014 Wikimac. Todos os direitos reservados. | <a href="www.weebsystem.com.br">Weebsystem</a></p>

        </div>

        <div id="logo2">
            <a href="index.php"><img src="../images/logo.png" alt="" width="90" height="90" /></a>
        </div>
    </body>
</html>
