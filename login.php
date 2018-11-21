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
            <form action = "autenticacion.php" method = "post">
              <div class = "row">
                <div class = "col-md-12 form-group">
                  <center>
                    <h3>Autenticación de usuarios</h3>
                    <label>Ingrese usuario y contraseña</label>
                  </center>
                  
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-12 form-group">
                  <input type="text" name="usuario" class = "form-control" placeholder="Usuario" required>
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-12 form-group">
                  <input type="password" name="contrasena" class = "form-control" placeholder="Contraseña" required>
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-6 form-group">
                  <input type="submit" name="" value = "Ingresar" class="btn btn-primary">
                </div>
                
                <div class = "col-md-6 form-group">
                  <a href="form_registrar.php">
                    <input type="button" name="" value = "Registrar" class="btn btn-success">
                  </a>
                </div>
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>