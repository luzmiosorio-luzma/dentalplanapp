<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UnidadModel;
use App\Models\NovedadModel;


class Admin extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->UnidadModel = new UnidadModel();
        $this->NovedadModel = new NovedadModel();
    }


    public function index()
    {
        return redirect()->to('admin/usuarios');
    }

    public function usuarios()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');

        if ($session->get('role') == 1) {
            echo view('admin/usuarios', $data);
        } else {
            return redirect()->to('user');
        }

    }

    public function citas()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');


        $usuarios = $this->UserModel->selectInputActiveUsers();
        $data['usuarios'] = $usuarios;

        if ($session->get('role') == 1) {
            echo view('admin/citas', $data);
        } else {
            return redirect()->to('user');
        }

    }

    public function productos()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');

        $unidades = $this->UnidadModel->selectUnidadesActivas();
        $data['unidades'] = $unidades;

        if ($session->get('role') == 1) {
            echo view('admin/productos', $data);
        } else {
            return redirect()->to('user');
        }

    }

    public function unidades()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');

        if ($session->get('role') == 1) {
            echo view('admin/unidades', $data);
        } else {
            return redirect()->to('user');
        }

    }

    public function diario()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');

        $usuarios = $this->UserModel->selectInputActiveUsers();
        $data['usuarios'] = $usuarios;

        if ($session->get('role') == 1) {
            echo view('admin/diario', $data);
        } else {
            return redirect()->to('user');
        }

    }

    public function mensual()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');

        $usuarios = $this->UserModel->selectInputActiveUsers();
        $data['usuarios'] = $usuarios;

        if ($session->get('role') == 1) {
            echo view('admin/mensual', $data);
        } else {
            return redirect()->to('user');
        }

    }

    public function presupuesto()
    {
        $session = session();
        $data['name'] = $session->get('name');
        $data['role'] = $session->get('role');

        $usuarios = $this->UserModel->selectInputActiveUsers();
        $data['usuarios'] = $usuarios;

        if ($session->get('role') == 1) {
            echo view('admin/presupuesto', $data);
        } else {
            return redirect()->to('user');
        }

    }

    public function novedades()
    {
        $session = session();

        if ($session->get('role') == 1) {
            echo view('admin/novedades');
        } else {
            return redirect()->to('user');
        }

    }

}
