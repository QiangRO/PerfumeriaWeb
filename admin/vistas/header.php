<?php
if (strlen(session_id()) < 1)
  session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISVentas | Escritorio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="../public/css/font-awesome.min.css">

  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <!-- Morris chart --><!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="img/apple-touch-ico.png"> -->
  <!-- <link rel="stylesheet" href="img/favicon.ico"> -->
  <!-- DATATABLES-->
  <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
  <link rel="stylesheet" href="../public/css/bootstrap-select.min.css">

</head>

<body class="hold-transition skin-blue-light layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="escritorio.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Beauty</b> Station</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Beauty</b> Station</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">NAVEGACIÓM</span>
        </a> -->

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php
            if ($_SESSION['escritorio'] == 1) {
              echo ' <li><a href="escritorio.php"><i class="fa  fa-home"></i> <span>Inicio</span></a>
        </li>';
            }
            ?>
            <?php
            if ($_SESSION['almacen'] == 1) {
              echo ' <li><a href="articulo.php"><i class="fa fa-shopping-cart"></i> Articulos</a></li>
              <li><a href="categoria.php"><i class="fa fa-tags"></i> Categorias</a></li>';
            }
            ?>
            <?php
            if ($_SESSION['compras'] == 1) {
              echo '<!-- <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>-->
              <!-- <li><a href="proveedor.php"><i class="fa fa-truck"></i> Proveedores</a></li> -->';
            }
            ?>

            <?php
            if ($_SESSION['ventas'] == 1) {
              echo ' <li><a href="venta.php"><i class="fa fa-ticket"></i> ventas</a></li>
              <li><a href="cliente.php"><i class="fa fa-user"></i> clientes</a></li> ';
            }
            ?>

            <?php
            if ($_SESSION['acceso'] == 1) {
              echo '<li><a href="usuario.php"><i class="fa fa-users"></i> Usuarios</a></li>
              <!--<li><a href="permiso.php"><i class="fa fa-address-card"></i> Permisos</a></li> -->';
            }
            ?>
            <?php
            if ($_SESSION['consultac'] == 1) {
              echo '<!-- <li><a href="comprasfecha.php"><i class="fa fa-circle-o"></i>Compras por fechas</a></li>-->';
            }
            ?>

            <?php
            if ($_SESSION['consultav'] == 1) {
              echo '<li><a href="ventasfechacliente.php"><i class="fa fa-balance-scale"></i> Consulta Ventas</a></li>';
            }
            ?>

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['nombre']; ?>
                    <?php echo $_SESSION['cargo']; ?>

                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->