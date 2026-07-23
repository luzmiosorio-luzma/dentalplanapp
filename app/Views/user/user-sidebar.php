<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="collapse" href="#citasMenu" role="button"
                   aria-expanded="false" aria-controls="citasMenu">
                    <i class="fas fa-briefcase"></i>
                    Citas Médicas
                </a>
            </li>
            <div class="collapse show sencond-link-container" id="citasMenu">

                <a class="nav-link sencond-link bg-grad-link" href="<?php echo base_url()?>/user/citas">
                    <i class="fas fa-arrow-right"></i>
                    Calendario
                </a>

                <a class="nav-link sencond-link bg-grad-link" href="<?php echo base_url()?>/user/diario">
                    <i class="fas fa-arrow-right"></i>
                    Diario
                </a>

            </div>

        </ul>
    </div>

</nav>
