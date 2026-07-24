<?php

namespace App\Controllers;

use App\Models\EgresoModel;
use App\Models\TareaModel;

class UserMensual extends BaseController
{
    public function __construct()
    {
        $this->EgresoModel = new EgresoModel();
        $this->TareaModel = new TareaModel();
    }

    function addOtroIngreso(){
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $responseData = $this->EgresoModel->insertIngreso($data);

        echo json_encode($responseData);
    }
    function getBalance()
    {

        $session = \Config\Services::session();
        $usuario = $session->get('user');
        $mes = $_REQUEST['mes'];
        $anio = $_REQUEST['anio'];
        $percent_txt = $this->EgresoModel->getImpuestoActual();
        $percent = $percent_txt / 100;

//        SELECT impuesto/100 FROM `impuesto` WHERE anio = YEAR(CURDATE())

        $query_date = $anio . '-' . $mes . '-01';
        $fecha_inicio = $query_date;
        $fecha_termino = date('Y-m-t', strtotime($query_date));


        $responseData['tabla_egresos'] = $this->EgresoModel->getUserEgresos($usuario, $fecha_inicio, $fecha_termino);
        $responseData['tabla_ingresos'] = $this->EgresoModel->getUserIngresos($usuario, $fecha_inicio, $fecha_termino);
        $responseData['tabla_tareas'] = $this->TareaModel->selectTareasUsuarioByMes($usuario, $fecha_inicio, $fecha_termino);
        $ingresos = $this->EgresoModel->getUserResumenIngresos($usuario, $fecha_inicio, $fecha_termino);
        $otrosIngresos = $this->EgresoModel->getUserResumenOtrosIngresos($usuario, $fecha_inicio, $fecha_termino);


        $ingresos_brutos = $ingresos['con_boleta'] + $ingresos['sin_boleta'] + $otrosIngresos['con_boleta'] + $otrosIngresos['sin_boleta'];
        $impuestos = $ingresos['con_boleta'] * $percent;
        $otros_impuestos = $otrosIngresos['con_boleta'] * $percent;
        $ingresos_brutos_con_impuesto = (($ingresos['con_boleta'] - $impuestos) + $ingresos['sin_boleta'])+(($otrosIngresos['con_boleta'] - $otros_impuestos) + $otrosIngresos['sin_boleta']);


        $egresos = $this->EgresoModel->getUserResumenEgresos($usuario, $fecha_inicio, $fecha_termino);
        $responseData['egresos_detalle'] = $this->EgresoModel->getUserResumenEgresosDetalle($usuario, $fecha_inicio, $fecha_termino);

        $responseData['ingresos_con_boleta'] = number_format($ingresos['con_boleta'], 0, ',', '.');
        $responseData['ingresos_sin_boleta'] = number_format($ingresos['sin_boleta'], 0, ',', '.');
        $responseData['otros_ingresos_con_boleta'] = number_format($otrosIngresos['con_boleta'], 0, ',', '.');
        $responseData['otros_ingresos_sin_boleta'] = number_format($otrosIngresos['sin_boleta'], 0, ',', '.');

        $responseData['ingresos'] = number_format($ingresos_brutos, 0, ',', '.');
        $responseData['egresos'] = number_format($egresos, 0, ',', '.');
        $responseData['neto'] = number_format($ingresos_brutos_con_impuesto - $egresos, 0, ',', '.');
        $responseData['impuestos'] = number_format(($impuestos + $otros_impuestos), 0, ',', '.');
        $responseData['txt_impuesto'] = $percent_txt;

//        echo json_encode($responseData);
        echo '{"data": ' . json_encode($responseData) . '}';

    }

    function editTareaFecha()
    {
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $response = $this->TareaModel->updateTareaFecha($data);

        echo json_encode($response);
    }

    function editTareaDetalle()
    {
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $response = $this->TareaModel->updateTareaDetalle($data);

        echo json_encode($response);
    }

    function eliminarTarea()
    {
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $response = $this->TareaModel->deleteTarea($data);

        echo json_encode($response);
    }

    function editTareaEstado()
    {
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $response = $this->TareaModel->updateTareaEstado($data);

        echo json_encode($response);
    }

    function addEgreso()
    {

        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $responseData = $this->EgresoModel->insertEgreso($data);

        echo json_encode($responseData);

    }

    function editEgreso()
    {
        $session = \Config\Services::session();
        $usuario = $session->get('user');
        $data = $_REQUEST;

        if (!$this->EgresoModel->egresoBelongsToUsuario((int) $data['id'], (int) $usuario)) {
            echo json_encode('false');
            return;
        }

        $responseData = $this->EgresoModel->updateEgreso($data);

        echo json_encode($responseData);
    }

}
