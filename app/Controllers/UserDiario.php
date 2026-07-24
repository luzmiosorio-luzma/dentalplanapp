<?php

namespace App\Controllers;

use App\Models\CitaModel;


class UserDiario extends BaseController
{
    public function __construct()
    {
        $this->CitaModel = new CitaModel();
    }

    public function addCita()
    {

        $userData = $_REQUEST;

        $responseData = $this->CitaModel->insertCita($userData);

        echo $responseData;
    }

    function getUserCitas()
    {

        $session = \Config\Services::session();
        $usuario = $session->get('user');

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
