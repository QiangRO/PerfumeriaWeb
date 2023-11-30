<?php
require_once 'connection.php';

$sql = "SELECT articulo.*, categoria.nombre AS nombre_categoria
        FROM articulo
        INNER JOIN categoria ON articulo.idcategoria = categoria.idcategoria
        WHERE articulo.condicion = 1";
$all_product = $conn->query($sql);
$rutaBase = "admin/files/articulos/";
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Service Start -->
<div class="container-fluid px-0 py-5 my-5">
    <div class="row mx-0 justify-content-center text-center">
        <div class="col-lg-6">
            <h6 class="d-inline-block bg-light text-primary text-uppercase py-1 px-2">Productos</h6>
            <h1>Nuestros productos en stock</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6 offset-lg-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Buscar productos">
            <button class="btn btn-primary" onclick="searchProducts()">Buscar</button>
        </div>
    </div>
    <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
            $rutaCompleta = $rutaBase . $row["imagen"];
        ?>
            <!-- Repite este bloque para cada producto -->
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $rutaCompleta; ?>" alt="Nombre del Producto">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row["nombre"]; ?></h4>
                        <p class="card-text"><?php echo $row["nombre_categoria"]; ?></p>
                        <p class="card-text"><?php echo $row["descripcion"]; ?></p>
                        <a href="#" class="btn btn-sm btn-outline-secondary add" data-id="<?php echo $row["idarticulo"]; ?>">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<style>
    /* Estilos para la ventana emergente del carrito */
    .cart-popup {
        display: none;
        position: fixed;
        bottom: 10px; /* Cambiado de top a bottom */
        right: 10px; /* Cambiado de left a right */
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        max-height: 400px;
        overflow-y: auto;
    }

    .close-popup {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 18px;
    }

    #cartItems {
        list-style: none;
        padding: 0;
    }

    #cartItems li {
        border-bottom: 1px solid #ccc;
        padding: 10px;
        display: flex;
        align-items: center;
    }

    #cartItems li img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
        border-radius: 5px;
    }

    #cartItems li button {
        margin-left: auto;
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 3px;
    }
    .searched-product {
        margin-left: 0;
    }
</style>

<!-- Carrito de compras -->
<div class="cart-popup" id="cartPopup">
    <span class="close-popup" onclick="closeCartPopup()">&times;</span>
    <h3>Carrito de Compras</h3>
    <ul id="cartItems">
        <!-- Los elementos del carrito se agregarán aquí dinámicamente -->
    </ul>
    <button class="btn btn-success btn-block" onclick="buyItems()">Comprar</button>
</div>

<script>
    $(document).ready(function () {
        var cart = [];

        $(".add").click(function (event) {
            event.preventDefault(); // Evitar que el enlace cambie de página
            var id = $(this).data("id");
            var name = $(this).parent().find("h4").text();
            var price = $(this).parent().find(".price").text();
            var imageUrl = $(this).parent().siblings(".card-img-top").attr("src");
            var item = {
                id: id,
                name: name,
                price: price,
                imageUrl: imageUrl
            };
            cart.push(item);
            showCartPopup(); // Muestra la ventana flotante del carrito al agregar un producto
        });

        function showCartPopup() {
            var cartPopup = $("#cartPopup");
            cartPopup.show();
            updateCartItems();
        }

        function updateCartItems() {
            var cartItemsList = $("#cartItems");
            cartItemsList.empty();
            for (var i = 0; i < cart.length; i++) {
                cartItemsList.append("<li><img src='" + cart[i].imageUrl + "' alt='" + cart[i].name + "'>" +
                    cart[i].name + " - " + cart[i].price + "</li>");
            }
        }
       
        
    });

    function buyItems() {
    // Redireccionar a la página Plan.php
    window.location.href = 'Plan.php';
}

    function closeCartPopup() {
        var cartPopup = $("#cartPopup");
        cartPopup.hide();
    }
    
    function searchProducts() {
            var searchTerm = $("#searchInput").val().toLowerCase();
            var productList = $(".card"); // Reemplaza esto con la clase o identificador específico de tus productos

            productList.each(function () {
                var productName = $(this).find("h4").text().toLowerCase();

                // Mostrar/ocultar productos según el término de búsqueda
                if (productName.includes(searchTerm)) {
                    $(this).addClass("searched-product");
                    $(this).show();
                } else {
                    $(this).removeClass("searched-product");
                    $(this).hide();
                }
            });
        }
   
</script>
