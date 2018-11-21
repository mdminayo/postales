<?php 
session_start();

require_once("clases/Bd.php");

$usuario = $_POST["usuario"];
$contrasena = md5($_POST["contrasena"]);

$bd = new Bd();
$bd->conectar();
$bd->base('postales');

$sql = "select * from usuario where usuario = '{$usuario}' and clave = '{$contrasena}'";

$cantidad = $bd->validar_usuario($sql);


if($cantidad == '1'){
    $lista_usuarios = $bd->buscar($sql);
    $fila = $bd->obtenerFila($lista_usuarios);
    
    $nombres = $fila[0]." ".$fila[1];
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nombres'] = $fila[2]." ".$fila[3];
    $bd->desconectar();
    header('Location: principal.php');
}else{
    header('Location: login.php');
    $bd->desconectar();
}

?>