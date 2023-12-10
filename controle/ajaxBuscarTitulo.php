<?php

	require_once(dirname(__FILE__) ."/../modelo/ItemAcervo.php");		
	require_once(dirname(__FILE__) ."/../modelo/Configuracao.php");
	require_once(dirname(__FILE__) ."/../modelo/Locacao.php");		
	
	$bd = dirname(__FILE__) . '/../banco_dados/locadora.sqlite';	
	
	$cod = $_POST['cod'];
	
	$c = new Configuracao( $bd );
	$config = $c->buscar();
	
	$l = new Locacao( $bd );
	
	$i= new ItemAcervo( $bd );	 
	$item = null;
	$msg = "";
	
	if ($i->verificarExistenciaCodigo($cod)){
		$item = $i->buscar($cod);
		if($l->verificarExistenciaLocacaoItem($cod)){
			$msg = "ITEM JÁ ESTÁ LOCADO!";
		}		
	} else 
		$msg = "ITEM INEXISTENTE!";
	
	
	$resp =["msg"=>$msg,"config"=>$config,"item"=> $item];
	
	header("Content-Type: application/json");
	echo (json_encode($resp));
	
?>