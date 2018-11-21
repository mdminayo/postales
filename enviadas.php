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
    $usuario = $_SESSION['usuario'];
    
    $sql = "select * from postal where usuario = '{$usuario}' order by fechaEnvio desc";
    
    $lista = $bd->buscar($sql);

    $bd->desconectar();


  ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-home"></i> Postales enviadas</h1>
            <p>Lista de postales enviadas</p>
          </div>
        </div>
        <div class = "row">
        
            <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Lista de postales enviadas</h3>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Postal</th>
                        <th>Fecha</th>
                        <th>Nombre destinatario</th>
                        <th>Email destinatario</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($fila = $bd->obtenerFila($lista)){
                                echo "<tr>";
                                    echo "<td>".$fila[0]."</td>";
                                    echo "<td>".$fila[1]."</td>";
                                    echo "<td>".$fila[4]."</td>";
                                    echo "<td>".$fila[5]."</td>";
                                    echo "<td><a href='vermas.php?postal={$fila[0]}'>Ver más...</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>        
        
        </div>



      </main>
      
<?php
 }
?>
<?php include ("footer.php")?>