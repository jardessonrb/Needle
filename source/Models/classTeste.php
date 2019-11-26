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

		$stmt = $con->prepare("SELECT nome_objeto, sobrenome_objeto, idade_objeto, id_objeto FROM tab_teste WHERE id_objeto = ?");

		$stmt->bind_param("i", $Idobjeto);

		if($stmt->execute()){
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$dados = array(

				"nome" => $row["nome_objeto"],
				"sobrenome" => $row["sobrenome_objeto"],
				"idade" => $row["idade_objeto"]

			);

			echo json_encode($dados);
			return;

		}else{

			echo json_encode(0);
			return;
		}


	}
}