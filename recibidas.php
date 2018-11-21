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
    $sql_usuario = "select email from usuario where usuario = '{$usuario}'";
    $lista_usuario = $bd->buscar($sql_usuario);
    $fila_usuario = $bd->obtenerFila($lista_usuario);
    $email = $fila_usuario[0];
    
    $sql = "select * from postal where emailDestinatario = '{$email}' order by fechaEnvio desc";
    
    $lista = $bd->buscar($sql);
    $cantidad = $bd->cantidad($lista);

    $bd->desconectar();


  ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-home"></i> Postales recibidas</h1>
            <p>Lista de postales recibidas</p>
          </div>
        </div>
        <div class = "row">
        
            <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Lista de postales recibidas</h3>
                <?php
                    if($cantidad == 0){
                        ?>
                        <div class = "alert alert-warning">No ha recibido postales.</div>
                        <?php
                    }else{
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Postal</th>
                                    <th>Fecha</th>
                                    <th>Nombre remitente</th>
                                    <th>Email remitente</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($fila = $bd->obtenerFila($lista)){
                                            echo "<tr>";
                                                echo "<td>".$fila[0]."</td>";
                                                echo "<td>".$fila[1]."</td>";
                                                echo "<td>".$fila[2]."</td>";
                                                echo "<td>".$fila[3]."</td>";
                                                echo "<td><a href='vermas.php?postal={$fila[0]}'>Ver más...</a></td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    }
                ?>
                
                
            </div>
            </div>        
        
        </div>



      </main>
      
<?php
 }
?>
<?php include ("footer.php")?>