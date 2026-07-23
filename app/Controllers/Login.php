<?php

namespace App\Controllers;
use App\Models\CommonModel;


class Login extends BaseController
{

    public function __construct()
    {
        $this->CommonModel = new CommonModel();
    }

    public function index()
    {

        $session = \Config\Services::session();

        if ($session->has('username')) {
            return view('/home');
        } else {
            return view('login');
        }
    }

    public function startLogIn()
    {
        $session = \Config\Services::session();
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $data = $this->CommonModel->login($email, $password);

        if ($data['status'] === true){
            $session->set('user', $data['code']);
            $session->set('name', $data['name']);
            $session->set('email', $data['email']);
            $session->set('isLoggedIn', true);
            $session->set('role', $data['role']);

//            return redirect()->to('home');
            return redirect()->to('admin/usuarios?test=true');

        }else{
            return redirect()->to('/?err_type=1');
        }
    }

    public function startLogOut()
    {
        $session = \Config\Services::session();
        $session->remove('user');
        $session->remove('name');
        $session->remove('email');
        $session->remove('isLoggedIn');
        $session->remove('role');

        return redirect()->to('/');
    }
}
