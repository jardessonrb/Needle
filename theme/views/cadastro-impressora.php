<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/register-printer.css"); ?>">

<script src="<?= url("/theme/assets/jquery3.4.1.js"); ?>"></script>
<div id="container" class="container">
	<div class="container-body">
		<div class="row">
			<form class="style-form" action="#"> 
				<label class="style-label">Numero de Serie</label>
				<input class="style-input" id="numSerie_printer" name="numSerie_printer"></input>
				<label class="style-label">Modelo</label>
				<input class="style-input" id="modelo_printer" name="modelo_printer"></input>
				<label class="style-label">Marca</label>
				<input class="style-input" id="marca_printer" name="marca_printer"></input>
				<label class="style-label">Tombo</label>
				<input class="style-input" id="tombo_printer" name="tombo_printer"></input>
				<label class="style-label">Status</label>
				<input class="style-input" id="status_printer" name="status_printer"></input>
				<label class="style-label">Setor</label>
				<select class="style-select style-input" id="setor_printer" name="setor_printer">
					<option value="" selected="">Selecione Setor</option>
				</select>
				<label class="style-label">Regra</label>
				<input class="style-input"></input>
				<button class="button-register">Cadastrar</button>
			</form>
		</div>
	</div>
</div>