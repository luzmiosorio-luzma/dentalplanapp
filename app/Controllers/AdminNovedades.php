<?php

namespace App\Controllers;

use App\Models\NovedadModel;


class AdminNovedades extends BaseController
{
    public function __construct()
    {
        $this->NovedadModel = new NovedadModel();
    }


    public function getAdminNovedades()
    {

        $novedades = $this->NovedadModel->selectNovedades();

        echo '{"data": ' . json_encode($novedades) . '}';

    }

    public function putEditAdminNovedad()
    {
        helper('utils_helper');

        $data = $_POST;

        if (!empty($_FILES['file']['name'])) {
            $files = $_FILES;
            $data['uuid'] = generateUUIDv4();
            $data['file'] = $files['file'];
        }

        $response = $this->NovedadModel->updateNovedad($data);

        echo '{"data": ' . json_encode($response) . '}';
    }

    public function putAdminNovedad()
    {

        helper('utils_helper');

        $files = $_FILES;
        $data = $_POST;

        $data['file'] = $files['file'];
        $data['uuid'] = generateUUIDv4();

        $response = $this->NovedadModel->insertNovedad($data);

        echo '{"data": ' . json_encode($response) . '}';
    }

}
