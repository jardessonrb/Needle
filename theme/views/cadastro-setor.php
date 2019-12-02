<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/register-printer.css"); ?>">
<div id="container">
	<div class="container-body">
		<div class="row">
			<div class="title-form">
				<h4>Cadastro de Setor</h4>
			</div>
			<form class="style-form">
				<label class="style-label">Nome Setor</label>
				<input id="nome_setor" name="nome_setor" class="style-input" placeholder="Nome Setor"></input>
				<label class="style-label">Nome Setor</label>
				<select class="style-select style-input">
					<option value="" selected="">Selecione Prédio</option>
				</select>
				<button class="button-register">Cadastrar</button>
			</form>
		</div>
	</div>
</div>