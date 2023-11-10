<?php
$pagina_activa = 'inicio';
include_once 'secciones/header.php';
include_once 'secciones/navegacion.php';
?>
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
<?php
include_once 'secciones/carrusel.php';
// include_once 'secciones/servicios.php';
include_once 'secciones/equipo.php';
include_once 'secciones/carrusel-productos.php';
include_once 'secciones/footer.php';
?>