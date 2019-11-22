<?php


require __DIR__ . "/vendor/autoload.php";

$route = new \CoffeeCode\Router\Router(ROOT);



$route->namespace("Source\App");

/*

Rotas controller WEB - Home, Cadastro

*/
$route->group(null);
$route->get("/", "Web:home");

/*Rotas controller WEB - Error*/

$route->group("ops");
$route->get("/{errcode}", "Web:error");


$route->dispatch();


if ($route->error()) {
	$route->redirect("/ops/{$route->error()}");
}