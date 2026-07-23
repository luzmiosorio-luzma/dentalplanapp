<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminUsuarios extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }



    public function addUser()
    {

        $userData = $_REQUEST;

        $responseData = $this->UserModel->insertUser($userData);

        echo $responseData;
    }

    public function editUser()
    {

        $userData = $_REQUEST;

        $responseData = $this->UserModel->updateUser($userData);

        echo $responseData;
    }

    function getUsers()
    {
        $response = $this->UserModel->selectUsers();

        echo  '{"data": ' . json_encode($response) . '}';

    }

    function getDataUsuario()
    {
        $id_usuario = $_REQUEST['user'];

        $response = $this->UserModel->selectUserInfo($id_usuario);

        echo  '{"data": ' . json_encode($response) . '}';

    }

    function updateDataUsuario(){
        $data = $_REQUEST;

        $response = $this->UserModel->updateUserData($data);

        echo $response;
    }

    public function putSaveFirma(){
        helper('utils_helper');

        $data = $_REQUEST;

        $response = $this->UserModel->insertSaveFirma($data);

        echo $response;
    }

    public function getFirma(){
        helper('utils_helper');

        $data = $_REQUEST;

        $response = $this->UserModel->selectFirma($data);

        $formated = json_encode($response);

        print_r($formated);

//        echo '{"data": ' . json_encode($response) . '}';
    }

}
