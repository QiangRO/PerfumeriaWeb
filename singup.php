<?php
include_once 'secciones/header.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="register-wrapper bg-white p-4 mt-5">
                <h2 class="text-center mb-4">Crear cuenta</h2>
                <form>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" class="form-control" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="text" id="email" class="form-control" placeholder="Ingrese su correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Crear cuenta</button>
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