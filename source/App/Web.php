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

	public function create(array $data): void
	{
		$callback["data"] = $data;
		echo json_encode($data);
	}

	public function delete(array $data): void
	{
		$id = ($data["id"]);
		$teste = new classTeste();

		$teste->excluir($id);
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
	public function paginaTeste(): void 
	{
		$result = (new classTeste())->getData();
		echo $this->view->render("pagina-teste", [
			"title" => SITE. " | Teste" , "result" => $result
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