<?php

namespace App\Controllers;

use App\Models\PacienteModel;
use App\Models\OdontoModel;
use App\Models\CitaModel;
use App\Models\UserModel;

class UserPaciente extends BaseController
{
    public function __construct()
    {
        require_once APPPATH . "ThirdParty/dompdf/autoload.inc.php";
        $this->PacienteModel = new PacienteModel();
        $this->OdontoModel = new OdontoModel();
        $this->CitaModel = new CitaModel();
        $this->UserModel = new UserModel();
    }

    public function fichaGetRecetas()
    {
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $response = $this->PacienteModel->selectRecetasUsuario($data);

        echo json_encode($response);
    }

    public function fichaSetReceta()
    {
        $data = $_REQUEST;

        $responseData = $this->PacienteModel->insertReceta($data);

        echo json_encode($responseData);
    }


    public function obtieneUserPacientes()
    {

        $id_usuario = $_REQUEST['usuario'];

        $responseData = $this->PacienteModel->selectPacientes($id_usuario);

        echo json_encode($responseData);

    }

    public function addPaciente()
    {

        $data = $_REQUEST;

        $rut_paciente = $data['rut'];
        $usuario = $data['usuario'];


        $valida_existe_rut = $this->PacienteModel->validaExisteRut($rut_paciente, $usuario);

        if ($valida_existe_rut[0]['existe'] > 0) {
            $responseData = array(
                'status' => 'error',
                'message' => 'Ya existe un paciente asociado al RUT ingresado'
            );
            echo json_encode($responseData);
            return;
        }

        $responseData = $this->PacienteModel->insertPaciente($data);

        echo json_encode($responseData);
    }

    public function addPacienteDinamic()
    {
        $data = $_REQUEST;

        $responseData = $this->PacienteModel->insertPacienteDinamic($data);

        echo json_encode($responseData);
    }

    public function editPaciente()
    {
        $data = $_REQUEST;

        $responseData = $this->PacienteModel->updatePaciente($data);

        echo json_encode($responseData);
    }

    public function fichaSetAnamnesisCorta()
    {
        $data = $_REQUEST;

        $response = $this->PacienteModel->insertAnamnesisCorta($data);

        echo $response;
    }


    public function fichaGetAnamnesisCorta()
    {
        $id_paciente = $_REQUEST['paciente'];

        $response = $this->PacienteModel->selectAnamnesisCorta($id_paciente);

        echo json_encode($response);
    }

    public function fichaGetEvolucion()
    {
        $paciente = $_REQUEST['paciente'];

        $response = $this->PacienteModel->getEvolucionPaciente($paciente);

        echo json_encode($response);
    }

    public function fichaSetEvolucion()
    {
        $session = \Config\Services::session();
        $data['usuario'] = $session->get('user');
        $data = $_REQUEST;

        $response = $this->PacienteModel->insertEvolucion($data);

        echo $response;

    }

    public function fichaSetAnamnesisDetalle()
    {
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $response = $this->PacienteModel->insertAnamnesisDetallada($data);

        echo $response;
    }

    public function fichaGetAnamnesisDetalle()
    {
        $session = \Config\Services::session();
        $data = $_REQUEST;
        $data['usuario'] = $session->get('user');

        $response = $this->PacienteModel->selectAnamnesisDetallada($data);

        echo json_encode($response);
    }

    public function ingresaNuevoOdonto()
    {
        $session = \Config\Services::session();
        $usuario = $session->get('user');
        $nombre = $_REQUEST['nombre'];
        $paciente = $_REQUEST['paciente'];

        $responseData = $this->OdontoModel->insertNuevoOdonto($nombre, $usuario, $paciente);

        echo json_encode($responseData);
    }

    public function obtieneOdontosPaciente()
    {
        $session = \Config\Services::session();
        $usuario = $session->get('user');
        $paciente = $_REQUEST['paciente'];

        $responseData = $this->OdontoModel->getUserPacienteOdontos($usuario, $paciente);

        echo json_encode($responseData);
    }

    public function ingresaOdontoItems()
    {
        $session = \Config\Services::session();
        $usuario = $session->get('user');

        $odonto = $_REQUEST['odonto'];
        $paciente = $_REQUEST['paciente'];
        $items = $_REQUEST['items'];
        $obs = $_REQUEST['observacion'];

        $responseData = $this->OdontoModel->insertOdontoItems($usuario, $odonto, $paciente, $items, $obs);

        echo json_encode($responseData);
    }

    public function obtieneOdontoItems()
    {
        $odonto = $_REQUEST['odonto'];

        $responseData = $this->OdontoModel->selectOdontoItems($odonto);

        echo json_encode($responseData);
    }

    public function fichaGetHorasClinicas()
    {
        $data = $_REQUEST;

        $session = \Config\Services::session();
        $usuario = $session->get('user');

        $data['usuario'] = $usuario;


        $responseData = $this->CitaModel->getPacienteCitasFromUsuario($data);

        echo json_encode($responseData);
    }

    public function getRecetaPreData()
    {

        $session = \Config\Services::session();
        $usuario = $session->get('user');

        $data = $this->UserModel->selectUserInfo($usuario);
        $data[0]['fecha'] = date("d-m-Y");

        echo json_encode($data);

    }

