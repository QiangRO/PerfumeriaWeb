<?php
require_once 'connection.php';
$sql = "SELECT * FROM articulo";
$all_product = $conn->query($sql);
$rutaBase = "admin/files/articulos/";
?>

<!-- Service Start -->
<div class="container-fluid px-0 py-5 my-5">
    <div class="row mx-0 justify-content-center text-center">
        <div class="col-lg-6">
            <h6 class="d-inline-block bg-light text-primary text-uppercase py-1 px-2">Productos</h6>
            <h1>Nuestros productos en stock</h1>
        </div>
    </div>
    <div class="owl-carousel service-carousel">
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
            $rutaCompleta = $rutaBase . $row["imagen"];
        ?>
            <div class="service-item position-relative">
                <img class="img-fluid" src="<?php echo $rutaCompleta; ?>" alt="">

                <div class="service-text text-center">
                    <h4 class="text-white font-weight-medium px-3"><?php echo $row["nombre"];  ?></h4>

                    <div class="w-100 bg-white text-center p-4">
                        <a target="_blank" class="btn btn-primary" href="https://wa.me/67323050">Reservar</a>
                    </div>
                </div>
            </div>
        <?php

        }
        ?>
    </div>

</div>