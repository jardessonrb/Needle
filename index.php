<?php


require __DIR__ . "/vendor/autoload.php";

$route = new \CoffeeCode\Router\Router(ROOT);



$route->namespace("Source\App");

/*

Rotas controller WEB - Home, Cadastro

*/
$route->group(null);
$route->get("/", "Web:home");
$route->get("/sobre", "Web:sobre");
$route->get("/cadastro-empresa", "Web:cadastroEmpresa");
$route->get("/cadastro-impressora", "Web:cadastroImpressora");
$route->get("/cadastro-predio", "Web:cadastroPredio");
$route->get("/cadastro-setor", "Web:cadastroSetor");

$route->get("/contagem-impressora", "Web:contagemImpressora");
$route->get("/contagem-mes", "Web:contagemMes");
$route->get("/contagem-pagina", "Web:contagemPagina");
$route->get("/pagina-usuario", "Web:paginaUsuario");
/*ROTAS REFERENTES À PÁGINA TESTE*/
$route->get("/pagina-teste", "Web:paginaTeste");
$route->post("/create", "Web:create", "web.create");
$route->post("/delete", "Web:delete", "web.delete");
$route->post("/buscar", "Web:buscar", "web.buscar");
$route->post("/atualizar", "Web:atualizar", "web.atualizar");

/*Rotas controller WEB - Error*/

$route->group("ops");
$route->get("/{errcode}", "Web:error");


$route->dispatch();


if ($route->error()) {
	$route->redirect("/ops/{$route->error()}");
}