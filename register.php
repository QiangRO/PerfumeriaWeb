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
            if (isset($_SESSION['message'])) {
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
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" placeholder="Ingrese su correo electrónico" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono:</label>
                            <input type="number" name="phone" class="form-control" placeholder="Ingrese su telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Direccion:</label>
                            <input type="text" name="address" class="form-control" placeholder="Ingrese su direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña:</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirme su contraseña" required>
                        </div>
                        <button type="submit" name="register_btn" class="btn btn-primary btn-block">Submit</button>
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