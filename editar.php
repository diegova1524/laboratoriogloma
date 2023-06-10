<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare("select * from persona where id = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Destino </label>
                        <input type="text" class="form-control" name="txtDestino" required 
                        value="<?php echo $persona->destino; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI </label>
                        <input type="text" class="form-control" name="txtDNI" autofocus required
                        value="<?php echo $persona->DNI; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombres </label>
                        <input type="text" class="form-control" name="txtNombres" autofocus required
                        value="<?php echo $persona->Nombres; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Origen </label>
                        <input type="text" class="form-control" name="txtorigen" autofocus required
                        value="<?php echo $persona->origen; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required
                        value="<?php echo $persona->celular; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Carga </label>
                        <input type="text" class="form-control" name="txttipodecarga" autofocus required
                        value="<?php echo $persona->Tipo_carga; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>