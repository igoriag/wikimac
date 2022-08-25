<?php
require_once('conexao.php');

$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : ''; 

if (! empty($opcao)){	
	switch ($opcao)
	{
		case 'pais':
			{
				echo getAllPais();
				break;
			}
		case 'estado':
			{
				echo getFilterEstado($valor);
				break;
			}
		case 'cidade':
			{
				echo getFilterCidade($valor);
				break;
			}
	}
}

function getAllPais(){
	$pdo = Conectar();
	$sql = 'SELECT sigla, nome FROM pais';
	$stm = $pdo->prepare($sql);
	$stm->execute();
	sleep(1);
	echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	$pdo = null;	
}

function getFilterEstado($pais){
	$pdo = Conectar();
	$sql = 'SELECT sigla, nome FROM estado WHERE pais = ?';
	$stm = $pdo->prepare($sql);
	$stm->bindValue(1, $pais);
	$stm->execute();
	sleep(1);
	echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));	
	$pdo = null;	
}

function getFilterCidade($estado){
	$pdo = Conectar();
	$sql = 'SELECT nome FROM cidade WHERE uf = ?';
	$stm = $pdo->prepare($sql);
	$stm->bindValue(1, $estado);
	$stm->execute();
	sleep(1);
	echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	$pdo = null;		
}
?>