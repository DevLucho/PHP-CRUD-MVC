<?php
include '../../config/sesion.php';
include '../../layout/header.php';
include '../../layout/nav.php';
include '../../models/ciudad_model.php';

$error = false;
$success = false;

if (isset($_GET['error'])) {
    $error = true;
} else if (isset($_GET['success'])) {
    $success = true;
}
?>
<div class="container p-5">
    <?php if ($success) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Registro guardado extósamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if ($error) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Fallo al guardar el registro.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <h1> Agregar cliente </h1>
    <hr/>
    <form action="../../controllers/cliente_controller.php" method="post">
        <div class="row col-md-6">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cedula</label>
                    <input type="number" class="form-control" name="cedula" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" class="form-control" name="apellido" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="number" class="form-control" name="telefono" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" name="direccion" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" name="ciudad" required>
                        <option value="" selected="selected" disabled="disabled">- Seleccione ciudad -</option>
                        <?php
                        $c = new Ciudad();
                        foreach ($c->getCiudades() as $ciudad) {?>
                            <option value='<?php echo $ciudad->codigo_cda ?>'><?php echo $ciudad->nombre_cda ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="contra" aria-describedby="inputGroupPrepend2" required>
                </div>

                <button type="submit" class="btn btn-success btn-block" name="create">Registrar</button>
            </div>
        </div>
    </form>
</div>
<?php
include '../../layout/footer.php';
?>