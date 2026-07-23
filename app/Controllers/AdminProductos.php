<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class AdminProductos extends BaseController
{
    public function __construct()
    {
        $this->ProductoModel = new ProductoModel();
    }

    public function addProducto()
    {
        $data = $_REQUEST;

        $responseData = $this->ProductoModel->insertProducto($data);

        echo $responseData;
    }

    public function editProducto()
    {
        $data = $_REQUEST;

        $responseData = $this->ProductoModel->updateProducto($data);

        echo $responseData;
    }

    function getProductos()
    {
        $response = $this->ProductoModel->selectProductos();

        echo  '{"data": ' . json_encode($response) . '}';

    }

}
