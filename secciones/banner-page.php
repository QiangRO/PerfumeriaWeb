<!-- Header Start -->
<div class="jumbotron jumbotron-fluid"
<?php if ($pagina_activa == 'acerca') echo 'style="background: linear-gradient(rgba(33, 30, 28, 0.7), rgba(33, 40, 28, 0.7)), url(img/header-acerca2.jpg), no-repeat center center; background-size: cover;"'; ?>
<?php if ($pagina_activa == 'servicios') echo 'style="background: linear-gradient(rgba(33, 30, 28, 0.7), rgba(33, 40, 28, 0.7)), url(img/header-servicios.jpg), no-repeat center center; background-size: cover;"'; ?>
<?php if ($pagina_activa == 'precios') echo 'style="background: linear-gradient(rgba(33, 30, 28, 0.7), rgba(33, 40, 28, 0.7)), url(img/carousel-3.jpg), no-repeat center center; background-size: cover;"'; ?>
<?php if ($pagina_activa == 'productos') echo 'style="background: linear-gradient(rgba(33, 30, 28, 0.7), rgba(33, 40, 28, 0.7)), url(img/header-productos.jpg), no-repeat center center; background-size: cover;"'; ?>
<?php if ($pagina_activa == 'contactos') echo 'style="background: linear-gradient(rgba(33, 30, 28, 0.7), rgba(33, 40, 28, 0.7)), url(img/header-acerca.jpg), no-repeat center center; background-size: cover;"'; ?>>
    <div class="container text-center py-5">
        <h3 class="text-white display-3 mb-4"><?php if ($pagina_activa == 'acerca') echo 'Acerca'; ?></h3>
        <h3 class="text-white display-3 mb-4"><?php if ($pagina_activa == 'servicios') echo 'Servicios'; ?></h3>
        <h3 class="text-white display-3 mb-4"><?php if ($pagina_activa == 'precios') echo 'Precios'; ?></h3>
        <h3 class="text-white display-3 mb-4"><?php if ($pagina_activa == 'productos') echo 'Productos'; ?></h3>
        <h3 class="text-white display-3 mb-4"><?php if ($pagina_activa == 'contactos') echo 'Contacto'; ?></h3>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="index.php">Inicio</a></p>
            <i class="far fa-circle px-3"></i>
            <p class="m-0"><?php if ($pagina_activa == 'acerca') echo 'Acerca'; ?></p>
            <p class="m-0"><?php if ($pagina_activa == 'servicios') echo 'Servicios'; ?></p>
            <p class="m-0"><?php if ($pagina_activa == 'precios') echo 'Precios'; ?></p>
            <p class="m-0"><?php if ($pagina_activa == 'productos') echo 'Productos'; ?></p>
            <p class="m-0"><?php if ($pagina_activa == 'contactos') echo 'Contacto'; ?></p>
        </div>
    </div>
</div>
<!-- Header End -->