<?php
if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
}else{
  ?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Postales</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Main CSS-->
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/estilos.css">
      <!-- Font-icon css-->
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="app sidebar-mini rtl">
      <!-- Navbar-->
      <header class="app-header"><a class="app-header__logo" href="principal.php">Postales</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
          <img src="images/banner.jpg" class="card-img-top" style = " height:60px;">
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
          <!-- User Menu-->
          <li class="dropdown"><a class="app-nav__item nav-principal" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><strong><?php echo $_SESSION['nombres']; ?></strong></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Configuración</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
            </ul>
          </li>
        </ul>
      </header>
      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
      <aside class="app-sidebar">
        <ul class="app-menu">
          <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Principal</span></a></li>
          <li><a class="app-menu__item" href="enviadas.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Enviadas</span></a></li>
          <li><a class="app-menu__item" href="recibidas.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Recibidas</span></a></li>
          <li><a class="app-menu__item" href="categorias.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Categorías</span></a></li>
          <li><a class="app-menu__item" href="imagenes.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Imágenes</span></a></li>
        </ul>
      </aside>

      <!-- Essential javascripts for application to work-->
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <!-- <script src="js/plugins/pace.min.js"></script>-->
      <!-- Page specific javascripts-->
      <!-- Google analytics script-->
<?php
 }
?>