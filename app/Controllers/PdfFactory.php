<?php

namespace App\Controllers;
// reference the Dompdf namespace
use Dompdf\Dompdf;
use App\Models\PresupuestoModel;
use App\Models\PacienteModel;


class PdfFactory extends BaseController
{

    public function __construct()
    {
        require_once APPPATH . "ThirdParty/dompdf/autoload.inc.php";
        $this->PresupuestoModel = new PresupuestoModel();
        $this->PacienteModel = new PacienteModel();
    }

    public function sendContacto()
    {
        // Cabeceras CORS y tipo de respuesta
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');

        // Responder inmediatamente a preflight OPTIONS
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        // Solo aceptar POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['result' => 'error', 'success' => false, 'message' => 'Método no permitido']);
            exit;
        }

        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
            http_response_code(400);
            echo json_encode(['result' => 'error', 'success' => false, 'message' => 'JSON inválido']);
            exit;
        }

        // Sanitizar entradas
        $nombre = isset($data['nombre']) ? trim(strip_tags($data['nombre'])) : '';
        $correo = isset($data['correo']) ? trim(strip_tags($data['correo'])) : '';
        $fono = isset($data['fono']) ? trim(strip_tags($data['fono'])) : '';
        $company = isset($data['company']) ? trim(strip_tags($data['company'])) : '';
        $mensaje = isset($data['mensaje']) ? trim(strip_tags($data['mensaje'])) : '';

        // Validar campos requeridos
        if ($nombre === '' || $correo === '') {
            http_response_code(400);
            echo json_encode(['result' => 'error', 'success' => false, 'message' => 'Nombre y correo son campos requeridos']);
            exit;
        }

        // Validar mínimo de caracteres
        if (mb_strlen($nombre) < 2) {
            http_response_code(400);
            echo json_encode(['result' => 'error', 'success' => false, 'message' => 'El nombre debe tener al menos 2 caracteres']);
            exit;
        }

        // Validar formato de email
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode(['result' => 'error', 'success' => false, 'message' => 'El formato del correo electrónico no es válido']);
            exit;
        }

        $contenido = view('emails/contacto', [
            'nombre' => $nombre,
            'correo' => $correo,
            'fono'   => $fono,
            'company'=> $company,
            'mensaje'=> $mensaje,
        ]);

        $sent = false;
        $errorMsg = '';
        $vendorAutoload = ROOTPATH . 'vendor/autoload.php';
        if (file_exists($vendorAutoload)) {
            require_once $vendorAutoload;
        }

        if (class_exists('\PHPMailer\PHPMailer\PHPMailer')) {
            $emailConfig = new \Config\Email();
            $smtpHost = $emailConfig->SMTPHost ?? 'smtp-relay.sendinblue.com';
            $smtpUser = $emailConfig->SMTPUser ?? 'alonsoleon89@gmail.com';
            $smtpPass = $emailConfig->SMTPPass ?? 'UDrI2dLMwaATFs8m';
            $smtpPort = $emailConfig->SMTPPort ?? 587;

            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = $smtpHost;
                $mail->SMTPAuth = true;
                $mail->Username = $smtpUser;
                $mail->Password = $smtpPass;
                $mail->SMTPSecure = ($smtpPort === 465) ? \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS : \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = $smtpPort;
                $mail->CharSet = 'UTF-8';

                $mail->setFrom('presupuesto@dentalplan.cl', 'DentalPlan');
                $mail->addAddress('alonsoleon89@gmail.com', 'DentalPlan');
                $mail->addBCC('alonsoleon89@gmail.com');
                $mail->addReplyTo($correo, $nombre);

                $mail->isHTML(true);
                $mail->Subject = 'DentalPlan - Mensaje de Contacto';
                $mail->Body = $contenido;
                $mail->AltBody = "Nombre: $nombre\nCorreo: $correo\nFono: $fono\nCompañía: $company\nMensaje:\n$mensaje";

                $mail->send();
                $sent = true;
            } catch (\Exception $e) {
                $errorMsg = $mail->ErrorInfo;
            }
        } else {
            // Opción B: mail() nativo del servidor
            $subject = "=?UTF-8?B?" . base64_encode('DentalPlan - Mensaje de Contacto') . "?=";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "From: =?UTF-8?B?" . base64_encode('DentalPlan') . "?= <contacto@dentalplan.cl>\r\n";
            $headers .= "Reply-To: {$correo}\r\n";
            $headers .= "Cc: alonsoleon89@gmail.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            if (@mail('contacto@dentalplan.cl', $subject, $contenido, $headers)) {
                $sent = true;
            } else {
                $errorMsg = 'Error al llamar a la función mail() del servidor';
            }
        }

        if ($sent) {
            http_response_code(200);
            echo json_encode(['result' => 'success', 'success' => true, 'message' => 'Correo enviado exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['result' => 'error', 'success' => false, 'message' => 'Error al enviar el correo: ' . $errorMsg]);
        }
    }

    public function sendPresupuesto()
    {
        ini_set("memory_limit", "512M");
        $session = session();
        $user = $session->get('user');
        $html_path = ROOTPATH . "public/uploads/2.html";
        $id_presupuesto = $_REQUEST['idp'];

        $email = \Config\Services::email();

        //        $email->setTo('alonsoleon89@gmail.com');
//        $email->setTo('alonsoleon89@gmail.com', 'od.francopiffardi@gmail.com', 'luzmiosorio@gmail.com');
//        $email->setFrom('alonsoleon898989@gmail.com', 'DentalPlan');
        $email->setFrom('presupuesto@dentalplan.cl', 'DentalPlan');
        $email->setBCC(['alonsoleon89@gmail.com', 'luzmiosorio@gmail.com']);
        //        $email->setCC('od.francopiffardi@gmail.com', 'Franco P');
//        $email->setCC('luzmiosorio@gmail.com', 'Luzmira O');


        $email->setSubject('DentalPlan - Presupuesto');
        $titulo = '<h3 style="color: #000">Estimado usuario, ha recibido un presupuesto adjunto.</h3><br>';
        $email->setMessage($titulo);



        // PDF

        //GET DATA PRESUPUESTO
        $responseData['presupuesto'] = $this->PresupuestoModel->selectDataPresupuesto($id_presupuesto);
        $nombrePresupuesto = $this->PresupuestoModel->getNombrePresupuestoById($id_presupuesto);
        $id_paciente = $responseData['presupuesto'][0]['idpaciente'];
        $data_paciente = $this->PacienteModel->getPacienteData($id_paciente);
        $responseData['items'] = $this->PresupuestoModel->selectItemsPresupuesto($id_presupuesto);
        $responseData['subtotal'] = $this->PresupuestoModel->selectSubtotalPresupuesto($id_presupuesto);
        $espec = $this->PresupuestoModel->selectPresupuestoTratanteData($user);

        $mail_paciente = $data_paciente['mail'];

        if ($mail_paciente == '' || !$mail_paciente) {
            return redirect()->to('mailnotexist');
        } else {
            $email->setTo($mail_paciente);

            //FORMAT DATA
            $paciente = $data_paciente['nombre'];
            $fecha = $responseData['presupuesto'][0]['fecha'];
            $fono = $data_paciente['fono'];
            $subtotal = $responseData['subtotal'];
            $descuento = $responseData['presupuesto'][0]['descuento'];
            $med_nombre = $espec[0]['nombre'];
            $med_oficina = $espec[0]['oficina'];
            $med_fono = $espec[0]['fono'];
            $med_mail = $espec[0]['correo'];
            $med_red_social = $espec[0]['red_social'];
            $med_logo = $espec[0]['logo'];

            $email->setCC($med_mail, $med_nombre);

            if ($med_logo) {
                $path_logo = base_url() . '/public/uploads/logo/' . $med_logo;
            } else {
                $path_logo = base_url() . '/public/uploads/logo/default.png';
            }

            $pesos_descuento = ($descuento / 100) * $subtotal;
            $total = $subtotal - $pesos_descuento;
            $format_subtotal = "$" . number_format($subtotal, 0, ',', '.');
            $format_descuento = "%" . number_format($descuento, 0, ',', '.');
            $format_total = "$" . number_format($total, 0, ',', '.');

            $pdf_init = '<html><head><title>Title</title><meta charset="UTF-8"></head><body';
            $pdf_end = '</body></html>';

            $pdf_1 = '<hr> <table> <tr style="max-width: 450px"> <td><img style="width: 150px" src="';
            $pdf_2 = '"></td> <td> <table> <tr> <td></td> <td>Paciente:</td> <td>';
            $pdf_3 = '</td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td>Fecha:</td> <td>';
            $pdf_4 = '</td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td>Fono:</td> <td>';
            $pdf_5 = '</td> </tr> <tr> <td></td> <td>Número de presupuesto:</td> <td>';
            $pdf_5_1 = '</td> </tr> <tr> <td></td> <td>Nombre de presupuesto:</td> <td>';
            $pdf_6 = '</td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td class="align-left" colspan="3">Presupuesto válido por 30 días</td> </tr> </table> </td> </tr> </table> <hr> <hr> <table class="table_items"> <tr> <th class="t_uno align-left">Descripción</th> <th class="t_dos">Diente</th> <th class="t_tres">Observaciones</th> <th>Total</th> </tr> ';

            //EXAMPLE ITEM ROW, LOOP THIS
            $pdf_7 = '<tr> <td class="align-left">1</td> <td>2</td> <td>3</td> <td>4</td> </tr>';
            $pdf_7_1 = '';
            foreach ($responseData['items'] as $item) {
                $valor = "$" . number_format($item['valor'], '0', ',', '.');
                $pdf_7_1 .= '<tr> <td class="align-left">' . $item['descripcion'] . '</td> <td>' . $item['diente'] . '</td> <td>' . $item['observacion'] . '</td> <td class="align-left">' . $valor . '</td> </tr>';
            }
            $pdf_8 = '</table> <hr> <table class="w-100"> <tr class="w-100"> <td class="subtotal_span"></td> <td> <table class="table_items table_subtotal"> <tr> <td class="align-left sub_title">Subtotal:</td> <td class="align-left">';
            $pdf_9 = '</td> </tr> <tr> <td class="align-left sub_title">Descuento:</td> <td class="align-left">';
            $pdf_10 = '</td> </tr> <tr> <td class="align-left sub_title">Total:</td> <td class="align-left">';
            $pdf_11 = '</td> </tr> </table> </td> </tr> </table> <hr> <table class="w-100 table_separator_uno"> <tr class="w-100"> <td class="subtotal_span"> <table class="w-100"> <tr> <td class="align-center">';
            $pdf_12 = '</td> </tr> <tr> <td class="align-center">';
            $pdf_13 = '</td> </tr> <tr> <td class="align-center">';
            $pdf_14 = '</td> </tr> <tr> <td class="align-center">';
            $pdf_15 = '</td> </tr> <tr> <td class="align-center">';
            $pdf_16 = '</td> </tr> </table> </td> <td> <table class="table_items table_subtotal"> <tr> <td><br><br><br><br><br> </td> </tr> <tr> <td class="align-center sub_title">Firma Paciente</td> </tr> </table> </td> </tr> </table>';
            $styles = '<style> @page { margin-left: 0.5cm; margin-right: 0.5cm; } body { font-size: 12px; margin: 0; padding: 0; font-family: sans-serif } hr { height: 10px; background-color: #44476a; margin-top: 10px; margin-bottom: 10px; } .table_items { width: 100%; border: 1px solid #44476a; border-collapse: collapse; } .table_items th { border: 1px solid #44476a; border-collapse: collapse; } .table_items td { border: 1px solid #44476a; border-collapse: collapse; text-align: center; } .w-100 { width: 100%; } .w-50 { width: 50%; } .subtotal_span { width: 56.5%; } .align-left { text-align: left !important; padding-left: 5px; } .align-center { text-align: center !important; } .t_uno { width: 50%; } .t_dos { width: 7%; } .t_tres { width: 30%; } .sub_title { width: 70.5%; } .m-0 { margin: 0; } .p-0 { padding: 0; } .table_separator_uno{ margin-bottom: 200px; } </style>';

            $contenido = $pdf_1 . $path_logo . $pdf_2 . $paciente . $pdf_3 . $fecha . $pdf_4 . $fono . $pdf_5 . $id_presupuesto . $pdf_5_1 . $nombrePresupuesto . $pdf_6 . $pdf_7_1 . $pdf_8 . $format_subtotal . $pdf_9 . $format_descuento . $pdf_10 . $format_total . $pdf_11 . $med_nombre . $pdf_12 . $med_oficina . $pdf_13 . $med_fono . $pdf_14 . $med_mail . $pdf_15 . $med_red_social . $pdf_16;

            // instantiate and use the dompdf class
            $dompdf = new Dompdf(array('enable_remote' => true));

            $dompdf->loadHtml($pdf_init . $styles . $contenido . $pdf_end);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('letter', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            $output = $dompdf->output();

            $email->attach($output, 'attachment', 'report.pdf', 'application/pdf');

            if ($email->send()) {
                //echo '<br>Correo Enviado Correctamente, puede cerrar esta ventana';
                return redirect()->to('mailsent');
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        }
    }

    public function generaPdfPresupuesto()
    {
        ini_set("memory_limit", "512M");
        $session = session();
        $user = $session->get('user');

        $html_path = ROOTPATH . "public/uploads/2.html";
        $id_presupuesto = $_REQUEST['idp'];


        $responseData['presupuesto'] = $this->PresupuestoModel->selectDataPresupuesto($id_presupuesto);
        $id_paciente = $responseData['presupuesto'][0]['idpaciente'];
        $data_paciente = $this->PacienteModel->getPacienteData($id_paciente);

        //GET DATA PRESUPUESTO
        $nombrePresupuesto = $this->PresupuestoModel->getNombrePresupuestoById($id_presupuesto);
        $responseData['items'] = $this->PresupuestoModel->selectItemsPresupuesto($id_presupuesto);
        $responseData['subtotal'] = $this->PresupuestoModel->selectSubtotalPresupuesto($id_presupuesto);
        $espec = $this->PresupuestoModel->selectPresupuestoTratanteData($user);

        //FORMAT DATA
        $paciente = $data_paciente['nombre'];
        $fecha = $responseData['presupuesto'][0]['fecha'];
        $fono = $data_paciente['fono'];
        $subtotal = $responseData['subtotal'];
        $descuento = $responseData['presupuesto'][0]['descuento'];
        $med_nombre = $espec[0]['nombre'];
        $med_oficina = $espec[0]['oficina'];
        $med_fono = $espec[0]['fono'];
        $med_mail = $espec[0]['correo'];
        $med_red_social = $espec[0]['red_social'];
        $med_logo = $espec[0]['logo'];


        if ($med_logo) {
            $path_logo = base_url() . '/public/uploads/logo/' . $med_logo;
        } else {
            $path_logo = base_url() . '/public/uploads/logo/default.png';
        }

        $pesos_descuento = ($descuento / 100) * $subtotal;
        $total = $subtotal - $pesos_descuento;
        $format_subtotal = "$" . number_format($subtotal, 0, ',', '.');
        $format_descuento = "%" . number_format($descuento, 0, ',', '.');
        $format_total = "$" . number_format($total, 0, ',', '.');

        $pdf_init = '<html><head><title>Title</title><meta charset="UTF-8"></head><body';
        $pdf_end = '</body></html>';

        $pdf_1 = '<hr> <table> <tr style="max-width: 450px"> <td><img style="max-width: 150px" src="';
        $pdf_2 = '"></td> <td> <table> <tr> <td></td> <td>Paciente:</td> <td>';
        $pdf_3 = '</td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td>Fecha:</td> <td>';
        $pdf_4 = '</td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td>Fono:</td> <td>';
        $pdf_5 = '</td> </tr> <tr> <td></td> <td>Número de presupuesto:</td> <td>';
        $pdf_5_1 = '</td> </tr> <tr> <td></td> <td>Nombre de presupuesto:</td> <td>';
        $pdf_6 = '</td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> </tr> <tr> <td class="align-left" colspan="3">Presupuesto válido por 30 días</td> </tr> </table> </td> </tr> </table> <hr> <hr> <table class="table_items"> <tr> <th class="t_uno align-left">Descripción</th> <th class="t_dos">Diente</th> <th class="t_tres">Observaciones</th> <th>Total</th> </tr> ';

        //EXAMPLE ITEM ROW, LOOP THIS
        $pdf_7 = '<tr> <td class="align-left">1</td> <td>2</td> <td>3</td> <td>4</td> </tr>';
        $pdf_7_1 = '';
        foreach ($responseData['items'] as $item) {
            $valor = "$" . number_format($item['valor'], '0', ',', '.');
            $pdf_7_1 .= '<tr> <td class="align-left">' . $item['descripcion'] . '</td> <td>' . $item['diente'] . '</td> <td>' . $item['observacion'] . '</td> <td class="align-left">' . $valor . '</td> </tr>';
        }
        $pdf_8 = '</table> <hr> <table class="w-100"> <tr class="w-100"> <td class="subtotal_span"></td> <td> <table class="table_items table_subtotal"> <tr> <td class="align-left sub_title">Subtotal:</td> <td class="align-left">';
        $pdf_9 = '</td> </tr> <tr> <td class="align-left sub_title">Descuento:</td> <td class="align-left">';
        $pdf_10 = '</td> </tr> <tr> <td class="align-left sub_title">Total:</td> <td class="align-left">';
        $pdf_11 = '</td> </tr> </table> </td> </tr> </table> <hr> <table class="w-100 table_separator_uno"> <tr class="w-100"> <td class="subtotal_span"> <table class="w-100"> <tr> <td class="align-center">';
        $pdf_12 = '</td> </tr> <tr> <td class="align-center">';
        $pdf_13 = '</td> </tr> <tr> <td class="align-center">';
        $pdf_14 = '</td> </tr> <tr> <td class="align-center">';
        $pdf_15 = '</td> </tr> <tr> <td class="align-center">';
        $pdf_16 = '</td> </tr> </table> </td> <td> <table class="table_items table_subtotal"> <tr> <td><br><br><br><br><br> </td> </tr> <tr> <td class="align-center sub_title">Firma Paciente</td> </tr> </table> </td> </tr> </table>';
        $styles = '<style> @page { margin-left: 0.5cm; margin-right: 0.5cm; } body { font-size: 12px; margin: 0; padding: 0; font-family: sans-serif } hr { height: 10px; background-color: #44476a; margin-top: 10px; margin-bottom: 10px; } .table_items { width: 100%; border: 1px solid #44476a; border-collapse: collapse; } .table_items th { border: 1px solid #44476a; border-collapse: collapse; } .table_items td { border: 1px solid #44476a; border-collapse: collapse; text-align: center; } .w-100 { width: 100%; } .w-50 { width: 50%; } .subtotal_span { width: 56.5%; } .align-left { text-align: left !important; padding-left: 5px; } .align-center { text-align: center !important; } .t_uno { width: 50%; } .t_dos { width: 7%; } .t_tres { width: 30%; } .sub_title { width: 70.5%; } .m-0 { margin: 0; } .p-0 { padding: 0; } .table_separator_uno{ margin-bottom: 200px; } </style>';


        $contenido = $pdf_1 . $path_logo . $pdf_2 . $paciente . $pdf_3 . $fecha . $pdf_4 . $fono . $pdf_5 . $id_presupuesto . $pdf_5_1 . $nombrePresupuesto . $pdf_6 . $pdf_7_1 . $pdf_8 . $format_subtotal . $pdf_9 . $format_descuento . $pdf_10 . $format_total . $pdf_11 . $med_nombre . $pdf_12 . $med_oficina . $pdf_13 . $med_fono . $pdf_14 . $med_mail . $pdf_15 . $med_red_social . $pdf_16;

        // instantiate and use the dompdf class
        $dompdf = new Dompdf(array('enable_remote' => true));

        $dompdf->loadHtml($pdf_init . $styles . $contenido . $pdf_end);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        $output = $dompdf->output();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
