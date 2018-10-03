<?php
session_start();
	include_once("../class/Carregar.class.php");
	
	$obj = new Ligas();
	$obj->idusuario = $_SESSION['idusuario'];
	$obj->nombre = $_POST["nombre"];

	$retorno = $obj->inserir();
	if($retorno)
		echo "Funciono";
	else
		echo "No funciono";
		


			

?>