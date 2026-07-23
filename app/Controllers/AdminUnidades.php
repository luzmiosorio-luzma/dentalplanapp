<?php

namespace App\Controllers;

use App\Models\UnidadModel;

class AdminUnidades extends BaseController
{
    public function __construct()
    {
        $this->UnidadModel = new UnidadModel();
    }

    public function addUnidad()
    {

        $data = $_REQUEST;

        $responseData = $this->UnidadModel->insertUnidad($data);

        echo $responseData;
    }

    public function editUnidad()
    {

        $data = $_REQUEST;

        $responseData = $this->UnidadModel->updateUnidad($data);

        echo $responseData;
    }

    function getUnidades()
    {
        $response = $this->UnidadModel->selectUnidades();

        echo  '{"data": ' . json_encode($response) . '}';

    }

}
