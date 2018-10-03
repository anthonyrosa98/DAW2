<?php
class Cuadros{
	private $id;
	private $idliga;
	private $nombre;
	private $estadio;
	private $puntos;

	
	private $tabela;
	private $conexion;
	//Sirve para conectar al banco de datos y especifica la clase que entra
	public function __construct(){
		$this->conexion = mysqli_connect(
		"127.0.0.1", "root", "","futbol")
		or die ("Error al conectar");
		$this->tabela = "cuadros";
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
		(nombre,estadio)
		values('$this->nombre','$this->estadio')";
		$retorno = mysqli_query($this->
		conexion, $sql);
		return $retorno;
	}
	public function listar(){
		$sql = "SELECT * FROM $this->tabela";
		$retorno = mysqli_query($this->conexion, $sql);
		
		$arrayObj = NULL;
		while($res = mysqli_fetch_assoc($retorno)){
			$obj = new Cuadros();
			$obj->id = $res["id"];
			$obj->nombre = $res["nombre"];
			$obj->estadio = $res["estadio"];
			
			
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
			$objeto = new Cuadros();
			$objeto->id = $resultado['id'];
			$objeto->nombre = $resultado['nombre'];
			$objeto->estadio = $resultado['estadio'];
			$objeto->puntos = $resultado['puntos'];
			
			$usuarioretornado = $objeto;
		}
		else{
			$usuarioretornado = null;
		}
		return $usuarioretornado;
		
		
	}
	
	public function editar(){
		$sql = "UPDATE $this->tabela SET
		nombre =' $this->nombre',
		estadio =' $this->estadio',
		
		WHERE id = $this->id";
		$retorno = mysqli_query($this->conexion,
		$sql);
		return $retorno;
	}
	public function excluir(){
		$sql = "DELETE FROM $this->tabela WHERE id=$this->id";
		$retorno = mysqli_query($this->conexion, $sql);
		return $retorno;
	}
	
}

?>