<?php
	require_once(dirname(__FILE__) ."/../modelo/Usuario.php");
	
	$bd = dirname(__FILE__) . '/../banco_dados/locadora.sqlite';

	if(isset($_POST['btnEntrar'])){
		$login = $_POST['txtNome'];
		$senha = $_POST['txtSenha'];
		
		$u = new Usuario( $bd );
		
		if($u->validar($login, $senha)){			
			$usuario = $u->buscarPorLogin($login);	
			$usuario->con = null;	
			$usuario->funcionario->con = null;		
			$_SESSION['usuario'] = $usuario;
			
			header("location: index.php?mod=boas_vindas");	
			exit();
		}
		else {
			$_msg_erro = "Login/Senha Incorreto!";
			include(dirname(__FILE__) . "/../telas/formLogin.php"); 
		}		
	}
	else {		
		include(dirname(__FILE__) . "/../telas/formLogin.php");
	}
	
?>