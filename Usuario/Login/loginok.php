<?php
	include_once("../../class/Carregar.class.php");
	session_start();
	$objeto = new Usuarios();
	$objeto->email = $_POST['email'];
	$objeto->sena = $_POST['sena'];
	
	$retorno = $objeto->login();
	if($retorno){
		
		$_SESSION["id"] = $retorno->id;
		$_SESSION[] = true;
		header("Location:../../Ligas/crearliga.php");
	}
	else{
		header("Location:login.php?msg=erro");
		
	}
?>