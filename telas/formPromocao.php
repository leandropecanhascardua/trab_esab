<?php

?>
<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Controle de Locações</title>
	<!-- Bootstrap links CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	<style>	
    	option:checked,
    	option:hover {
      	background-color: #85c1e9 ;
    	}
    	input:read-only {
  			background: #cdcdcd;
		}		
		textarea:read-only {
  			background: #cdcdcd;
		}
		.select_read_only {
			background: #cdcdcd;
			pointer-events: none;
			touch-action=none;
		}
	</style>
	<script src="telas/js/formAcervo.js" ></script>
</head>
<body>
	
	<div class="container bg-secondary" style="--bs-bg-opacity: .25;">
		<!-- menu  -->		
		<?php
				include ("menu.php");
		?>
		
		<!-- sistema -->
		<div class="row">
			<p class="h5 bg-danger mt-2 p-2" style="--bs-bg-opacity: .5;">Controle de Promoções</p>
		</div>
		<div class="row">
			<!-- formulario de pesquisa -->
			<div class="col-lg-6">
				<form action="" method="post">
						<div class="row form-check">
							<input type="checkbox"  class="form-check-input" id="opPromLocIndiv" name="opPromLocIndiv" value="1" <?= isset($_config->habilitar_promocao_locacao_individual)&& $_config->habilitar_promocao_locacao_individual==1?'checked':'' ?>> &nbsp;&nbsp;Desconto por Quantidade de Itens em cada Locação</input>
						</div>		
						<div class="row ">
							<div class="col-auto">
									<label for="txtQde" class="form-label">Quantidade:</label>	
							</div>
							<div class="col-auto">
								<input class="form-control " id="txtQde" name="txtQde" value="<?= isset($_config->qde_locacao_individual) ?$_config->qde_locacao_individual:'' ?>" >
							</div>
						</div>		
						<div class="row ">
							<div class="input-group-sm text-center pt-4" >	
								<button type="submit" class="btn btn-success" id="btnSalvar" name="btnSalvar">Salvar</button>
							</div>
						</div>			
				</form>
			</div>
			
			<!-- formulario de cadastro-->
			<div class="col-lg-6">
				<form action="" method="post">					 
						<div class="row form-check">
							<input type="checkbox"  class="form-check-input" id="opPromLocIndiv" name="opPromLocIndiv" value="1" <?= isset($_config->habilitar_promocao_locacao_periodo)&& $_config->habilitar_promocao_locacao_periodo==1?'checked':'' ?>>Desconto por Quantidade de Locações</input>
						</div>		
						<div class="row ">
							<div class="col-auto">
									<label for="txtQde" class="form-label">Quantidade:</label>	
							</div>
							<div class="col-auto">
								<input class="form-control " id="txtQde" name="txtQde" value="<?= isset($_config->qde_locacao_periodo)?$_config->qde_locacao_periodo:'' ?>" >
							</div>
						</div>		
						<div class="row ">
							<div class="input-group-sm text-center pt-4" >	
								<button type="submit" class="btn btn-success" id="btnSalvar" name="btnSalvar">Salvar</button>
							</div>
						</div>	
						</div>			
			
				</form>
			</div>
		</div>
		
					
	</div>
	      
	
</body>
</html>