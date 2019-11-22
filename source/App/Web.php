<?php 


namespace Source\App;


use League\Plates\Engine;


class Web
{

	private $view;


	public function __construct()
	{
		$this->view = Engine::create(__DIR__ ."/../../theme/views", "php");

	}


	public function home(): void 
	{

		echo $this->view->render("home", [
			"title" => SITE. " | Home" 
		]);
	}

	public function error(array $data): void 
	{

		echo $this->view->render("error", [
			"title" => "Erro {$data["errcode"]} |" .SITE, "error" => $data["errcode"]
		]);
	}

}