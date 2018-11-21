<?php
session_start(); 
//********************************** REGISTRAR IMAGENES ********************* */
if($_GET['accion']=='imagen'){
    require_once("clases/Bd.php");

    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];

    $path = $_FILES['imagen']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $random = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
    $imagen = $random.".".$ext;
    //$imagen_guardar = "recursos/".$imagen;
    if(is_uploaded_file($_FILES['imagen']['tmp_name']) && $_FILES['imagen']['error']=="0")
        {
            //$fecha = date("Y-m-d H:i:s");	
            move_uploaded_file($_FILES['imagen']['tmp_name'],"recursos/" .$imagen);				
        }

    
    $bd = new Bd();
    $bd->conectar();
    $bd->base('postales');
    
    $sql = "insert into imagen values('null','{$nombre}','{$imagen}','{$categoria}')";
    
    $mensaje = $bd->consulta($sql);
    $pagina = "Imagenes";
    $descripcion = "Lista de imágenes";
    $regresar = "imagenes.php";

    $bd->desconectar();

}
//*************************************************************************** */

//******************************REGISTRAR CATEGORIAS***************************/
elseif($_GET['accion']=='categoria'){
    require_once("clases/Bd.php");

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    
    $bd = new Bd();
    $bd->conectar();
    $bd->base('postales');
    
    $sql = "insert into categoria (nombre,descripcion) values('{$nombre}','{$descripcion}')";
    
    $mensaje = $bd->consulta($sql);
    $pagina = "Categorias";
    $descripcion = "Lista de categorias";
    $regresar = "categorias.php";

    $bd->desconectar();
}
//******************************************************************************* */
//******************************REGISTRAR COMPARTIR***************************/
elseif($_GET['accion']=='compartir'){
    require_once("clases/Bd.php");

    $nombre1 = $_POST["nombre1"];
    $email1 = $_POST["email1"];
    $nombre2 = $_POST["nombre2"];
    $email2 = $_POST["email2"];
    $mensaje = $_POST["mensaje"];
    $imagen = $_POST["imagen"];
    $fecha = date("Y-m-d H:i:s");
    $usuario = $_SESSION['usuario'];

    $bd = new Bd();
    $bd->conectar();
    $bd->base('postales');

    $sql_validar = "select * from usuario where email = '{$email2}'";
    $lista_validar = $bd->buscar($sql_validar);
    $cantidad = $bd->cantidad($lista_validar);
    if($cantidad >=1){
        $sql = "insert into postal values('null','{$fecha}','{$nombre1}','{$email1}','{$nombre2}','{$email2}','{$mensaje}','{$imagen}','{$usuario}')";
        $mensaje = $bd->consulta($sql);

        $sql_postal = "select * from postal order by codigo desc limit 1";

        $lista_postal = $bd->buscar($sql_postal);

        $fila_postal = $bd->obtenerFila($lista_postal);
        $mensaje = $mensaje."<br>La postál No.".$fila_postal[0]." ha sido enviada correctamente. Para ver su contenido presione <a target = '_blank' href = 'vermas.php?postal={$fila_postal[0]}'>AQUÍ</a>";
        
    }else{
        $mensaje = "El email del destinatario no está registrado";
    }
        
        $pagina = "Compartir postal";
        $descripcion = "Comparte postales con tus amigos";
        $regresar = "principal.php";

    


    $bd->desconectar();
}
//******************************************************************************* */




include("header.php");
?>
<main class="app-content">
    <div class="app-title">
        <div>
        <h1><i class="fa fa-home"></i> <?php echo $pagina;?></h1>
        <p><?php echo $descripcion;?></p>
        </div>
    </div>
    <div class = "alert alert-info">
        <?php echo $mensaje; ?><br><br>
        <a href="<?php echo $regresar;?>">
            <button class = "btn btn-success">Regresar</button>
        </a>
    </div>


</main>
<?php

include("footer.php");

?>
