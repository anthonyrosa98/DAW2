<?php
class Usuarios{
	private $id;
	private $nombre;
	private $email;
	private $sena;

	
	private $tabela;
	private $conexion;
	//Sirve para conectar al banco de datos y especifica la clase que entra
	public function __construct(){
		$this->conexion = mysqli_connect(
		"127.0.0.1", "root", "","futbol")
		or die ("Error al conectar");
		$this->tabela = "usuarios";
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
		(nombre,email,sena)
		values('$this->nombre','$this->email','$this->sena')";
		$retorno = mysqli_query($this->
		conexion, $sql);
		return $retorno;
	
	}
	
	public function listar(){
		$sql = "SELECT * FROM $this->tabela";
		$retorno = mysqli_query($this->conexion, $sql);
		
		$arrayObj = NULL;
		while($res = mysqli_fetch_assoc($retorno)){
			$obj = new Usuarios();
			$obj->id = $res["id"];
			$obj->nombre = $res["nombre"];
			$obj->email = $res["email"];
			$obj->sena = $res["sena"];
			
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
			$objeto = new Usuarios();
			$objeto->id = $resultado['id'];
			$objeto->nombre = $resultado['nombre'];
			$objeto->email = $resultado['email'];
			$objeto->sena = $resultado['sena'];
			
			$usuarioretornado = $objeto;
		}
		else{
			$usuarioretornado = null;
		}
		return $usuarioretornado;
		
		
	}
	
	
	public function login(){
		$sql ="SELECT * FROM 
		$this->tabela where email='$this->email' and sena='$this->sena'";
		$retorno = mysqli_query($this->conexion, $sql);
		$resultado = mysqli_fetch_assoc($retorno);
		if($resultado){
			$objeto = new Usuarios();
			$objeto->id = $resultado['id'];			
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
		email =' $this->email',
		sena =' $this->sena',
		
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