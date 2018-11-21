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
    $postal = $_GET['postal'];
    
    $sql_postal = "select * from postal where codigo = '{$postal}'";
    $lista_postal = $bd->buscar($sql_postal);
    $cantidad = $bd->cantidad($lista_postal);
    $fila_postal = $bd->obtenerFila($lista_postal);
    $imagen = $fila_postal[7];
    $sql_imagen = "select * from imagen where codigo = '{$imagen}' limit 1";
    $lista_imagen = $bd->buscar($sql_imagen);
    $fila_imagen = $bd->obtenerFila($lista_imagen);

    $bd->desconectar();

  ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-home"></i> Detalle postal</h1>
            <p>Descripción detalle postal</p>
          </div>
        </div>
        
        <div class = "row">

            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Detalle postal</h3>
                    <div class="tile-body">
                        <?php
                        if($cantidad != 0){
                            ?>
                            <div class = "row">
                                <div class = "col-md-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                    echo "<tr><td>Postal N°</td><td>".$fila_postal[0]."</td></tr>";
                                                    echo "<tr><td>Fecha envío</td><td>".$fila_postal[1]."</td></tr>";
                                                    echo "<tr><td>Nombre remitente</td><td>".$fila_postal[2]."</td></tr>";
                                                    echo "<tr><td>Email remitente</td><td>".$fila_postal[3]."</td></tr>";
                                                    echo "<tr><td>Nombre destinatario</td><td>".$fila_postal[4]."</td></tr>";
                                                    echo "<tr><td>Email destinatario</td><td>".$fila_postal[5]."</td></tr>";
                                                    echo "<tr><td>Mensaje</td><td>".$fila_postal[6]."</td></tr>";
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                    <div class="card">
                                        <center><label class="control-label" style = "font-weight:bold;">Imagen seleccionada</label></center>
                                        <center><img class="card-img-top" style = "width:200px; height:200px;" src="<?= 'recursos/'.$fila_imagen[2];?>" alt="Card image cap"></center>
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class = "row">
                                <div class = "col-md-8 alert alert-warning">La postal ingresada no existe.</div>
                            </div>
                            <?php
                        }   
                        ?> 
                            

                    </div>
                </div>
            </div>
        </div>
      </main>
      
<?php
 }
?>
<?php include ("footer.php")?>
