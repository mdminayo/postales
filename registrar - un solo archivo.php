<?php 
session_start();
if(isset($_POST['nombres'])){
    require_once("clases/Bd.php");

    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $fecha = $_POST["fecha"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    
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
            <form action = "registrar.php" method = "post">
              <div class = "row">
                <div class = "col-md-12 form-group">
                  <center>
                    <h3>Registro de usuarios</h3>
                    <label>Ingrese sus datos</label>
                  </center>
                  
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-6 form-group">
                  <input type="text" name="nombres" class = "form-control" placeholder="Nombres" required>
                </div>
                <div class = "col-md-6 form-group">
                  <input type="text" name="apellidos" class = "form-control" placeholder="Apellidos" required>
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-6 form-group">
                  <input type="email" name="email" class = "form-control" placeholder="Email" required>
                </div>
                <div class = "col-md-6 form-group">
                  <input type="date" name="fecha" class = "form-control" placeholder="Fecha nacimiento">
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-6 form-group">
                  <input type="text" name="usuario" class = "form-control" placeholder="Usuario" required>
                </div>
                <div class = "col-md-6 form-group">
                  <input type="password" name="contrasena" class = "form-control" placeholder="Contraseña" required>
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-6 form-group">
                  <input required type="submit" name="boton_registrar" value = "Registrar" class="btn btn-success">
                </div>
                <div class = "col-md-6 form-group">
                  <a href="login.php">
                    <input type="button" name="" value = "Inicio" class="btn btn-primary">
                  </a>
                </div>
              </div>
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
                    <?php
                }
              ?>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>