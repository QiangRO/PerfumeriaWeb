var tabla;

//funcion que se ejecuta al inicio
function init() {
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function (e) {
		guardaryeditar(e);
	})

	//cargamos los items al select categoria
	$.post("../ajax/articulo.php?op=selectCategoria", function (r) {
		$("#idcategoria").html(r);
		$("#idcategoria").selectpicker('refresh');
	});
	$("#imagenmuestra").hide();
}

//funcion limpiar
function limpiar() {
	$("#codigo").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#stock").val("");
	$("#imagenmuestra").attr("src", "");
	$("#imagenactual").val("");
	$("#print").hide();
	$("#idarticulo").val("");
}

//funcion mostrar formulario
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
	} else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform() {
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar() {
	tabla = $('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
			
		],
		"ajax":
		{
			url: '../ajax/articulo.php?op=listar',
			type: "get",
			dataType: "json",
			error: function (e) {
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 10,//paginacion
		"order": [[0, "desc"]]//ordenar (columna, orden)
	}).DataTable();
}
// Función para guardaryeditar
function guardaryeditar(e) {
    e.preventDefault(); // No se activará la acción predeterminada
    $("#btnGuardar").prop("disabled", true);

    // Validar que se haya seleccionado una imagen
    if ($("#imagen")[0].files.length === 0) {
        $(".error-message").text("Selecciona una imagen antes de enviar el formulario.");
        $("#btnGuardar").prop("disabled", false);
        return;
    }

    // Validar la extensión del archivo
    var fileExtension = $("#imagen").val().split('.').pop().toLowerCase();
    if (["jpg", "jpeg", "png"].indexOf(fileExtension) === -1) {
        $(".error-message").text("Solo se permite subir archivos en formato jpg, jpeg, png.");
        $("#btnGuardar").prop("disabled", false);
        return;
    }

    $(".error-message").text(""); // Limpiar el mensaje de error

    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/articulo.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });

    limpiar();
}

function mostrar(idarticulo) {
	$.post("../ajax/articulo.php?op=mostrar", { idarticulo: idarticulo },
		function (data, status) {
			data = JSON.parse(data);
			mostrarform(true);

			$("#idcategoria").val(data.idcategoria);
			$("#idcategoria").selectpicker('refresh');
			$("#codigo").val(data.codigo);
			$("#nombre").val(data.nombre);
			$("#stock").val(data.stock);
			$("#descripcion").val(data.descripcion);
			$("#imagenmuestra").show();
			$("#imagenmuestra").attr("src", "../files/articulos/" + data.imagen);
			$("#imagenactual").val(data.imagen);
			$("#idarticulo").val(data.idarticulo);
			generarbarcode();
		})
}


//Función para desactivar
function desactivar(idarticulo) {
    // Obtener el stock del artículo
    $.post("../ajax/articulo.php?op=mostrar", { idarticulo: idarticulo }, function (data) {
        var articulo = JSON.parse(data);
        var stock = articulo.stock;

        // Verificar si el stock es 0
        if (stock == 0) {
            // Si el stock es 0, mostrar un mensaje indicando que el producto está agotado
            bootbox.alert("No se puede desactivar el producto porque está agotado.");
        } else {
            // Si el stock no es 0, confirmar la desactivación
            bootbox.confirm("¿Está seguro de desactivar este producto?", function (result) {
                if (result) {
                    // Realizar la desactivación
                    $.post("../ajax/articulo.php?op=desactivar", { idarticulo: idarticulo }, function (e) {
                        bootbox.alert(e);
                        tabla.ajax.reload();
                    });
                }
            });
        }
    });
}

// Función para activar
function activar(idarticulo) {
    // Obtener el stock del artículo
    $.post("../ajax/articulo.php?op=mostrar", { idarticulo: idarticulo }, function (data) {
        var articulo = JSON.parse(data);
        var stock = articulo.stock;

        // Verificar si el stock es 0
        if (stock == 0) {
            // Si el stock es 0, mostrar un mensaje indicando que el producto está agotado
            bootbox.alert("No se puede activar el producto porque está agotado.");
        } else {
            // Si el stock no es 0, confirmar la activación
            bootbox.confirm("¿Está seguro de activar este producto?", function (result) {
                if (result) {
                    // Realizar la activación
                    $.post("../ajax/articulo.php?op=activar", { idarticulo: idarticulo }, function (e) {
                        bootbox.alert(e);
                        tabla.ajax.reload();
                    });
                }
            });
        }
    });
}

function generarbarcode() {
	codigo = $("#codigo").val();
	JsBarcode("#barcode", codigo);
	$("#print").show();

}

function imprimir() {
	$("#print").printArea();
}

init();