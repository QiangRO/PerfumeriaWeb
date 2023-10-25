<?php
include_once 'secciones/header.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="forgot-password-wrapper bg-white p-4 mt-5">
                <h2 class="text-center mb-4">Olvidó su contraseña</h2>
                <form>
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="text" id="email" class="form-control" placeholder="Ingrese su correo electrónico" required>
                    </div>
                    <button type="submit" class="btn btn-primary d-none d-lg-block btn-block">Enviar correo de recuperación</button>
                </form>
                <div class="text-center mt-3">
                    <p>¿Recuerda su contraseña? <a href="login.php" class="text-secondary">Iniciar sesión</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'secciones/footer.php';
?>