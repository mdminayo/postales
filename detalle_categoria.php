<?php
session_start();
include ("header.php");
if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
}else{

  $categoria = $_GET['categoria'];
  require_once("clases/Bd.php");

  $bd = new Bd();
  $bd->conectar();
  $bd->base('postales');
  
  $sql = "select * from imagen where codigoCategoria = {$categoria}";
  $lista = $bd->buscar($sql);

  $sql2 = "select * from categoria where codigo = '{$categoria}'";
  $lista_categoria = $bd->buscar($sql2);
  $fila_categoria = $bd->obtenerFila($lista_categoria);


  ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-home"></i> <?= $fila_categoria[1]; ?></h1>
            <p><?= $fila_categoria[2]; ?></p>
          </div>
        </div>
        
        <div class = "row">

          <?php
              while ($fila = $bd->obtenerFila($lista)){
                ?>
                <div class = "col-md-3" style = "margin-bottom:20px;">
                  <a href="compartir.php?imagen=<?= $fila[0]; ?>">
                    <div class="card" style = "padding-top:20px;">
                        <center><img class="card-img-top" style = "width:200px; height:200px;" src="<?= 'recursos/'.$fila[2];?>" alt="Card image cap"></center>
                        <div class="card-body">
                        <center><a href="compartir.php?imagen=<?= $fila[0]; ?>" class="btn btn-primary">Compartir</a></center>
                        </div>
                    </div>
                  </a>
                </div>
                <?php
              }
          ?>
          </div>
      </main>
<?php
  $bd->desconectar();
 }
?>
<?php include ("footer.php")?>