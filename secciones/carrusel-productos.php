<?php
require_once 'connection.php';
// $sql = "SELECT articulo.*, categoria.nombre AS nombre_categoria
// FROM articulo
// INNER JOIN categoria ON articulo.idcategoria = categoria.idcategoria";

$sql = "SELECT articulo.*, categoria.nombre AS nombre_categoria
FROM articulo
INNER JOIN categoria ON articulo.idcategoria = categoria.idcategoria
WHERE articulo.condicion = 1";
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
    <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
            $rutaCompleta = $rutaBase . $row["imagen"];
        ?>
            <!-- Repite este bloque para cada producto -->
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card" >
                    <img class="card-img-top" src="<?php echo $rutaCompleta; ?>" alt="Nombre del Producto">
                    <div class="card-body" >
                        <h4 class="card-title"><?php echo $row["nombre"];  ?></h4>
                        <p class="card-text"><?php echo $row["nombre_categoria"];  ?></p>
                        <p class="card-text"><?php echo $row["descripcion"];  ?></p>
                        <a href="enlace_del_producto" class="btn btn-sm btn-outline-secondary add" data-id="<?php echo $row["idarticulo"];  ?>">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <!-- Fin del bloque repetido para cada producto -->
        <?php
        }
        ?>
    </div>
    <!-- <div class="col-md-4">

        <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="" alt="Nombre del Producto">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">Descripción del producto. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="enlace_del_producto" class="btn btn-sm btn-outline-secondary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>

    </div> -->
    <!-- <div class="owl-carousel service-carousel">

        <div class="service-item position-relative">
            <img class="img-fluid" src="" alt="">

            <div class="service-text text-center">
                <h4 class="text-white font-weight-medium px-3"></h4>

                <div class="w-100 bg-white text-center p-4">
                    <a target="_blank" class="btn btn-primary" href="https://wa.me/67323050">Reservar</a>
                </div>
            </div>
        </div>

    </div> -->

</div>
<script>
    var product_id = document.getElementsByClassName("add");
    for (var i = 0; i < product_id.length; i++) {
        product_id[i].addEventListener("click", function(event) {
            var target = event.target;
            var id = target.getAttribute("data-id");
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    target.innerHTML = data.in_cart;
                    document.getElementById("badge").innerHTML = data.num_cart + 1;
                }
            }

            xml.open("GET", "connection.php?id=" + id, true);
            xml.send();

        })
    }
</script>