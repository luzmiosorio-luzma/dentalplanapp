<?php

namespace App\Controllers;

use App\Models\CitaModel;

class AdminDiario extends BaseController
{
    public function __construct()
    {
        $this->CitaModel = new CitaModel();
    }

    function getUserCitas()
    {

        $usuario = $_REQUEST['usuario'];
        $fecha = $_REQUEST['fecha'];


        $responseData = $this->CitaModel->selectUserCitasFecha($usuario, $fecha);

        echo json_encode($responseData);

    }

}
