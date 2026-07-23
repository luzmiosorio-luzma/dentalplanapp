<?php

namespace App\Controllers;

use App\Models\EgresoModel;

class AdminMensual extends BaseController
{
    public function __construct()
    {
        $this->EgresoModel = new EgresoModel();
    }

    function getBalance()
    {

        $usuario = $_REQUEST['usuario'];
        $mes = $_REQUEST['mes'];
        $anio = $_REQUEST['anio'];

        $query_date = $anio.'-'.$mes.'-01';
        $fecha_inicio= $query_date;
        $fecha_termino= date('Y-m-t', strtotime($query_date));


        $responseData['tabla'] = $this->EgresoModel->getUserEgresos($usuario, $fecha_inicio, $fecha_termino);
        $ingresos = $this->EgresoModel->getUserResumenIngresos($usuario, $fecha_inicio, $fecha_termino);
        $egresos = $this->EgresoModel->getUserResumenEgresos($usuario, $fecha_inicio, $fecha_termino);

        $responseData['ingresos'] = number_format($ingresos,0,',', '.');
        $responseData['egresos'] = number_format($egresos,0,',', '.');
        $responseData['neto'] = number_format($ingresos-$egresos,0,',', '.');

//        echo json_encode($responseData);
        echo  '{"data": ' . json_encode($responseData) . '}';

    }

    function addEgreso(){

        $data = $_REQUEST;

        $responseData = $this->EgresoModel->insertEgreso($data);

        echo json_encode($responseData);

    }

    function editEgreso(){
        $data = $_REQUEST;

        $responseData = $this->EgresoModel->updateEgreso($data);

        echo json_encode($responseData);
    }

}
