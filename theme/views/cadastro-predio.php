<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/register-printer.css"); ?>">
<div id="container">
	<div class="container-body">
		<div class="row">
			<h1>Página - Cadastro Predio</h1>
			<form class="style-form">
				<label class="style-label">Nome Predio</label>
				<input id="nome_predio" name="nome_predio" class="style-input" placeholder="Nome Predio"></input>
				<label class="style-label">Nome Empresa</label>
				<select class="style-select" id="id_empresa" name="id_empresa">
					<option value="" selected="">Selecione Empresa</option>
				</select>
				<button class="button-register">Cadastrar</button>
			</form>
		</div>
	</div>
</div>