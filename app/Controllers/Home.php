<?php

namespace App\Controllers;

use App\Models\UserModel;

// reference the Dompdf namespace
use Dompdf\Dompdf;

class Home extends BaseController
{
    public function __construct()
    {
        require_once APPPATH . "ThirdParty/dompdf/autoload.inc.php";
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $session = \Config\Services::session();

        if ($session->has('username')) {
            return redirect()->to('admin');
        } else {
            return view('login');
        }

    }

    public function saveresetpass(){
        $pass = $_POST['pass'];
        $validationUser = $_POST['validationUser'];

        $userId =  $this->UserModel->desencriptar($validationUser);

        if ($userId && $pass){
            //ACTUALIZAR CONTRASEÑA

            $res = $this->UserModel->actualizarPass($userId, $pass);

            if ($res === 'true') {
                $return = ['success'];
            }else{
                $return = ['error'];
            }
        }else{
            $return = ['error'];
        }

        echo json_encode($return);
    }

    public function recover()
    {

        $mail = $_POST['email'];

        $result = $this->UserModel->recoverPasswordByEmail($mail);


        if (count($result) === 0){
            echo json_encode(['result' => "error"]);
        } else {
            //GENERAR ENLACE DE RECUPERACION

            $id = $result[0];

            $numero_encriptado = $this->UserModel->encriptar($id);
            $vu = 'vu='.$numero_encriptado;
            $url = base_url(). '/resetpass?'.$vu;

//            $numero = '1000'; // Tu número a encriptar
//            $numero_encriptado = $this->UserModel->encriptar($numero);
//            $numero_desencriptado = $this->UserModel->desencriptar($numero_encriptado);

            //ENVIAR CORREO CON ENLACE DE RECUPERACION
            ini_set("memory_limit", "512M");

            $email = \Config\Services::email();

            $email->setTo($mail);
            $email->setFrom('presupuesto@dentalplan.cl', 'DentalPlan');
            $email->setBCC(['alonsoleon89@gmail.com', 'luzmiosorio@gmail.com']);



            $email->setSubject('DentalPlan - Recuperar Contraseña');
            $titulo = '<h3 style="color: #000">Estimado usuario, se ha generado una solicitud de recuperación de contraseña.</h3>';
            $titulo .= '<h4 style="color: #000">Para recuperar su contraseña, ingrese en el siguiente enlace</h4>';
            $titulo .= '<a href="'.$url.'">Enlace recuperar contraseña</a>';
            $email->setMessage($titulo);

            if ($email->send()) {
//            echo '<br>Correo Enviado Correctamente, puede cerrar esta ventana';
                echo json_encode(['result' => "success"]);
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }

            // ENVIAR RESPUESTA
//            echo json_encode(['result' => "success"]);
        }
    }

    public function forbidden()
    {
        return view('forbidden');
    }

    public function resetpass()
    {

        $data = $_REQUEST;

        try {
            $user = $data['vu'];
            return view('resetpass');
        } catch (\Exception $e) {
            return redirect()->to('forbidden');
        }

    }

    public function mailsent()
    {
        return view('mailsent');
    }

    public function mailnotexist()
    {
        return view('mailnotexist');
    }

    public function sendmail()
    {

        $email = \Config\Services::email();

        $email->setTo('alonsoleon89@gmail.com');
        $email->setFrom('presupuesto@dentalplan.cl', 'DentalPlan');
        $email->setBCC(['alonsoleon89@gmail.com', 'luzmiosorio@gmail.com']);



        $titulo = '<h3 style="color: #000">Estimado usuario, ha recibido un presupuesto adjunto.</h3><br>';


        $email->setSubject('DentalPlan - Presupuesto');
        $email->setMessage($titulo);

        if ($email->send()) {
            echo '<br>Email successfully sent';
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }

    }


    public function pdf()
    {


        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF to Browser
        $dompdf->stream();
    }
}
