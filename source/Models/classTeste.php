<?php 
namespace Source\Models;
use Source\Models\classConnection;

class classTeste
{
	
	public function getData()
	{
		$id = 1;
		$con = (new classConnection())->connect();

		$stmt = $con->prepare("SELECT nome_objeto, sobrenome_objeto, idade_objeto, id_objeto FROM tab_teste WHERE id_objeto > ?");

		$stmt->bind_param('i', $id);

		$stmt->execute();

		$result = $stmt->get_result();

		$stmt->close();

		return $result;
	}

	public function excluir($id): void
	{
		$ide = $id;
		$con = (new classConnection())->connect();

		$stmt = $con->prepare("DELETE FROM `tab_teste` WHERE `tab_teste`.`id_objeto` = ?");

		$stmt->bind_param('s', $ide);

		$stmt->execute();

	}
}