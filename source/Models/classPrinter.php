<?php 
namespace Source\Models;
use Source\Models\classConnection;


class classPrinter
{

	public function create(array $printerData)
	{

		$modelo   = $printerData["modelo_printer"];
		$idSetor  = intval($printerData["setor_printer"]);
		$numSerie = $printerData["numSerie_printer"];
		$marca    = $printerData["marca_printer"];
		$tombo    = intval($printerData["tombo_printer"]);
		$status   = $printerData["status_printer"];
		$regra    = floatval($printerData["regra_printer"]);

		$con = (new classConnection())->connect();

		$stmt = $con->prepare("INSERT INTO tab_impressora(numero_serie, modelo_impressora, marca_impressora, tombo_impressora, status_impressora, id_setor, regra_impressora) VALUES (?,?,?,?,?,?,?)");

		$stmt->bind_param('sssisid', $numSerie, $modelo, $marca, $tombo, $status, $idSetor, $regra);


		if($stmt->execute()){
			
			echo json_encode(1);

			return;

		}else{

			echo json_encode(0);

			return;
		}


	}

}





?>