    public function getReceta()
    {
        $data = $_REQUEST;

        $responseData = $this->PacienteModel->selectReceta($data);

        echo $responseData;
    }

    public function contactoWp()
    {
        if (isset($_GET['wp'])) {
            $fono = $_REQUEST['wp'];
//            redirect("https://wa.me/" . $fono);
            header("Location: https://wa.me/" . $fono);
            exit();
        }else{
            return view('forbidden');
        }
    }


    public function sendReceta()
    {
        $session = \Config\Services::session();

        // Leer el cuerpo de la solicitud
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, true);

        // Acceder a los datos
        $id_paciente = $data['paciente'] ?? null;
        $receta = $data['receta'] ?? null;
        $id_usuario = $session->get('user');


        $data['data_paciente'] = $this->PacienteModel->getPacienteData($id_paciente);
        $data['data_usuario'] = $this->UserModel->selectUserInfo($id_usuario);
        $data['data_usuario'][0]['id_usuario'] = $id_usuario;

        $responseData = $this->PacienteModel->sendEmailReceta($data, $receta);

        echo $responseData;
    }

    public function printReceta()
    {


        $session = \Config\Services::session();

        // Leer el cuerpo de la solicitud
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, true);

        // Acceder a los datos
        $id_paciente = $data['paciente'] ?? null;
        $receta = $data['receta'] ?? null;
        $id_usuario = $session->get('user');


        $data['data_paciente'] = $this->PacienteModel->getPacienteData($id_paciente);
        $data['data_usuario'] = $this->UserModel->selectUserInfo($id_usuario);
        $data['data_usuario'][0]['id_usuario'] = $id_usuario;

        $responseData = $this->PacienteModel->printReceta($data, $receta);

        echo $responseData;
    }

    function fichaSetRadiografia()
    {
        $id_paciente = $this->request->getPost('paciente');
        $id_usuario = $this->request->getPost('usuario');
        $comentarios = $this->request->getPost('comentarios'); // Array
        $files = $this->request->getFiles();

        if (empty($files['radiografias'])) {
            echo "false";
            return;
        }

        $exito = true;
        foreach ($files['radiografias'] as $index => $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                
                // Estructura de carpetas: public/uploads/radiografias/{usuario}/{paciente}/
                $dir = 'uploads/radiografias/' . $id_usuario . '/' . $id_paciente . '/';
                $fullPath = FCPATH . $dir;

                if (!is_dir($fullPath)) {
                    mkdir($fullPath, 0777, true);
                }

                $originalName = $file->getName();
                $ext = $file->getExtension();
                $newName = time() . '_' . uniqid() . '.' . $ext;

                if ($file->move($fullPath, $newName)) {
                    $data = [
                        'atencion_idpaciente' => $id_paciente,
                        'atencion_idusuario' => $id_usuario,
                        'nombre' => $originalName,
                        'comentario' => isset($comentarios[$index]) ? $comentarios[$index] : '',
                        'tipo' => $file->getClientMimeType(),
                        'tamano' => round($file->getSize() / 1024, 2) . ' KB',
                        'ruta' => $dir . $newName,
                        'fecha' => date('Y-m-d H:i:s')
                    ];

                    if (!$this->PacienteModel->insertRadiografia($data)) {
                        $exito = false;
                    }
                } else {
                    $exito = false;
                }
            }
        }

        echo ($exito) ? "true" : "false";
    }

    function fichaGetRadiografias()
    {
        $id_paciente = $_REQUEST['paciente'];
        $radiografias = $this->PacienteModel->getRadiografias($id_paciente);
        echo json_encode($radiografias);
    }

    function fichaGetRadiografia()
    {
        $id_radiografia = $_REQUEST['id_radiografia'];
        $radio = $this->PacienteModel->getRadiografia($id_radiografia);
        
        if ($radio) {
            $radio['url'] = base_url($radio['ruta']);
            echo json_encode($radio);
        } else {
            echo json_encode(['error' => 'No se encontró la radiografía']);
        }
    }

    function fichaDelRadiografia()
    {
        $id_radiografia = $_REQUEST['id_radiografia'];
        $radio = $this->PacienteModel->getRadiografia($id_radiografia);

        if ($radio) {
            // Eliminar archivo físico
            $file_path = FCPATH . $radio['ruta'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Eliminar de BD
            if ($this->PacienteModel->deleteRadiografia($id_radiografia)) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "false";
        }
    }

    function getConsentPreData()
    {
        $session = \Config\Services::session();
        $id_usuario = $session->get('user');
        $id_paciente = $_REQUEST['paciente'];

        $paciente = $this->PacienteModel->getPacienteData($id_paciente);
        $usuario = $this->UserModel->selectUserInfo($id_usuario);

        $res = [
            'paciente_nombre' => $paciente ? $paciente['nombre'] : '',
            'usuario_nombre' => (isset($usuario[0])) ? $usuario[0]['nombre'] : '',
            'usuario_firma' => (isset($usuario[0])) ? $usuario[0]['firma'] : null,
            'fecha' => date('d/m/Y')
        ];

        echo json_encode($res);
    }

    function fichaSetConsentimiento()
    {
        $id_paciente = $_REQUEST['paciente'];
        $id_usuario = $_REQUEST['usuario'];
        $nro_presupuesto = $_REQUEST['nro_presupuesto'];
        $detalle = $_REQUEST['detalle'];
        $nombre_doctor = $_REQUEST['nombre_doctor'];
        $firma_base64 = $_REQUEST['firma'];

        // Guardar firma física
        $dir = 'uploads/consentimientos/' . $id_usuario . '/' . $id_paciente . '/';
        $fullPath = FCPATH . $dir;

        if (!is_dir($fullPath)) {
            mkdir($fullPath, 0777, true);
        }

        $fileName = 'firma_' . time() . '.png';
        $filePath = $fullPath . $fileName;

        // Limpiar base64
        $data_firma = explode(',', $firma_base64);
        if (count($data_firma) > 1) {
            $decoded_image = base64_decode($data_firma[1]);
            file_put_contents($filePath, $decoded_image);
        }

        $data = [
            'atencion_idpaciente' => $id_paciente,
            'atencion_idusuario' => $id_usuario,
            'presupuesto_nro' => $nro_presupuesto,
            'detalle' => $detalle,
            'nombre_doctor' => $nombre_doctor,
            'firma_paciente_url' => $dir . $fileName,
            'fecha' => date('Y-m-d H:i:s')
        ];

        if ($this->PacienteModel->insertConsentimiento($data)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function fichaGetConsentimiento()
    {
        $id_paciente = $_REQUEST['paciente'];
        $id_usuario = $_REQUEST['usuario'];

        $consentimientos = $this->PacienteModel->getConsentimiento($id_paciente, $id_usuario);
        
        if ($consentimientos) {
            foreach ($consentimientos as &$consen) {
                $consen['fecha_formateada'] = date('d/m/Y H:i', strtotime($consen['fecha']));
            }
            echo json_encode($consentimientos);
        } else {
            echo "false";
        }
    }

    function fichaDelConsentimiento()
    {
        $id_consentimiento = $_REQUEST['id'];

        $consen = $this->PacienteModel->getConsentimientoById($id_consentimiento);
        if ($consen) {
            $file_path = FCPATH . $consen['firma_paciente_url'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            if ($this->PacienteModel->deleteConsentimiento($id_consentimiento)) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "false";
        }
    }

    function fichaGetConsentimientoPdf()
    {
        $id_consentimiento = $_GET['id'];
        $consentimiento = $this->PacienteModel->getConsentimientoById($id_consentimiento);
        
        if (!$consentimiento) return redirect()->to('forbidden');

        $id_paciente = $consentimiento['atencion_idpaciente'];
        $id_usuario = $consentimiento['atencion_idusuario'];

        $paciente = $this->PacienteModel->getPacienteData($id_paciente);
        $usuario = $this->UserModel->selectUserInfo($id_usuario);

        // Logo de la clínica
        $path_logo = FCPATH . 'public/uploads/logo/DP.png';
        $base64_logo = null;
        if (file_exists($path_logo)) {
            $type_l = pathinfo($path_logo, PATHINFO_EXTENSION);
            $data_l = file_get_contents($path_logo);
            $base64_logo = 'data:image/' . $type_l . ';base64,' . base64_encode($data_l);
        }

        // Convertir firmas a Base64 para Dompdf
        $path_firma_p = FCPATH . $consentimiento['firma_paciente_url'];
        $base64_p = null;
        if (file_exists($path_firma_p)) {
            $type_p = pathinfo($path_firma_p, PATHINFO_EXTENSION);
            $data_p = file_get_contents($path_firma_p);
            $base64_p = 'data:image/' . $type_p . ';base64,' . base64_encode($data_p);
        }

        $base64_d = null;
        $data_u_raw = $this->UserModel->selectFirma(['user' => $id_usuario]);
        if ($data_u_raw && $data_u_raw[0]['firma_url']) {
            $path_firma_d = FCPATH . 'public/uploads/firma/' . $data_u_raw[0]['firma_url'];
            if (file_exists($path_firma_d)) {
                $type_d = pathinfo($path_firma_d, PATHINFO_EXTENSION);
                $data_d = file_get_contents($path_firma_d);
                $base64_d = 'data:image/' . $type_d . ';base64,' . base64_encode($data_d);
            }
        }

        $data_view = [
            'paciente_nombre' => $paciente['nombre'],
            'clinic_logo' => $base64_logo,
            'presupuesto_nro' => $consentimiento['presupuesto_nro'],
            'detalle' => $consentimiento['detalle'],
            'nombre_doctor' => $consentimiento['nombre_doctor'],
            'firma_paciente' => $base64_p,
            'firma_doctor' => $base64_d,
            'fecha' => date('d/m/Y', strtotime($consentimiento['fecha']))
        ];

        $html = view('user/ficha/consentimiento_pdf', $data_view);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Consentimiento_".str_replace(' ', '_', $paciente['nombre']).".pdf", array("Attachment" => 0));
        exit;
    }
}
