<nav class="navbar navbar-expand-lg n-nav">
    <div class="container-fluid m-0 p-0 mx-md-3">
        <button class="navbar-toggler ms-4 ms-md-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown"
                aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">

                <?php if ($role == 1) { ?>
                    <li class="nav-item custom-item-menu dropdown m-0 me-lg-5">
                        <a class="btn btn-clean" href="<?php echo base_url() ?>/admin/usuarios">
                            Usuarios
                        </a>
                    </li>
                <?php } ?>


                <li class="nav-item custom-item-menu dropdown m-0 me-lg-5">
                    <a class="btn btn-clean supermenu-item" href="<?php echo base_url() ?>/user/perfil">
                        <i class="fa-solid  fa-user-gear"></i>Perfil
                    </a>
                </li>

                <li class="nav-item custom-item-menu dropdown m-0 me-lg-5">
                    <a class="btn btn-clean supermenu-item" href="<?php echo base_url() ?>/user/pacientes">
                        <i class="fa-solid  fa-hospital-user"></i>Pacientes
                    </a>
                </li>

                <li class="nav-item dropdown m-0 me-md-5">
                    <a class="btn btn-clean supermenu-item" href="<?php echo base_url() ?>/user/citas">
                        <i class="fa-solid  fa-calendar-check"></i> Agenda
                    </a>
                </li>

                <li class="nav-item dropdown m-0 me-md-5">
                    <a class="btn btn-clean supermenu-item" href="<?php echo base_url() ?>/user/mensual">
                        <i class="fa-solid  fa-chart-line"></i> Finanzas
                    </a>
                </li>


<!--                <li class="nav-item custom-item-menu dropdown m-0 me-lg-5">-->
<!--                    <button class="btn btn-clean dropdown-toggle supermenu-item " data-bs-toggle="dropdown"-->
<!--                            aria-expanded="false">-->
<!--                        <i class="fa-solid  fa-chart-line"></i>Finanzas-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a class="dropdown-item custom-dropdown-menu-item"-->
<!--                               href="--><?php //echo base_url() ?><!--/user/diario">Diario</a></li>-->
<!--                        <li><a class="dropdown-item custom-dropdown-menu-item"-->
<!--                               href="--><?php //echo base_url() ?><!--/user/mensual">Mensual</a></li>-->
<!--                    </ul>-->
<!--                </li>-->

                <li class="nav-item m-0 d-flex align-items-center" id="buscadorContainer">
                    <i class="fa-solid fa-magnifying-glass searchicon"></i>
                    <input class="form-control search-input-modern" type="text"
                           id="inputBuscarPaciente" placeholder="Buscar Paciente..." autocomplete="off">
                    <ul class="list-group search-results-list" id="listPacientes">
                    </ul>
                </li>
            </ul>
            <a class="logout-btn-modern" href="<?= base_url() ?>/login/startLogOut">
                <i class="fa-solid fa-power-off"></i>
                <span>Cerrar</span>
            </a>
        </div>
    </div>
</nav>

<input id="hdnBaseUrl" type="hidden" value="<?= base_url() ?>">