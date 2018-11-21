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
    $imagen = $_GET['imagen'];
    
    $sql = "select * from imagen where codigo = '{$imagen}' limit 1";
    $lista = $bd->buscar($sql);
    $fila = $bd->obtenerFila($lista);

    $bd->desconectar();

  ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-home"></i> Compartir postal</h1>
            <p>Comparte postales con tus amigos</p>
          </div>
        </div>
        
        <div class = "row">

            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Completa el siguiente formulario</h3>
                    <div class="tile-body">
                        <form action = "acciones.php?accion=compartir" method = "post" enctype="multipart/form-data">
                            
                            <div class = "row">
                                <div class = "col-md-8">
                                    <div class = "row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Nombre remitente</label>
                                            <input class="form-control" type="text" name = "nombre1"  required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Email remitente</label>
                                            <input class="form-control" type="email" name = "email1" required>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Nombre destinatario</label>
                                            <input class="form-control" type="text" name = "nombre2" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Email destinatario</label>
                                            <input class="form-control" type="email" name = "email2" required>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12 form-group">
                                            <label class="control-label">Mensaje</label>
                                            <textarea name="mensaje" id="mensaje" cols="" rows="3" class = "form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="form-group col-md-4 align-self-end">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Compartir</button>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                    <div class="card">
                                        <center><label class="control-label" style = "font-weight:bold;">Imagen seleccionada</label></center>
                                        <center><img class="card-img-top" style = "width:200px; height:200px;" src="<?= 'recursos/'.$fila[2];?>" alt="Card image cap"></center>
                                        <input type="hidden" name = 'imagen' value = "<?=$fila[0] ?>">
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </main>
      
<?php
 }
?>
<?php include ("footer.php")?>