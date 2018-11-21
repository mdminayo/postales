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

    $bd->desconectar();


  ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-home"></i> Categorías</h1>
            <p>Lista de categorías</p>
          </div>
        </div>
        
        <div class = "row">

            <div class="col-md-8">
                <div class="tile">
                    <h3 class="tile-title">Registro nueva categoría</h3>
                    <div class="tile-body">
                    <form class="row" action = "acciones.php?accion=categoria" method = "post">
                        <div class="form-group col-md-3">
                        <label class="control-label">Nombre</label>
                        <input class="form-control" type="text" name = "nombre" placeholder="Nombre categoría" required>
                        </div>
                        <div class="form-group col-md-3">
                        <label class="control-label">Descripción</label>
                        <input class="form-control" type="text" name = "descripcion" placeholder="Descripción categoría" required>
                        </div>
                        <div class="form-group col-md-4 align-self-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Adicionar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


        </div>

        <div class = "row">
        
            <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Lista de categorias</h3>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($fila = $bd->obtenerFila($lista)){
                                echo "<tr>";
                                    echo "<td>".$fila[0]."</td>";
                                    echo "<td>".$fila[1]."</td>";
                                    echo "<td>".$fila[2]."</td>";
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