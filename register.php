<?php
session_start();
include_once 'secciones/header.php';
include_once 'secciones/navegacion.php';
?>
<div class="container">

    <h2 class="text-center mb-4">Crear cuenta</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if (isset($_SESSION['message']))
            {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
            }
            ?>
                
                <div class="register-wrapper bg-white p-4 mt-5">
                    <form action="function/authcode.php" method="POST">
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del cliente" required>
                        </div>
                        <div class="form-group">
                        <label for="">Tipo Documento</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                                <option value="CI">CI</option>
                                <option value="NIT">NIT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Número Documento</label>
                            <input class="form-control" type="text" name="num_documento" id="num_documento" maxlength="20" placeholder="Número de Documento">
                        </div>
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" maxlength="70" placeholder="Direccion">
                        </div>
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20" placeholder="Número de Telefono">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email" id="email" maxlength="50" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña:</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirme su contraseña" required>
                        </div>
                        <button type="submit" id="btnGuardar" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Guardar</button>

                    </form>
                    <div class="text-center mt-3">
                        <p>¿Ya tiene una cuenta? <a href="login.php" class="text-secondary">Iniciar sesión</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php
include_once 'secciones/footer.php';
?>