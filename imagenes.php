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
    $sql2 = "select imagen.codigo, imagen.nombre,imagen.ruta,categoria.nombre from imagen join categoria on imagen.codigoCategoria = categoria.codigo";
    
    $lista_select = $bd->buscar($sql);
    $lista_tabla = $bd->buscar($sql2);

    $bd->desconectar();


  ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-home"></i> Imagenes</h1>
            <p>Lista de imagenes</p>
          </div>
        </div>
        
        <div class = "row">

            <div class="col-md-8">
                <div class="tile">
                    <h3 class="tile-title">Registro de imágenes</h3>
                    <div class="tile-body">
                        <form action = "acciones.php?accion=imagen" method = "post" enctype="multipart/form-data">
                            <div class = "row">
                                <div class="form-group col-md-4">
                                    <label class="control-label">Nombre</label>
                                    <input class="form-control" type="text" name = "nombre" placeholder="Nombre imagen" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Imagen</label>
                                    <input class="form-control" type="file" name = "imagen" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Categoría</label>
                                    <select name="categoria" id="categoria" class = "form-control" aria-required required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <?php
                                            while ($fila = $bd->obtenerFila($lista_select)){
                                                    echo "<option value = '{$fila[0]}'>".$fila[1]."</option>";
                                            }
                                        ?>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="form-group col-md-4 align-self-end">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Adicionar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

        <div class = "row">
        
            <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Lista de imagenes</h3>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ruta</th>
                        <th>Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($fila1 = $bd->obtenerFila($lista_tabla)){
                                echo "<tr>";
                                    echo "<td>".$fila1[0]."</td>";
                                    echo "<td>".$fila1[1]."</td>";
                                    echo "<td>".$fila1[2]."</td>";
                                    echo "<td>".$fila1[3]."</td>";
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