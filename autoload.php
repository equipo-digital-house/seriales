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
require_once("clases/Serie.php");
require_once("clases/Question.php");
require_once("clases/Answer.php");

//Declaro mis variables
$host = "localhost";
$bd = "seriales_db";
$usuario = "root";
$password = "Blur0329";
$puerto = "3308";
$charset = "utf8mb4";

$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);


$validar = new Validador();
$registro = new ArmarRegistro();
//$json = new BaseJSON("usuarios.json");
Autenticador::iniciarSession();
