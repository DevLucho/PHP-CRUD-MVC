<?php
include_once '../config/sesion.php';
include_once '../models/usuario_model.php';
include_once '../models/ciudad_model.php';
include_once '../layout/header.php';
include_once '../layout/nav.php';
$success = false;
$error = false;
$type = "";
if (isset($_GET['error']) && $_GET['type'] == "edit") {
    $error = true;
    $type = "edit";
} else if (isset($_GET['success']) && $_GET['type'] == "edit") {
    $success = true;
    $type = "edit";
} else if (isset($_GET['error']) && $_GET['type'] == "delete") {
    $error = true;
    $type = "delete";
} else if (isset($_GET['success']) && $_GET['type'] == "delete") {
    $success = true;
    $type = "delete";
}
?>
<div class="container p-5">
    <?php if ($success && $type == "edit") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Registro editado extósamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if ($error && $type == "edit") { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Fallo al editar el registro.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if ($success && $type == "delete") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Registro eliminado extósamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if ($error && $type == "delete") { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Fallo al eliminar el registro.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <a href="cliente/crear_cliente.php" class="btn btn-primary">Agregar cliente</button></a>
    <hr/>
    <table class="table table-bordered table-hover tabla text-center" style="width:100%">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $u = new Usuario();
            foreach ($u->getClientes() as $cliente) {
                ?>
                <tr>
                    <td><?php echo $cliente->cedula_cli ?></td>
                    <td><?php echo $cliente->nombre_cli ?></td>
                    <td><?php echo $cliente->apellido_cli ?></td>
                    <td><?php echo $cliente->telefono_cli ?></td>
                    <td><?php echo $cliente->direccion_cli ?></td>
                    <td>
                        <?php 
                        $c = new Ciudad();
                        $data = $c->getFindCiudad($cliente->cod_ciudad);                    
                        echo $data->nombre_cda;
                        ?>
                    </td> 
                    <td>
                        <a href="cliente/editar_cliente.php?cedula=<?= $cliente->cedula_cli ?>">
                            <button type="button" class="btn btn-success">Editar</button>
                        </a>
                        <a href="../controllers/cliente_controller.php?delete=true&id=<?php echo $cliente->cedula_cli ?>">
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include '../layout/footer.php';

