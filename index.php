<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-7">
            <?php include 'mensajes/mensajes.php' ?>
            <div class="card">
                <div class="card-header">
                    Lista de Clientes
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Destino</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Tipo de carga</th>                                
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($persona as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                      <td><?php echo $dato->Destino; ?></td>
                                    <td><?php echo $dato->DNI; ?></td>
                                    <td><?php echo $dato->Nombres;   ?></td>
                                    <td><?php echo $dato->Fecha; ?></td>
                                    <td><?php echo $dato->Origen; ?></td>
                                    <td><?php echo $dato->Telefono; ?></td>
                                    <td><?php echo $dato->Tipo_de_carga; ?></td>
                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-primary" href="agregarPromocion.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Destino </label>
                        <input type="text" class="form-control" name="txtDestino" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI </label>
                        <input type="text" class="form-control" name="txtDNI" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombres </label>
                        <input type="text" class=" form-control" name="txtNombres" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Origen </label>
                        <input type="text" class="form-control" name="txtOrigen" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono </label>
                        <input type="number" class="form-control" name="txtTelefono" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de carga </label>
                        <input type="text" class="form-control" name="txtTipo_de_carga" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>