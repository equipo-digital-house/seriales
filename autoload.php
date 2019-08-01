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
<<<<<<< HEAD
$usuario = "root";
$password = "Blur0329";
$puerto = "3308";
=======
$user = "root";
$password = "root";
$puerto = "3306";
>>>>>>> 0c5367530abd0a4b0744d6cdc9504b8a99356bcd
$charset = "utf8mb4";

$pdo = BaseMYSQL::conexion($host,$bd,$user,$password,$puerto,$charset);


$validar = new Validador();
$registro = new ArmarRegistro();
//$json = new BaseJSON("usuarios.json");
Autenticador::iniciarSession();
