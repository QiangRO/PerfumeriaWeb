    <!-- Topbar Start -->
    <!-- <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small><i class="fa fa-phone-alt mr-2"></i>+59112345678</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>lindsay@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-primary pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-primary"><span class="text-dark">Beauty</span>Station</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0">
                    <a href="index.php" class="nav-item nav-link <?php if ($pagina_activa == 'inicio') echo 'active'; ?>">Inicio</a>
                    <!-- <a href="service.php" class="nav-item nav-link <?php if ($pagina_activa == 'servicios') echo 'active'; ?>">Servicios</a> -->
                    <!-- <a href="price.php" class="nav-item nav-link <?php if ($pagina_activa == 'precios') echo 'active'; ?>">Precios</a> -->
                    <a href="productos.php" class="nav-item nav-link <?php if ($pagina_activa == 'productos') echo 'active'; ?>">Productos</a>
                    <a href="about.php" class="nav-item nav-link <?php if ($pagina_activa == 'acerca') echo 'active'; ?>">Acerca</a>
                </div>
                <a href="login.php" class="btn btn-primary d-none d-lg-block">Iniciar Sesion</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->