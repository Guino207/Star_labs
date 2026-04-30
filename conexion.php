<?php
$servidor = "localhost";
$usuario = "root";          
$senha = "mysql123";         
$banco = "ADM";

$c = new mysqli($servidor, $usuario, $senha, $banco);

if ($c->connect_error) {
    die("Erro: " . $c->connect_error);
}else{
    $mensagem = "";
}



error_reporting(E_ALL);
ini_set('display_errors', 1);