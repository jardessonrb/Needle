<?php 


namespace Source\App;

use Source\Models\classTeste;
use League\Plates\Engine;


class Web
{

	private $view;


	public function __construct($router)
	{
		$this->view = Engine::create(__DIR__ ."/../../theme/views", "php");
		$this->view->addData(["router" => $router]);

	}


	public function paginaTeste(): void 
	{
		$result = (new classTeste())->getData();
		echo $this->view->render("pagina-teste", [
			"title" => SITE. " | Teste" , "result" => $result
		]);
	}

	public function create(array $data): void
	{
		$userData = filter_var_array($data, FILTER_SANITIZE_STRING);
		if(in_array("", $userData)){
			
			echo json_encode(0);

			return ;
		}

		$teste = new classTeste();

		echo $teste->criar($userData);
	}

	public function delete(array $data): void
	{
		$id = filter_var($data["id"], FILTER_VALIDATE_INT);
		//$id = ($data["id"]);

		$teste = new classTeste();

		$teste->excluir($id);

		echo json_encode("Deu Certo!");
	}

	public function buscar($Idobjeto): void
	{
		$id = $Idobjeto["Idobjeto"];
		$teste = new classTeste();

		$result = $teste->buscar($id);

		echo $result;
	}
	public function atualizar(array $data): void
	{
		$userData = filter_var_array($data, FILTER_SANITIZE_STRING);
		//$userData = $data;
		if(in_array("", $userData)){
			
			echo json_encode(3);

			return ;
		}

		$teste = new classTeste();

		echo $teste->atualizar($userData);
	}


	/*Funções de chamada de página - Direcionamento*/

	/*TELAS DE CADASTRO DO SISTEMA*/
	public function cadastroEmpresa(): void 
	{

		echo $this->view->render("cadastro-empresa", [
			"title" => SITE. " | Empresa" 
		]);
	}
	public function cadastroImpressora(): void 
	{

		echo $this->view->render("cadastro-impressora", [
			"title" => SITE. " | Impressora" 
		]);
	}
	public function cadastroPredio(): void 
	{

		echo $this->view->render("cadastro-predio", [
			"title" => SITE. " | Predio" 
		]);
	}
	public function cadastroSetor(): void 
	{

		echo $this->view->render("cadastro-setor", [
			"title" => SITE. " | Setor" 
		]);
	}
	
	/*======  FIM ======*/
	/*PAGINAS DE NAVEGAÇÃO*/
	public function home(): void 
	{

		echo $this->view->render("home", [
			"title" => SITE. " | Home" 
		]);
	}

	public function sobre(): void 
	{

		echo $this->view->render("sobre", [
			"title" => SITE. " | Sobre" 
		]);
	}

	public function error(array $data): void 
	{

		echo $this->view->render("error", [
			"title" => "Erro {$data["errcode"]} |" .SITE, "error" => $data["errcode"]
		]);
	}

	/*==== FIM - Funções de chamada de página - Direcionamento ===========*/

}