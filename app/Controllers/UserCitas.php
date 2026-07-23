<?php

namespace App\Controllers;

use App\Models\CitaModel;
use App\Models\TareaModel;


class UserCitas extends BaseController
{
    public function __construct()
    {
        $this->CitaModel = new CitaModel();
        $this->TareaModel = new TareaModel();
    }

    public function addCita()
    {

        $userData = $_REQUEST;

        $responseData = $this->CitaModel->insertCita($userData);

        echo $responseData;
    }

    function getTareas(){

        $usuario = $_REQUEST['usuario'];

        $start = $_REQUEST['start'];
        $date_start = new \DateTime($start);
        $fecha_inicio = $date_start->format("Y-m-d");

        $end = $_REQUEST['end'];
        $date_end = new \DateTime($end);
        $date_end->modify("-1 day");
        $fecha_termino = $date_end->format("Y-m-d");


        $responseData['tabla_tareas']= $this->TareaModel->selectTareasUsuarioByMes($usuario, $fecha_inicio, $fecha_termino);
        $responseData['dateinit'] = $fecha_inicio;
        $responseData['dateend'] = $fecha_termino;

        echo  '{"data": ' . json_encode($responseData) . '}';
    }

    function getUserCitas()
    {

        $usuario = $_REQUEST['usuario'];

        $responseData = $this->CitaModel->selectUserCitas($usuario);

        echo json_encode($responseData);

    }

    public function getCitaDetalle()
    {

        $idCita = $_REQUEST['idCita'];

        $responseData = $this->CitaModel->selectCitaDetalle($idCita);

        echo json_encode($responseData);
    }

    public function editCita()
    {

        $citaData = $_REQUEST;

        $responseData = $this->CitaModel->updateCita($citaData);

        echo $responseData;
    }

    public function removeCita()
    {

        $idCita = $_REQUEST['idCita'];

        $responseData = $this->CitaModel->deleteCita($idCita);

        echo $responseData;
    }

}
