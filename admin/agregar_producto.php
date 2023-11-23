<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) ;

?>
<div class="container">
    <h3>Agregar producto</h3>
    <form method="post">
        <div class="mb-3">
            <label for="codigo" class="form-label">Código del producto</label>
            <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Escribe el código del producto">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ej. Crema Nivea">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Categoria del producto">
        </div>
        <div class="row">
            <div class="col">
                <label for="compra" class="form-label">Precio compra</label>
                <input type="number" name="compra" step="any" id="compra" class="form-control" placeholder="Precio de compra" aria-label="">
            </div>
            <div class="col">
                <label for="venta" class="form-label">Precio venta</label>
                <input type="number" name="venta" step="any" id="venta" class="form-control" placeholder="Precio de venta" aria-label="">
            </div>
            <div class="col">
                <label for="existencia" class="form-label">Existencia</label>
                <input type="number" name="existencia" step="any" id="existencia" class="form-control" placeholder="Existencia" aria-label="">
            </div>
            
        </div>
        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            
            </input>
            <a class="btn btn-danger btn-lg" href="productos.php">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $compra = $_POST['compra'];
    $venta = $_POST['venta'];
    $existencia = $_POST['existencia'];
    if(empty($codigo) 
    || empty($nombre)
    || empty($descripcion)
    || empty($categoria) 
    || empty($compra) 
    || empty($venta)
    || empty($existencia)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    include_once "funciones.php";
    $resultado = registrarProducto($codigo, $nombre, $descripcion, $categoria, $compra, $venta, $existencia);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Producto registrado con éxito.
        </div>';
    }
    
}
?>