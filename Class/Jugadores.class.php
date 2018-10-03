<?php
class Jugadores{
	private $idcuadro;
	private $id;
	private $nombre;
	private $fechanacimiento;
	private $gol;

	
	private $tabela;
	private $conexion;
	//Sirve para conectar al banco de datos y especifica la clase que entra
	public function __construct(){
		$this->conexion = mysqli_connect(
		"127.0.0.1", "root", "","futbol")
		or die ("Error al conectar");
		$this->tabela = "jugadores";
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
		(idcuadro,nombre,fechanacimiento)
		values($this->idcuadro,'$this->nombre','$this->estadio')";
		$retorno = mysqli_query($this->
		conexion, $sql);
		return $retorno;
	}
	public function listar(){
		$sql = "SELECT * FROM $this->tabela";
		$retorno = mysqli_query($this->conexion, $sql);
		
		$arrayObj = NULL;
		while($res = mysqli_fetch_assoc($retorno)){
			$obj = new Jugadores();
			$obj->idcuadro = $res["idcuadro"];
			$obj->id = $res["id"];
			$obj->nombre = $res["nombre"];
			$obj->fechanacimiento = $res["fechanacimiento"];
			$obj->gol = $res["gol"];
			
			
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
			$objeto = new Jugadores();
			$obj->idcuadro = $res["idcuadro"];
			$obj->id = $res["id"];
			$obj->nombre = $res["nombre"];
			$obj->fechanacimiento = $res["fechanacimiento"];
			$obj->gol = $res["gol"];
			
			$usuarioretornado = $objeto;
		}
		else{
			$usuarioretornado = null;
		}
		return $usuarioretornado;
		
		
	}
	
	}
	public function excluir(){
		$sql = "DELETE FROM $this->tabela WHERE id=$this->id";
		$retorno = mysqli_query($this->conexion, $sql);
		return $retorno;
	}
	
}

?>