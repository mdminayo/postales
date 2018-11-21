<?php
/**
 * 
 */
class Bd {
	public $host;
	public $nombredb;
	public $usuario;
	public $contrasena;
	public $conexion;
	public $puerto;	
	public $sql;	
	public $consulta;
	public $error;	

	public function __construct($host='localhost',$nombredb='postales',$pusuario='root',$contrasena='',$puerto='3306') {
		$this->host=$host;
		$this->nombredb=$nombredb;
		$this->usuario=$pusuario;
		$this->contrasena=$contrasena;		
		$this->puerto=$puerto;
		
	}
	public function conectar(){
			$this->conexion = mysqli_connect($this->host,$this->usuario,$this->contrasena);
            if($this->conexion == false) {
		    echo "No se pudo conectar a la base de datos";
		  exit();
		}
	}
	public function base($base){
			$this->base = $base;
			mysqli_select_db($this->conexion,$this->base);
	}
	public function cantidad($lista){
			$this->cantidad = mysqli_num_rows($lista);
			return $this->cantidad;
	}
	public function obtenerFila($lista){
			$this->lista = $lista;
			$this->fila = mysqli_fetch_array($this->lista);
			return $this->fila;
	}
	public function consulta($sql){
		$this->sql = $sql;
		$mensaje = "";
		$this->consulta = mysqli_query($this->conexion,$this->sql);
		       if (!$this->consulta) {
		       		$mensaje = $mensaje. mysqli_errno($this->conexion)."<br>";
		       		$mensaje = $mensaje. mysqli_error($this->conexion)."<br>";
      				 $this->error = mysqli_errno($this->conexion);
      				 if ($this->error == 1451){
						$mensaje = $mensaje. "El registro esta siendo utilizado en una o varias tablas mas<br>";
      				 }else if ($this->error == 1062){
						$mensaje = $mensaje. "Ya se encuentra un registro con la misma identificacion en la base de datos<br>";
					   }
					   else if ($this->error == 1046){
						$mensaje = $mensaje. "No ha seleccionado una base de datos<br>";
					}
				}else{
					$mensaje = $mensaje. "Operacion realizada con éxito";
				}
		return $mensaje;
		
	}
	public function buscar($sql){
		$this->sql = $sql;
		$this->consulta = mysqli_query($this->conexion,$this->sql);
		return $this->consulta;
	}
	public function validar_usuario($sql){
		$this->consulta = mysqli_query($this->conexion,$sql);
		$this->cantidad = mysqli_num_rows($this->consulta);
		return $this->cantidad;
	}

	public function comenzarTransaccion(){			
			mysqli_autocommit($this->conexion, FALSE);			
	}   
	public function confirmarTransaccion(){
			mysqli_commit($this->conexion);
	}
	public function regresarTransaccion(){
			mysqli_rollback($this->conexion);
	}    
    public function desconectar(){
    	mysqli_close($this->conexion);
    }			
}

    
?>