<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/register-printer.css"); ?>">
<div id="container">
	<div class="container-body">
		<div class="row">
			<h1>Página - Cadastro Setor</h1>
			<form class="style-form">
				<label class="style-label">Nome Setor</label>
				<input id="nome_setor" name="nome_setor" class="style-input" placeholder="Nome Setor"></input>
				<label class="style-label">Nome Setor</label>
				<select class="style-select">
					<option value="" selected="">Selecione Prédio</option>
				</select>
				<button class="button-register">Cadastrar</button>
			</form>
		</div>
	</div>
</div>