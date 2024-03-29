<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/style-teste.css"); ?>">
<script src="<?= url("/theme/assets/jquery3.4.1.js"); ?>"></script>
<div id="container">
	<div class="container-body">
		<div class="row">
			<br><br><br>
			<h1>Página - teste</h1>
			<h4>Listagem</h4>
			<div class="list">
				<table border="1">
					<tr>
						<td>nome-objeto</td>
						<td>sobrenome-objeto</td>
						<td>idade-objeto</td>
						<td>Excluir</td>
					</tr>
				</table>
					<div id="fragment">
						<?php $v->insert("fragment/fragmento-teste", ["result" => $result]); ?>
					</div>
			</div>
			<div class="cadastro">
				<h4>Cadastro</h4>
				<div class="row-cadastro">
					<form class="style-form" id="cadastro" name="gallery" action="<?= $router->route("web.create"); ?>" method="post">
						<label class="style-label">Nome</label>
						<input type="text" name="nome" class="style-input" placeholder="Digite seu nome"></input>
						<label class="style-label">Sobrenome</label>
						<input type="text" name="sobrenome" class="style-input" placeholder="Digite seu Sobrenome"></input>
						<label class="style-label">Idade</label>
						<input type="text" name="idade" class="style-input" placeholder="Digite sua Idade"></input>
						<div id="buttons">
						<button class="style-button" id="cadastrar">Cadastrar</button>
						</div>
					</form>
				</div>
			</div>
			<div class="atualizar">
				<h4>Atualizar</h4>
				<div class="atualizar-body">
					<label class="style-label">Id objeto</label>
						<div class="pos-busca">
						<input class="style-input" id="busca-objeto" type="text" name="id-objeto" placeholder="Id do objeto">
						<button class="style-button" data-urlBuscar="<?= $router->route("web.buscar"); ?>" id="buscar">Buscar</button>
						</div>
					<form class="style-form" id="fatualizar" action="<?= $router->route("web.atualizar"); ?>" method="post">
						<input class="style-input" id="Aid-objeto" name="Aid-objeto" hidden=""></input>
						<label class="style-label">nome objeto</label>
						<input class="style-input" type="text" id="nome-objeto" name="nome-objeto" placeholder="nome do objeto">
						<label class="style-label">sobrenome objeto</label>
						<input class="style-input" type="text" id="sobrenome-objeto" name="sobrenome-objeto" placeholder="sobrenome do objeto">
						<label class="style-label">idade objeto</label>
						<input class="style-input" type="text" id="idade-objeto" name="idade-objeto" placeholder="idade do objeto">
						<button class="style-button" id="atualizar">Atualizar</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$("#cadastro").submit(function(e){
			e.preventDefault();

			var form = $('#cadastro');
			//alert(form);
			//alert(form.attr("action"));
			$.ajax({
				url: form.attr("action"),
				data: form.serialize(),
				type: "POST",
				datatype: "json",
				beforeSend: function(){
					alert("Before");
				},
				success: function(mensage){
					alert("retorno: "+mensage);
					if(mensage == 1){
						alert("Cadastrado com sucesso!");
					}else{
						alert("Não fi possivel cadastrar!");
					}
				},
				complete: function(){
					alert("Complete");
				}
			});
		});

		$("body").on("click", "[data-action]", function(e){
			e.preventDefault();           //var tt = $(this).attr("data-id");
			var data = $(this).data();
			var div = $(this).parent();
			//alert("URL: "+data.action);

			$.post(data.action, data, function(){
				alert("Ok");
				div.fadeOut();
			}, "json").fail(function(){
				alert(data.action);
			});


		});
		
		//METODO POR AJAX 
		$("#buscar").click(function(){
			var Idobjeto = document.getElementById('busca-objeto').value;
			var teste = document.getElementById('buscar');
			var urlBuscar = teste.getAttribute("data-urlBuscar");
			//idTeste = parseInt(Idobjeto);
			if (Idobjeto != "")
			{

				alert("URL: "+urlBuscar+"Id enviado: "+Idobjeto);
				$.ajax({
				url: urlBuscar,
				data: {Idobjeto: Idobjeto},
				type: "POST",
				datatype: "json",
				beforeSend: function(){
					//alert("Before");
				},
				success: function(mensagem){
					//alert("retorno: "+mensagem);
					if(mensagem == 1){

						alert("Nenhum registro com esse código!");

					}else if (mensagem == 0) {

						alert("Falha na requisição!");

					}else{

						dado = jQuery.parseJSON(mensagem);

						$('#nome-objeto').val(dado['nome']);
						$('#sobrenome-objeto').val(dado['sobrenome']);
						$('#idade-objeto').val(dado['idade']);
						$('#Aid-objeto').val(dado['id-objeto']);
					}
				},
				complete: function(){
					//alert("Complete");
				}
			});

			}else{
				alert("Digite um numero inteiro");
			}
		})
		// ==================== FIM =========================================
		$("#fatualizar").submit(function(e){
			e.preventDefault();

			var form = $('#fatualizar');
			alert(form);
			alert(form.attr("action"));
			$.ajax({
				url: form.attr("action"),
				data: form.serialize(),
				type: "POST",
				datatype: "json",
				beforeSend: function(){
					//alert("Before");
				},
				success: function(mensage){
					alert("retorno: "+mensage);
					if(mensage == 1){

						alert("Atualizado com sucesso!");

					}else{

						alert("Não fi possivel Atualizar!");
					}
				},
				complete: function(){
					//alert("Complete");
				}
			});
		});
	})
</script>