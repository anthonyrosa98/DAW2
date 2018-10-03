<?php
	include_once("../../class/Carregar.class.php");
	include_once("../../theme/topo.php");
	$objeto = new Usuario();
	$objeto->nombre = $_POST["nombre"];
	$objeto->email = $_POST["email"];
	$objeto->fechanacimiento = $_POST["fechanacimiento"];
	$objeto->sena = $_POST["sena"];
	$objeto->direccion = $_POST["direccion"];
	$objeto->id = $_POST["id"];
	$retorno = $objeto->editar();
	if($retorno)
		echo "Editado com sucesso";
	else
		echo "Não editado";
		include_once("../../theme/rodape.php");
	
?>