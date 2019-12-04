<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/style-list.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?= url("/theme/assets/fontawesome/css/all.css"); ?>">
<script src="<?= url("/theme/assets/jquery3.4.1.js"); ?>"></script>
<div id="container">
	<div class="container-body">
		<div class="row">
			<div class="style-pesquisa">
				<input class="input-pesquisa" id="input-pesquisa" placeholder="Digite o final do N° de Serie" required=""></input>
				<button class="button-pesquisa" id="button-pesquisa" onclick="buscarImpressoras()" data-urlBuscar="<?= $router->route("web.buscar"); ?>">Pesquisar<i class="far fa-search"></i></button>
			</div>
			<table border="1" class="style-table">
				<thead>
					<th>N° Serie</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Tombo</th>
					<th>Status</th>
					<th>Setor</th>
					<th>Regra</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<template id="template1">
				<tr class="body-tabela">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</template>
		</div>
	</div>
</div>
<script type="text/javascript">
	function buscarImpressoras(){
		    var Idobjeto = document.getElementById('input-pesquisa').value;
		    if(Idobjeto == ""){
		    	alert("Digite um Id Válido");
		    }else{

			var teste = document.getElementById('button-pesquisa');
			var urlBuscar = teste.getAttribute("data-urlBuscar");
			//alert("URL: "+urlBuscar+" ID: "+Idobjeto);
			idTeste = parseInt(Idobjeto);
			if (Number.isInteger(idTeste))
			{

				//alert("URL: "+urlBuscar+"Id enviado: "+idTeste);
				$.ajax({
				url: urlBuscar,
				data: {Idobjeto: idTeste},
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

						criarLinha(dado);
						// $('#nome-objeto').val(dado['nome']);
						// $('#sobrenome-objeto').val(dado['sobrenome']);
						// $('#idade-objeto').val(dado['idade']);
						// $('#Aid-objeto').val(dado['id-objeto']);
					}
				},
				complete: function(){
					//alert("Complete");
				}
			});

			}else{
				alert("Digite um numero inteiro");
			}
	   }
	}

	function criarLinha(dado){

		dado.forEach(function(e, i){

		console.log(i, e);
		})

		// var corpo_tabela = document.querySelector("tbody");
		// var template = document.querySelector("#template1");
		// var lista_td = template.content.querySelectorAll("td");
		// lista_td[0].textContent = dado['numero_serie'];
		// lista_td[1].textContent = dado['modelo_impressora'];
		// lista_td[2].textContent = dado['marca_impressora'];
		// lista_td[3].textContent = dado['tombo_impressora'];
		// lista_td[4].textContent = dado['status_impressora'];
		// lista_td[5].textContent = dado['id_setor'];
		// lista_td[6].textContent = dado['regra_impressora'];
		

		// var nova_linha = document.importNode(template.content, true);
		// corpo_tabela.appendChild(nova_linha);

	}
</script>