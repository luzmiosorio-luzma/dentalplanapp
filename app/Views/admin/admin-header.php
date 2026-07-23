<nav class="navbar navbar-expand-lg n-nav">
    <div class="container-fluid m-0 p-0 mx-md-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
                aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">

                <li class="nav-item custom-item-menu dropdown m-0 me-md-5">
                    <a class="btn btn-clean" href="<?php echo base_url() ?>/admin/usuarios">
                        Usuarios
                    </a>
                </li>

                <li class="nav-item custom-item-menu dropdown m-0 me-md-5">
                    <a class="btn btn-clean" href="<?php echo base_url() ?>/admin/novedades">
                        Novedades
                    </a>
                </li>

                <li class="nav-item custom-item-menu dropdown m-0 me-md-5">
                    <a class="btn btn-clean" href="<?php echo base_url() ?>/user/perfil">
                        Perfil
                    </a>
                </li>

                <li class="nav-item custom-item-menu dropdown m-0 me-md-5">
                    <a class="btn btn-clean" href="<?php echo base_url() ?>/user/pacientes">
                        Pacientes
                    </a>
                </li>

                <li class="nav-item custom-item-menu dropdown m-0 me-md-5">
                    <a class="btn btn-clean" href="<?php echo base_url() ?>/user/citas">
                        Agenda
                    </a>
                </li>

                <li class="nav-item custom-item-menu dropdown m-0 me-md-5">
                    <a class="btn btn-clean" href="<?php echo base_url() ?>/user/mensual">
                        Finanzas
                    </a>
                </li>

<!--                <li class="nav-item custom-item-menu dropdown m-0 me-md-5">-->
<!--                    <button class="btn btn-clean dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">-->
<!--                        Finanzas-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu n-box n-bkg-color">-->
<!--                        <li><a class="dropdown-item " href="--><?php //echo base_url() ?><!--/user/diario">Diario</a></li>-->
<!--                        <li><a class="dropdown-item " href="--><?php //echo base_url() ?><!--/user/mensual">Mensual</a></li>-->
<!--                    </ul>-->
<!--                </li>-->

                <!--                <li class="nav-item dropdown m-0 me-md-5 d-flex align-items-center justify-content-center">-->
                <!--                    <input type="text" class="form-control" id="inputBuscarPaciente" placeholder="Buscar Paciente....">-->
                <!--                    <button class="btn btn-sm btn-primary " id="testBtn" type="button"> Buscar</button>-->
                <!--                </li>-->


            </ul>
            <a class="logout-btn-modern" href="<?= base_url() ?>/login/startLogOut">
                <i class="fa-solid fa-power-off"></i>
                <span>Cerrar</span>
            </a>
        </div>
    </div>

</nav>


<input id="hdnBaseUrl" type="hidden" value="<?= base_url() ?>">
