<?php 
namespace Source\Models;
use Source\Models\classConnection;

class classTeste
{
	
	public function getData()
	{
		$id = 0;
		$con = (new classConnection())->connect();

		$stmt = $con->prepare("SELECT nome_objeto, sobrenome_objeto, idade_objeto, id_objeto FROM tab_teste WHERE id_objeto > ?");

		$stmt->bind_param('i', $id);

		$stmt->execute();

		$result = $stmt->get_result();

		$stmt->close();

		return $result;
	}

	public function excluir(int $id): void
	{
		$ide = $id;
		$con = (new classConnection())->connect();

		$stmt = $con->prepare("DELETE FROM tab_teste WHERE id_objeto = ?");

		$stmt->bind_param('s', $ide);

		$stmt->execute();

	}

	public function criar(array $userData)
	{
		$nome = $userData["nome"];
		$sobrenome = $userData["sobrenome"];
		$idade = $userData["idade"];

		$con = (new classConnection())->connect();

		$stmt = $con->prepare("INSERT INTO tab_teste(nome_objeto, sobrenome_objeto, idade_objeto) VALUES(?, ?, ?)");

		$stmt->bind_param('sss', $nome, $sobrenome, $idade);

		if($stmt->execute()){
			
			echo json_encode(1);

			return;

		}else{

			echo json_encode(0);

			return;
		}
	}

	public function buscar($id)
	{
		$Idobjeto = intval($id);

		$con = (new classConnection())->connect();

		$stmt = $con->prepare("SELECT numero_serie, modelo_impressora, marca_impressora, tombo_impressora, status_impressora, id_setor, regra_impressora FROM tab_impressora WHERE id_impressora > ?");

		$stmt->bind_param("i", $Idobjeto);

		if($stmt->execute()){
			$result = $stmt->get_result();
			if($result->num_rows > 0){

				$row = $result->fetch_row();

				//Metodo normal FETCH-ASSOC();
				// $row = $result->fetch_assoc();
				// $dados = array(

				// 	"numero_serie" => $row["numero_serie"],
				// 	"modelo_impressora" => $row["modelo_impressora"],
				// 	"marca_impressora" => $row["marca_impressora"],
				// 	"tombo_impressora" => $row["tombo_impressora"],
				// 	"status_impressora" => $row["status_impressora"],
				// 	"id_setor" => $row["id_setor"],
				// 	"regra_impressora" => $row["regra_impressora"]
					
				// );

				echo json_encode($row);
				return;

			}else{

				echo json_encode(1);
				return;
			}

		}else{

			echo json_encode(0);
			return;
		}
		$stmt->close();
		$con->close();

	}


	public function atualizar(array $userData)
	{
		$nome = $userData["nome-objeto"];
		$sobrenome = $userData["sobrenome-objeto"];
		$idade = $userData["idade-objeto"];
		$id = $userData["Aid-objeto"];

		$con = (new classConnection())->connect();
		//UPDATE `tab_teste` SET `nome_objeto` = 'Teste 01', `sobrenome_objeto` = 'Teste 01', `idade_objeto` = '25' WHERE `tab_teste`.`id_objeto` = 6;


		$stmt = $con->prepare("UPDATE tab_teste SET nome_objeto = ?, sobrenome_objeto = ?, idade_objeto = ? WHERE id_objeto = ?");

		$stmt->bind_param('sssi', $nome, $sobrenome, $idade, $id);

		if($stmt->execute()){
			
			echo json_encode(1);

			return;

		}else{

			echo json_encode(0);

			return;
		}
	}
}