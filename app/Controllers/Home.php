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
        $token = $_POST['validationUser'] ?? '';
        $pass = $_POST['pass'] ?? '';

        if (!$token || !$pass) {
            echo json_encode(['error']);
            return;
        }

        $tokenHash = hash('sha256', $token);
        $db = db_connect();

        $row = $db->query(
            "SELECT id_token, idusuario FROM password_reset_token WHERE token_hash = ? AND usado = 0 AND fecha_expiracion > NOW()",
            [$tokenHash]
        )->getRow();

        if (!$row) {
            echo json_encode(['error']);
            return;
        }

        try {
            $db->transStart();
            $this->UserModel->actualizarPass($row->idusuario, $pass);
            $db->query("UPDATE password_reset_token SET usado = 1 WHERE id_token = ?", [$row->id_token]);
            $db->transComplete();
        } catch (\Throwable $e) {
            $db->transRollback();
            echo json_encode(['error']);
            return;
        }

        if ($db->transStatus() === false) {
            echo json_encode(['error']);
            return;
        }

        echo json_encode(['success']);
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

            $token = $this->UserModel->generarTokenReset($id);
            $vu = 'vu='.$token;
            $url = base_url(). '/resetpass?'.$vu;

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
        $token = $_GET['vu'] ?? '';

        if (!preg_match('/^[a-f0-9]{64}$/', $token)) {
            return redirect()->to('forbidden');
        }

        $tokenHash = hash('sha256', $token);
        $db = db_connect();
        $row = $db->query(
            "SELECT id_token FROM password_reset_token WHERE token_hash = ? AND usado = 0 AND fecha_expiracion > NOW()",
            [$tokenHash]
        )->getRow();

        if (!$row) {
            return redirect()->to('forbidden');
        }

        return view('resetpass');
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
