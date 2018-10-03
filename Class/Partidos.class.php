<?php
class Partidos{
	private $id;
	private $idcuadros;
	private $resultados;

	
	private $tabela;
	private $conexion;
	//Sirve para conectar al banco de datos y especifica la clase que entra
	public function __construct(){
		$this->conexion = mysqli_connect(
		"127.0.0.1", "root", "","futbol")
		or die ("Error al conectar");
		$this->tabela = "partidos";
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
		(resultados)
		values($this->resultados)";
		$retorno = mysqli_query($this->
		conexion, $sql);
		return $retorno;
	}
	public function listar(){
		$sql = "SELECT * FROM $this->tabela";
		$retorno = mysqli_query($this->conexion, $sql);
		
		$arrayObj = NULL;
		while($res = mysqli_fetch_assoc($retorno)){
			$obj = new Partidos();
			$obj->id = $res["id"];
			$obj->idcuadros = $res["idcuadros"];
			$obj->resultados = $res["resultados"];
						
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
			$objeto = new Partidos();
			$objeto->id = $resultado['id'];
			$objeto->idcuadros = $resultado['idcuadros'];
			$objeto->resultados = $resultado['resultados'];
			
			$usuarioretornado = $objeto;
		}
		else{
			$usuarioretornado = null;
		}
		return $usuarioretornado;
		
		
	}
	
	public function editar(){
		$sql = "UPDATE $this->tabela SET
		resultados = $this->resultados,
		
		WHERE id = $this->id";
		$retorno = mysqli_query($this->conexion,
		$sql);
		return $retorno;
	}	
}

?>