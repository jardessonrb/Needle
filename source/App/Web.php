<?php 


namespace Source\App;

use Source\Models\classTeste;
use Source\Models\classPrinter;
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

	/*FUNÇÕES DE INTERAÇÃO COM BANCO DE DADOS*/

	public function create(array $data): void
	{
		$printerData = filter_var_array($data, FILTER_SANITIZE_STRING);
		if(in_array("", $printerData)){
			
			echo json_encode(0);

			return ;
		}

		//$teste = new classTeste();
		$printer = new classPrinter();

		//echo $teste->criar($userData);
		echo $printer->create($printerData);
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
	/*FIM DAS FUNÇÕES DE INTERAÇÃO COM O BANCO*/

	/*Funções de chamada de página - Direcionamento*/
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

	public function contagemImpressora(): void 
	{

		echo $this->view->render("contagem-impressora", [
			"title" => SITE. " | contagem-impressora" 
		]);
	}

	public function contagemMes(): void 
	{

		echo $this->view->render("contagem-mes", [
			"title" => SITE. " | contagem-mes" 
		]);
	}

	public function contagemPagina(): void 
	{

		echo $this->view->render("contagem-pagina", [
			"title" => SITE. " | contagem-pagina" 
		]);
	}

	public function paginaUsuario(): void 
	{

		echo $this->view->render("pagina-usuario", [
			"title" => SITE. " | pagina-usuario" 
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