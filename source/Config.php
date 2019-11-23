<?php
// DEFINIÇÕES DO SISTEMA
define("ROOT", "https://localhost/Needle");
define("SITE", "Needle");
define("CREATOR", "Járdesson");

// CONFIG DO DE CONEXÃO

define("BD_HOST", "localhost");
define("BD_USER", "root");
define("BD_SENHA", "");
define("BD_BANCO", "dbo_printer");
        
// DATA_LAYER_CONFIG
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "dbo_printer",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/**
 * @param string|null $uri
 * @return string
 */
function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}