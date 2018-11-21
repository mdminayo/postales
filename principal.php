<?php
session_start();
include ("header.php");
if(!isset($_SESSION['usuario'])){
  header('Location: login.php');
}else{

  require_once("clases/Bd.php");

  $bd = new Bd();
  $bd->conectar();
  $bd->base('postales');
  
  $sql = "select * from categoria";
  
  $lista = $bd->buscar($sql);

  





  ?>

      <main class="app-content">
        <div class="app-title">
          <div class = "align-items-end">
            <h1><i class="fa fa-home"></i> Principal</h1>
            <p>Encuentra tu postal ideal</p>
          </div>
          <div>
            <form action="vermas.php" method = "get">
              <input type="text" name = "postal" placeholder = "Digite postal">
              <input type="submit" class = "btn btn-primary" value = "Buscar">
            </form>
            
          </div>
        </div>
        
        <div class = "row">

          <?php
              while ($fila = $bd->obtenerFila($lista)){
                $categoria = $fila[0];
                $sql2 = "select ruta from imagen where codigoCategoria = {$categoria} order by RAND() limit 1";
                $lista_imagenes = $bd->buscar($sql2);
                $fila_imagenes = $bd->obtenerFila($lista_imagenes);
                ?>
                <div class = "col-md-3" style = "margin-bottom:20px;">
                  <a href="detalle_categoria.php?categoria=<?=$fila[0] ?>">
                    <div class="card" style = "padding-top:20px;">
                      <center><img class="card-img-top" style = "width:200px; height:200px;" src="<?= 'recursos/'.$fila_imagenes[0];?>" alt="Card image cap"></center>
                      <div class="card-body">
                        <center><a href="detalle_categoria.php?categoria=<?=$fila[0] ?>" class="btn btn-primary"><?=$fila[1]; ?></a></center>
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