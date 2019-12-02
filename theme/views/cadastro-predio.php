<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/register-printer.css"); ?>">
<div id="container" class="container">
	<div class="container-body">
		<div class="row">
			<div class="title-form">
				<h4>Cadastro de Prédio</h4>
			</div>
			<form class="style-form">
				<label class="style-label">Nome Predio</label>
				<input id="nome_predio" name="nome_predio" class="style-input" placeholder="Nome Predio"></input>
				<label class="style-label">Nome Empresa</label>
				<select class="style-select style-input" id="id_empresa" name="id_empresa">
					<option value="" selected="">Selecione Empresa</option>
				</select>
				<button id="button-register" class="button-register">Cadastrar</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>