function limpar_todos_Campos(){	
	$("#txtId").val(0)
	$("#txtFuncionario").val('');
	$("#txtQde").val('');
	$("#txtstatusvigente").val('');
	$("#txtstatusnaovigente").val('');
}

function habilitar_todos_campos(){	
	$("#txtFuncionario").removeClass('select_read_only');
	$("#txtQde").prop('readonly', false);;	
	$("#txtstatusvigente").prop('disabled', false);;
	$("#txtstatusnaovigente").prop('disabled', false);;
}

function desabilitar_todos_campos(){	
	$("#txtFuncionario").addClass('select_read_only');
	$("#txtQde").prop('readonly', true);;	
	$("#txtstatusvigente").prop('disabled', true);;
	$("#txtstatusnaovigente").prop('disabled', true);;
}

function inicia_meta_venda(){	
	desabilitar_todos_campos();
	limpar_todos_Campos();	
}

function selFuncionario_onSelected(){
	$('#form_pesquisa_titulo').submit();
} 

function btnNovo_onclick(){	
	habilitar_todos_campos();	
	limpar_todos_Campos();	
}

function validar(){
	
	msg = '';
	flag= true;
	/*
	if ($("#txtNome").val() == ''){		
		destacar_erro("#txtNome");
		msg = msg + "Preencha o nome do Cliente!";
		flag= false;
	}
	
	if ($("#txtLogradouro").val() == '') {
		destacar_erro("#txtLogradouro");
		msg = msg + "<br>Preencha o Endereço!";
		flag= false;
	}
	
	if ($("#txtBairro").val() == ''){	
		destacar_erro("#txtBairro");
		msg = msg + "<br>Preencha o Bairro!";
		flag= false;
	}
	if ($("#txtCPF").val()==''){
		destacar_erro("#txtCPF");
		msg = msg + "<br>Preencha o CPF!";
		flag= false;
	}
	
	if ($("#txtRG").val() == ''){		
		destacar_erro("#txtRG");
		msg = msg + "<br>Preencha o RG!";
		flag= false;
	}	
	
	mostrar_msg_erro( msg )
	 */
	return flag;	
}

function destacar_erro( campo ){		
	$(campo).addClass('border');
	$(campo).addClass('border-danger');	
}

function mostrar_msg_erro( msg ){
	$("#validacao").css('visibility','visible');
	$("#validacao").html( msg );
}


$(document).ready(function(){  
});