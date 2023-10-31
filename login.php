<?php
include_once 'secciones/header.php';
include_once 'secciones/navegacion.php';
?>
<div class="container bg-login">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-wrapper bg-white p-4 mt-5">
                <h2 class="text-center mb-4">Iniciar sesión</h2>
                <form>
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="text" id="email" class="form-control" placeholder="Ingrese su correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary d-none d-lg-block btn-block">Iniciar sesión</button>
                </form>
                <div class="text-center mt-3">
                    <a href="lostpassword.php" class="text-secondary">¿Olvidó su contraseña?</a>
                </div>
                <div class="text-center mt-3">
                    <p>¿No tiene una cuenta? <a href="register.php" class="text-secondary">Crear cuenta</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'secciones/footer.php';
?>