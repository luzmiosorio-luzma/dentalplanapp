<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PacienteModel;
use App\Models\EgresoModel;
use App\Models\OdontoModel;
use App\Models\CitaModel;
use App\Models\NovedadModel;



class User extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->PacienteModel = new PacienteModel();
        $this->EgresoModel = new EgresoModel();
        $this->OdontoModel = new OdontoModel();
        $this->CitaModel = new CitaModel();
        $this->NovedadModel = new NovedadModel();

    }


    public function index()
    {
        $isJustLogged = 'true';
        return redirect()->to('user/citas?isJustLogged=true');
    }

    public function buscarPacientes()
    {
        $session = session();
        $paciente = $_REQUEST['paciente'];
        $id_usuario = $session->get('user');

        $pacientes = $this->PacienteModel->selectPacientesBuscar($id_usuario, $paciente);

        echo json_encode($pacientes);

    }

    public function citas()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');
        $data['user_id'] = $session->get('user');

        $arr_pacientes = $this->PacienteModel->selectPacientes($data['user_id']);

        $pacientes = array();

        foreach ($arr_pacientes as $row) {
            $arr['idpaciente'] = $row['idpaciente'];
            $arr['nombre'] = $row['nombre'];
            $arr['rut'] = $row['rut'];
            $pacientes[] = $arr;
        }

        $data_usuario = $this->UserModel->selectUserInfo($data['user_id']);
        $data['logo'] = base_url() . '/public/uploads/logo/' . $data_usuario[0]['logo'];
        $data['logo_exist'] = $data_usuario[0]['logo'] != '' ? true : false;

        $data['pacientes'] = $pacientes;
        $data['duracion'] = $this->CitaModel->selectDuraciones();


        $novedades= $this->NovedadModel->selectNovedades('true');
        $data['novedades'] = $novedades;

        echo view('user/citas', $data);

    }

    public function diario()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');
        $data['user_id'] = $session->get('user');

        $arr_pacientes = $this->PacienteModel->selectPacientes($data['user_id']);

        $pacientes = array();

        foreach ($arr_pacientes as $row) {
            $arr['idpaciente'] = $row['idpaciente'];
            $arr['nombre'] = $row['nombre'];
            $pacientes[] = $arr;
        }

        $data['pacientes'] = $pacientes;

        echo view('user/diario', $data);

    }

    public function mensual()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');
        $data['user_id'] = $session->get('user');
        $data['tipo_egreso'] = $this->EgresoModel->getTipoEgresos();

        $data_usuario = $this->UserModel->selectUserInfo($data['user_id']);
        $data['logo'] = base_url() . '/public/uploads/logo/' . $data_usuario[0]['logo'];
        $data['logo_exist'] = $data_usuario[0]['logo'] != '' ? true : false;

        echo view('user/mensual', $data);

    }

    public function presupuesto()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');
        $data['user_id'] = $session->get('user');

        echo view('user/presupuesto', $data);
    }

    public function perfil()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');
        $data['user_id'] = $session->get('user');

        $data_usuario = $this->UserModel->selectUserInfo($data['user_id']);
        $data['logo'] = base_url() . '/public/uploads/logo/' . $data_usuario[0]['logo'];
        $data['logo_exist'] = $data_usuario[0]['logo'] != '' ? true : false;

        echo view('user/perfil', $data);
    }

    public function pacientes()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');
        $data['user_id'] = $session->get('user');

        $data['sexo'] = $this->UserModel->getDataSexo();

        $data_usuario = $this->UserModel->selectUserInfo($data['user_id']);
        $data['logo'] = base_url() . '/public/uploads/logo/' . $data_usuario[0]['logo'];
        $data['logo_exist'] = $data_usuario[0]['logo'] != '' ? true : false;

        echo view('user/pacientes', $data);
    }

    public function ficha()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');
        $data['user_id'] = $session->get('user');

        if (isset($_GET['pid'])) {
            $paciente_id = $_GET['pid'];
            $data['paciente'] = $this->PacienteModel->getPacienteData($paciente_id);
            $data['paciente']['id_paciente'] = $paciente_id;
            $data['odontos'] = $this->OdontoModel->getUserPacienteOdontos($data['user_id'], $paciente_id);
            $data['caras'] = $this->OdontoModel->getCaraItems();
            $data['raices'] = $this->OdontoModel->getRaizItems();

            $data_usuario = $this->UserModel->selectUserInfo($data['user_id']);
            $data['logo'] = base_url() . '/public/uploads/logo/' . $data_usuario[0]['logo'];
            $data['logo_exist'] = $data_usuario[0]['logo'] != '' ? true : false;

            echo view('user/ficha', $data);
        } else {
            return redirect()->to('user');
        }

    }
}
