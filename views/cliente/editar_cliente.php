<?php
include '../../config/sesion.php';
include '../../layout/header.php';
include '../../layout/nav.php';
include '../../models/usuario_model.php';
include '../../models/ciudad_model.php';

$error = false;
$success = false;

if (isset($_GET['error'])) {
    $error = true;
} else if (isset($_GET['success'])) {
    $success = true;
}

if (isset($_GET['cedula'])) {
    $usuario = new Usuario();
    $data = $usuario->getFindCliente($_GET['cedula']);
}
?>
<div class="container p-5">
    <?php if ($success) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Registro actualizado exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if ($error) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Fallo al actualizar el registro.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <h1> Editar cliente:  <?php echo $data->nombre_cli ?></h1>
    <hr/>
    <form action="../../controllers/cliente_controller.php" method="post">
        <div class="row col-md-6">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cedula</label>
                    <input type="number" class="form-control" readonly="readonly" value="<?php echo $data->cedula_cli ?>" name="cedula" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" value="<?php echo $data->nombre_cli ?>" name="nombre" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" class="form-control" value="<?php echo $data->apellido_cli ?>" name="apellido" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="number" class="form-control" value="<?php echo $data->telefono_cli ?>" name="telefono" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" value="<?php echo $data->direccion_cli ?>" name="direccion" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" name="ciudad">
                        <?php
                        $c = new Ciudad();
                        $dato = $c->getFindCiudad($data->cod_ciudad);
                        ?>
                        <option value="<?php $dato->codigo_cda?>" selected="selected"><?php echo $dato->nombre_cda?></option>
                        <?php
                        if(!$data->codigo_cda){
                            foreach ($c->getCiudades() as $ciudad) {
                        }?>
                            <option value='<?php echo $ciudad->codigo_cda ?>'><?php echo $ciudad->nombre_cda ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" value="<?php echo $data->contrasenia ?>" name="contra" aria-describedby="inputGroupPrepend2" required>
                </div>

                <button type="submit" class="btn btn-success btn-block" name="edit">Actualizar</button>
            </div>
        </div>
    </form>
</div>
<?php
include '../../layout/footer.php';
?>