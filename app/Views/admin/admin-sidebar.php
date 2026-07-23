<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo base_url()?>/admin/usuarios">
                    <i class="fas fa-user"></i>
                    Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>/admin/citas">
                    <i class="fas fa-calendar-plus"></i>
                    Citas Médicas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="collapse" href="#inventarioMenu" role="button"
                   aria-expanded="false" aria-controls="inventarioMenu">
                    <i class="fas fa-boxes"></i>
                    Inventario
                </a>
            </li>
            <div class="collapse sencond-link-container" id="inventarioMenu">
                <a class="nav-link sencond-link bg-grad-link" href="<?php echo base_url() ?>/admin/unidades">
                    <i class="fas fa-arrow-right"></i>
                    Unidades
                </a>
                <a class="nav-link sencond-link bg-grad-link" href="<?php echo base_url() ?>/admin/productos">
                    <i class="fas fa-arrow-right"></i>
                    Productos
                </a>
            </div>
        </ul>
    </div>

</nav>
