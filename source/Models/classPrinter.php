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


	public function buscar($id)
	{
		//$Idobjeto = intval($id);
		$nome = "%{$id}%";
		$con = (new classConnection())->connect();

		// $stmt = $con->prepare("SELECT numero_serie, modelo_impressora, marca_impressora, tombo_impressora, status_impressora, id_setor, regra_impressora FROM tab_impressora WHERE id_impressora > ?");

		// $stmt->bind_param("i", $Idobjeto);

		$stmt = $con->prepare("SELECT DISTINCT numero_serie, modelo_impressora, marca_impressora, tombo_impressora, status_impressora, id_setor, regra_impressora FROM tab_impressora WHERE numero_serie LIKE ?");

		$stmt->bind_param("s", $nome);

		if($stmt->execute()){
			$result = $stmt->get_result();
			if($result->num_rows > 0){

				//$row = $result->fetch_row();

				//Metodo normal FETCH-ASSOC();
				$row = $result->fetch_assoc();
				$i = 0;

				while ($i < $result->num_rows) {
					
					$dados[$i] = array(

						"numero_serie" => $row["numero_serie"],
						"modelo_impressora" => $row["modelo_impressora"],
						"marca_impressora" => $row["marca_impressora"],
						"tombo_impressora" => $row["tombo_impressora"],
						"status_impressora" => $row["status_impressora"],
						"id_setor" => $row["id_setor"],
						"regra_impressora" => $row["regra_impressora"]
						
					);

					$i += 1;

				}

				echo json_encode($dados);
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

}





?>