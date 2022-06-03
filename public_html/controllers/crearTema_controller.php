<?php
session_start();

if(!isset($_SESSION["email"])){
	session_unset();
	session_destroy();
	header("Location: login_controller.php");
	die();
}

include_once "../db/db.php";
include_once "../models/crearTema_model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$titulo= $_POST["titulo-tema"];
	$contenidoComentario= $_POST["comentario"];
	$foroElegido= $_POST["foro-elegido"];

	if($titulo!=""&&$contenidoComentario!="") {
		insertarNuevoTema($conexion,$titulo,$contenidoComentario,$foroElegido);

		header("location: foro_controller.php");
	}
}
	
$foroElegido=$_GET['dato']; 
include_once "../views/crearTema_view.html";
?>