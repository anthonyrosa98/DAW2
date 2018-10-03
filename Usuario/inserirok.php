<?php

	include_once("../Class/Usuarios.class.php");
	
	
	$objUsuario = new Usuarios();
	
	$objUsuario->nombre = $_POST["nombre"];
	$objUsuario->email = $_POST["email"];
	$objUsuario->sena = $_POST["sena"];
	$retorno = $objUsuario->inserir();
	if($retorno)
		echo "Funciono";
	else
		echo "No funciono";
		
?>