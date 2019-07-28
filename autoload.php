<?php
require_once("helpers.php");
require_once("clases/Usuario.php");
require_once("clases/Validador.php");
require_once("clases/ArmarRegistro.php");
require_once("clases/BaseDatos.php");
require_once("clases/Encriptar.php");
require_once("clases/Autenticador.php");
require_once("clases/BaseMYSQL.php");
require_once("clases/Query.php");
require_once("clases/PreguntaFrecuente.php");


//Declaro mis variables
$host = "localhost";
$bd = "seriales_db";
$usuario = "root";
<<<<<<< HEAD
$password = "aldana";
=======
$password = "root";
>>>>>>> 1bc85f69be903c4a631506ad413eeaf224f578f7
$puerto = "3306";
$charset = "utf8mb4";

$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);


$validar = new Validador();
$registro = new ArmarRegistro();
//$json = new BaseJSON("usuarios.json");
Autenticador::iniciarSession();
