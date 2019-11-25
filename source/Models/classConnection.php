<?php 
namespace Source\Models;
use \PDO;

class classConnection 
{

    private $host, $user, $passwor, $bank;

    public function __construct(){

        $this->host     = BD_HOST;
        $this->user     = BD_USER;
        $this->password = BD_SENHA;
        $this->bank     = BD_BANCO;

        mysqli_connect($this->host, $this->user, $this->password, $this->bank);

    }


    public function connect()
    {

        $conexao = mysqli_connect($this->host, $this->user, $this->password, $this->bank);

        return $conexao;
    }


 }

?>