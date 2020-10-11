<?php
include '../../layout/header.php';
$error = false;
if(isset($_GET['error'])){
    $error = true;
}

?>
<div align="center">
    <div class="col-md-4 p-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form action="../../controllers/usuarios_controller.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cedula</label>
                        <input type="number" class="form-control" name="cedula" aria-describedby="inputGroupPrepend2" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" name="contrasenia" class="form-control" aria-describedby="inputGroupPrepend2" required>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-outline-success btn-block" name="login">Iniciar sesión</button>
                    <?php if($error) echo "<br /> <br /><div class='alert alert-danger' role='alert'> Usuario o contraseña invalidos. </div>"; ?>
                </form>
            </div>
        </div>

    </div>

</div>

<?php
include '../../layout/footer.php'
?>