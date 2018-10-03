<?php
class Jugadorcuadro{
	private $id;
	private $idcuadro;
	private $idjugador;
	private $fechainicio;
	private $fechasalida;

	
	private $tabela;
	private $conexion;
	//Sirve para conectar al banco de datos y especifica la clase que entra
	public function __construct(){
		$this->conexion = mysqli_connect(
		"127.0.0.1", "root", "","futbol")
		or die ("Error al conectar");
		$this->tabela = "jugadorcuadro";
	}
	//Desconecta del banco
	public function __destruct(){
		unset($this->link);
	}
	//pregunta los valores en el banco y las captura del campo que esta pidiendo
	public function __get($key){
		return $this->$key;
	}
	//cambia los valores de un atributo
	public function __set($key, $value){
		$this->$key = $value;
	}
	
	public function inserir(){
		$sql = "INSERT INTO $this->tabela
		(fechainicio,fechasalida)
		values('$this->fechainicio','$this->fechasalida')";
		$retorno = mysqli_query($this->
		conexion, $sql);
		return $retorno;
	}
	public function listar(){
		$sql = "SELECT * FROM $this->tabela";
		$retorno = mysqli_query($this->conexion, $sql);
		
		$arrayObj = NULL;
		while($res = mysqli_fetch_assoc($retorno)){
			$obj = new Jugadorcuadro();
			$obj->id = $res["id"];
			$obj->idcuadro = $res["idcuadro"];
			$obj->idjugador = $res["idjugador"];
			$obj->fechainicio = $res["fechainicio"];
			$obj->fechasalida = $res["fechasalida"];
			
			
			$arrayObj[] = $obj;
			
		}
		return $arrayObj;
	}
	public function retornarUnico(){
		$sql ="SELECT * FROM 
		$this->tabela where id=$this->id";
		$retorno = mysqli_query($this->conexion, $sql);
		$resultado = mysqli_fetch_assoc($retorno);
		if($resultado){
			$objeto = new Jugadorcuadro();
			$objeto->id = $res["id"];
			$objeto->idcuadro = $res["idcuadro"];
			$objeto->idjugador = $res["idjugador"];
			$objeto->fechainicio = $res["fechainicio"];
			$objeto->fechasalida = $res["fechasalida"];
			
			$usuarioretornado = $objeto;
		}
		else{
			$usuarioretornado = null;
		}
		return $usuarioretornado;
		
		
	}
	
}

?>