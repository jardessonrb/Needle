<?php $v->layout("_theme"); ?>
<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/style-list.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?= url("/theme/assets/fontawesome/css/all.css"); ?>">
<script src="<?= url("/theme/assets/jquery3.4.1.js"); ?>"></script>
<div id="container">
	<div class="container-body">
		<div class="row">
			<div class="style-pesquisa">
				<input class="input-pesquisa" id="input-pesquisa" placeholder="Digite o número de Série da impressora" required="" onblur="teste()"></input>
				<button class="button-pesquisa" id="button-pesquisa" onclick="buscarImpressoras()" data-urlBuscar="<?= $router->route("web.buscar"); ?>">Pesquisar<i class="far fa-search"></i></button>
			</div>
			<table id="id_table" class="style-table">
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
// $('#input-pesquisa').keyup(function(){
// 	setTimeout('funcao()', 3000);
// 	alert("Ok");
// 	buscarImpressoras();
// });

// var typingTimer; //timer identifier
// var doneTypingInterval = 1000;
// $('#input-pesquisa').keyup(function() {
//   clearTimeout(typingTimer);
//   if ($('#input-pesquisa').val) {
//     typingTimer = setTimeout(doneTyping, doneTypingInterval);
//   }
// });

// //user is "finished typing," do something
// function doneTyping() {
//   buscarImpressoras();
// }


/*FUNÇÃO INICIAL, PEGA O VALOR DO INPUT E FAZ A INTERAÇÃO COM O BANCO POR AJAX*/

function buscarImpressoras(){
    var Idobjeto = document.getElementById('input-pesquisa').value;

    if(Idobjeto == ""){

    	alert("Digite um Id Válido");

    }else{

		var teste = document.getElementById('button-pesquisa');
		var urlBuscar = teste.getAttribute("data-urlBuscar");
		

		//alert("URL: "+urlBuscar+"Id enviado: "+Idobjeto);
		$.ajax({
		url: urlBuscar,
		data: {nomeLike: Idobjeto},
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
			}
		},

		complete: function(){

			//alert("Complete");
		}


	   });
	}
}
/*FUNÇÃO QUE ALIMENTA A TABELA COM OS DADOS DO BANCO*/

function criarLinha(dado){
	//console.log(Object.keys(dado).length);
	var max = Object.keys(dado).length;
	var i = 0;
	var c = 0;
	var corpo_tabela = document.querySelector("tbody");
	var template = document.querySelector("#template1");
	var lista_td = template.content.querySelectorAll("td");
	var nova_linha;

	for (var j = 0; j < lista_td.length; j++) {
		lista_td[j] != "";
		c += 1;
	}

	if (c == 0) {


		while(i < max){

			lista_td[0].textContent = dado[i]['numero_serie'];
			lista_td[1].textContent = dado[i]['modelo_impressora'];
			lista_td[2].textContent = dado[i]['marca_impressora'];
			lista_td[3].textContent = dado[i]['tombo_impressora'];
			lista_td[4].textContent = dado[i]['status_impressora'];
			lista_td[5].textContent = dado[i]['id_setor'];
			lista_td[6].textContent = dado[i]['regra_impressora'];
			

			nova_linha = document.importNode(template.content, true);
			corpo_tabela.appendChild(nova_linha);

			i += 1;

		}

	}else{

		var table = $('#id_table').find('tbody');
		table.empty();


		while(i < max){

			lista_td[0].textContent = dado[i]['numero_serie'];
			lista_td[1].textContent = dado[i]['modelo_impressora'];
			lista_td[2].textContent = dado[i]['marca_impressora'];
			lista_td[3].textContent = dado[i]['tombo_impressora'];
			lista_td[4].textContent = dado[i]['status_impressora'];
			lista_td[5].textContent = dado[i]['id_setor'];
			lista_td[6].textContent = dado[i]['regra_impressora'];
			

			nova_linha = document.importNode(template.content, true);
			corpo_tabela.appendChild(nova_linha);

			i += 1;

		}
	}

}
</script>