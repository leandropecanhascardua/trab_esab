<?php
/*
		$_POST=["txtId"=> "0","txtTitulo"=> "1","txtTituloOriginal"=>  "2","txtDescricao"=> "3","txtPeriodoMaxEmprestimo"=> "","txtQdeEstoque"=> "","btnSalvar"=> ""];
*/

	require_once(dirname(__FILE__) ."/../modelo/ItemAcervo.php");		
	
	$bd = dirname(__FILE__) . '/../banco_dados/locadora.sqlite';	
		
	$item = new ItemAcervo( $bd );	
		
	$_qde_itens_acervo = 0;
		
	if(isset($_POST['btnSalvar'])) {				
			$id = $_POST['hdnId'];			
			$nome= $_POST['txtTitulo'];
			$nome_original= $_POST['txtTituloOriginal'];
			$descricao = $_POST['txtDescricao'];
			$ano_lancamento= $_POST['txtAnoLancamento'];
			$id_titulo= $_POST['hdnIdTitulo'];	
			$codigo = $_POST['txtCodigo'];
			$periodo_max = $_POST['txtPeriodoMaxEmprestimo'];			
			$midia = $_POST['txtMidia'];
			$status = $_POST['txtStatus'];			
			
			$item->adicionarTitulo($nome, $nome_original, $descricao, $ano_lancamento);
			$item->titulo->id = $id_titulo;
			$item->id = $id ;				
			$item->codigo = $codigo ;
			$item->nome = $periodo_max ;			
			$item->periodo_max = $periodo_max ;
			$item->midia = $midia ;
			$item->status = $status ;
			
			if ($item->id == 0){
				if($item->verificarExistenciaCodigo($codigo)){
					$_msg_erro = "Erro! Esse código já está cadastrado no sistema!";
				}
				else {
					$_resultado = $item->salvar();					
				}
			}
			else {
				$_resultado = $item->salvar();				
			}	
			
			$_msg_ok = isset($_resultado) && $_resultado > 0?"Dados Registrados com Sucesso!":null;
			$_msg_erro = isset($_resultado) && $_resultado > 0?null:"Erro! ";		
	}
	if(isset($_POST['selTitulo'])) {
		$_exibir_lista_midias = true;
		$_titulo_selecionado = $_POST['selTitulo']; 
		$_itens = $item->listarMidiaPorTitulo($_titulo_selecionado);		
	}
	if(isset($_POST['selMidia'])) {
		$cod = $_POST['selMidia']; 
		$_midia = $item->buscar($cod);
	}
	
	if(isset($_POST['btnNovaMidia'])) {
		$tit = $_POST['selTitulo']; 
		$_titulo = $item->buscarTitulo($tit);
	}
	if(isset($_POST['btnExcluir'])){
		$id = $_POST['hdnId'];		
		$nome= $_POST['txtTitulo'];
		$nome_original= $_POST['txtTituloOriginal'];
		$descricao = $_POST['txtTituloOriginal'];
		$ano_lancamento= $_POST['txtAnoLancamento'];
		$id_titulo= $_POST['hdnIdTitulo'];
		$codigo = $_POST['txtCodigo'];
		$periodo_max = $_POST['txtPeriodoMaxEmprestimo'];			
		$midia = $_POST['txtMidia'];
		$status = $_POST['txtStatus'];

		$item->id = $id;
		$item->adicionarTitulo($nome, $nome_original, $descricao, $ano_lancamento);
		$item->titulo->id = $id_titulo;			
		$item->codigo = $codigo ;
		$item->nome = $periodo_max ;			
		$item->periodo_max = $periodo_max ;
		$item->midia = $midia ;
		$item->status = $status ;
			
		$_resultado = $item->excluir();
		$_msg_ok = $_resultado > 0?"Dados Excluídos com Sucesso!":null;
		$_msg_erro = $_resultado > 0?null:"Erro!";	
	}
	if(isset($_POST['btnPesquisar'])) {
		$nome = $_POST['nome_filme']; 
		$_lista = $item->pesquisar($nome);
	}
	else {
		$_lista = $item->listar();
	}
	
	$_midias = $item->listarMidia();
	$_situacao = $item->listarStatusMidia();
	
	
	include(dirname(__FILE__) . "/../telas/formAcervo.php");
?>