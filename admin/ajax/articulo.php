<?php
require_once "../modelos/Articulo.php";

$articulo = new Articulo();

$idarticulo = isset($_POST["idarticulo"]) ? limpiarCadena($_POST["idarticulo"]) : "";
$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$stock = isset($_POST["stock"]) ? limpiarCadena($_POST["stock"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		try {
			if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
				$imagen = $_POST["imagenactual"];
			} else {
				$ext = explode(".", $_FILES["imagen"]["name"]);
				if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
				}
			}

			if (empty($idarticulo)) {
				$rspta = $articulo->insertar($idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
				echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
			} else {
				$rspta = $articulo->editar($idarticulo, $idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
				echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
			}
		} catch (mysqli_sql_exception $e) {
			if ($e->getCode() == 1062) {
				// Código 1062 corresponde a una violación de restricción UNIQUE
				echo "Error: El producto ya existe. Por favor registra un producto no existente.";
			} else {
				// Manejar otros tipos de errores según sea necesario
				echo "Error: " . $e->getMessage();
			}
		}
		break;


	case 'desactivar':
		$rspta = $articulo->desactivar($idarticulo);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta = $articulo->activar($idarticulo);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;

	case 'mostrar':
		$rspta = $articulo->mostrar($idarticulo);
		echo json_encode($rspta);
		break;

	case 'listar':
		
		$rspta = $articulo->listar();
		$data = array();

		while ($reg = $rspta->fetch_object()) {
			$estado = '';

			if ($reg->stock <= 0) {
				$estado .= '<span class="label bg-yellow">Agotado</span>';
			}

			$estado .= ($reg->condicion)
				? '<br> <span class="label bg-green">Activado</span>'
				: '<br> <span class="label bg-red">Desactivado</span>';

			$data[] = array(
				"0" => ($reg->condicion)
					? '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idarticulo . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="desactivar(' . $reg->idarticulo . ')"><i class="fa fa-close"></i></button>'
					: '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idarticulo . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-primary btn-xs" onclick="activar(' . $reg->idarticulo . ')"><i class="fa fa-check"></i></button>',
				"1" => $reg->nombre,
				"2" => $reg->categoria,
				"3" => $reg->codigo,
				"4" => $reg->stock,
				"5" => "<img src='../files/articulos/" . $reg->imagen . "' height='50px' width='50px'>",
				"6" => $reg->descripcion,
				"7" => $estado
			);
		}

		$results = array(
			"sEcho" => 1, //info para datatables
			"iTotalRecords" => count($data), //enviamos el total de registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);
		break;

	case 'selectCategoria':
		require_once "../modelos/Categoria.php";
		$categoria = new Categoria();

		$rspta = $categoria->select();

		while ($reg = $rspta->fetch_object()) {
			echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
		}
		break;
}
