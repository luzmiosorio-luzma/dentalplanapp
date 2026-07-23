<div id="presupuestos" class="container-fluid col-12 ficha-container">
    <div class="btn-toolbar mb-3  col-12 d-flex flex-column flex-md-row justify-content-between ">

        <div class="input-group d-flex flex-row align-items-center justify-content-start px-2 px-xl-0 flex-column flex-sm-row w-100">

            <button type="button" class="btn btn-sm btn-secondary btn-combine col-12 col-sm-auto rounded-0 " id="btnAddPresupuesto">
                Agregar Presupuesto
                <i class="fa fa-add ms-2"></i>
            </button>

            <button type="button" class="btn btn-sm btn-secondary btn-combine col-12 col-sm-auto rounded-0" id="btnPrestaciones">
                Gestionar Prestaciones
                <i class="fa fa-file-medical ms-2"></i>
            </button>

        </div>

    </div>

    <form id="formGetPresupuesto"
          action="<?php echo site_url('AdminPresupuesto/getPacientePresupuestos'); ?>"></form>
    <table id="table_presupuesto" class="display w-100">
        <thead>
        <tr class="col-12">
            <th class="col-2">Número Presupuesto</th>
            <th class="col-8">Nombre Presupuesto</th>
            <th class="col-2">Fecha</th>
        </tr>
        </thead>
    </table>
    <div class="container-fluid d-flex justify-content-start mt-3 mb-4">
        <button id="btnMore" class="btn btn-secondary d-none rounded-pill btn-float">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>


