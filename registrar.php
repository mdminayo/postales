<?php 
session_start();
if(isset($_POST['nombres'])){
    require_once("clases/Bd.php");

    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $fecha = $_POST["fecha"];
    $usuario = $_POST["usuario"];
    $contrasena = md5($_POST["contrasena"]);
    
    $bd = new Bd();
    $bd->conectar();
    $bd->base('postales');
    
    $sql = "insert into usuario values('{$usuario}','{$contrasena}','$nombres','$apellidos','{$email}','{$fecha}')";
    
    $mensaje = $bd->consulta($sql);

    $bd->desconectar();
}


?>





<html>
<meta charset="utf-8">
  <head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
  </head>
  <body id="LoginForm">
    <div class="container-fluid">
      <div class="login-form">
        <div class = "row">
          <div class = "col-md-5 col-sm-6 col-xs-8 formulario">
            <?php
                if(isset($mensaje)){
                    ?>
                    <div class = "row">
                        <div class = "col-md-12 form-group">
                        <div class = "alert alert-info">
                            <?php echo $mensaje; ?>
                        </div>
                        </div>
                    </div>
                    <div class = "row">
                            <div class = "col-md-6 form-group">
                                <a href="login.php">
                                    <input type="button" name="" value = "Inicio" class="btn btn-primary">
                                </a>
                            </div>
                            <div class = "col-md-6 form-group">
                                <a href="form_registrar.php">
                                    <input type="button" name="" value = "Registrar" class="btn btn-success">
                                </a>
                            </div>
                    </div>
                    <?php
                }
              ?>
          </div>
          
        </div>
      </div>
    </div>
  </body>
</html>