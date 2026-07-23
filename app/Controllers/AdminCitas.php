<?php

namespace App\Controllers;

use App\Models\CitaModel;
use App\Models\TareaModel;
use App\Models\UserModel;

class AdminCitas extends BaseController
{
    public function __construct()
    {
        $this->CitaModel = new CitaModel();
        $this->TareaModel = new TareaModel();
        $this->UserModel = new UserModel();
    }


    public function addCita()
    {

        $userData = $_REQUEST;

        $data_dia = $userData['fecha'];
        $data_hora = $userData['hora'];
        $id_duracion = $userData['duracion'];
//        $data_duracion = $this->CitaModel->GetDuracionById($id_duracion);
//
//        $arr_hora_inicio = explode(":", $data_hora);
//        $hora_inicio = intval($arr_hora_inicio[0]);
//        $minuto_inicio = intval($arr_hora_inicio[1]);
//
//        $arr_hora_aumento = explode(":", $data_duracion);
//        $hora_aumento = intval($arr_hora_aumento[0]);
//        $minuto_aumento = intval($arr_hora_aumento[1]);
//
//        $hora_final = $hora_inicio + $hora_aumento;
//        $minuto_final = $minuto_inicio + $minuto_aumento;
//
//        $txt_hora_final = strval($hora_final);
//        $txt_minuto_final = strval($minuto_final);
//
//        if ($hora_final < 10) {
//            $txt_hora_final = "0" . $txt_hora_final;
//        }
//
//        if ($minuto_final < 10) {
//            $txt_minuto_final = "0" . $txt_minuto_final;
//        }
//
//        $userData['hora_termino'] = $txt_hora_final . ":" . $txt_minuto_final;


        $minutes_to_add = $id_duracion * 30;

        $time = new \DateTime($data_dia . ' ' . $data_hora);
        $time->modify("+{$minutes_to_add} minutes");

        $userData['hora_termino'] = $time->format('H:i');


        $responseData = $this->CitaModel->insertCita($userData);

        echo $responseData;
    }

    public function addTarea()
    {

        $tareaData = $_REQUEST;

        $responseData = $this->TareaModel->insertTarea($tareaData);

        echo $responseData;
    }

    public function getUserCitas()
    {

        $usuario = $_REQUEST['usuario'];


        $fecha_desde = explode("T", $_POST['start']);
        $fecha_hasta_init = explode("T", $_POST['end']);


        $date = new \DateTime($fecha_hasta_init[0]);
        $date->modify("-1 day");
        $fecha_hasta = $date->format("Y-m-d");


        $responseData['citas'] = $this->CitaModel->selectUserCitas($usuario);

        $responseData['tareas'] = $this->TareaModel->selectTareasUsuarioByMes($usuario, $fecha_desde[0], $fecha_hasta);

        echo json_encode($responseData);

    }

    public function enviarWhatsapp()
    {
        helper('utils_helper');


        $session = session();
        $usuario = $session->get('name');
        $usuario_id = $session->get('user');

        $evento = $_REQUEST['event_id'];

        // NECESITO, EL NOMBRE y NUMERO DE TELEFONO DEL PACIENTE
        // NECESITO LA FECHA Y HORA DE LA CITA
        // NECESITO EL NOMBRE DEL PROFESIONAL

        $dataCita = $this->CitaModel->selectCitaDetalle($evento);

        $dataMensaje['profesional'] = $usuario;
        $dataMensaje['nombre_pcte'] = $dataCita[0]['nombre_pcte'];
        $dataMensaje['fono'] = $dataCita[0]['fono'];
        $dataMensaje['fecha'] = convertirFecha($dataCita[0]['fecha']);
        $dataMensaje['hora'] = $dataCita[0]['hora'];

        $data_profesional = $this->UserModel->selectUserInfo($usuario_id);

        if (!$data_profesional[0]['fono']){
            $dataMensaje['contacto'] = ' ';
        }else{
            $fono_profesional = eliminarPlusCaracter($data_profesional[0]['fono']);
            $dataMensaje['contacto'] = 'Puedes comunicarte con tu especialista en el siguiente enlace: https://wa.me/'. $fono_profesional;
        }


        if (!$dataMensaje['fono']) {
            $resp['status'] = 'error_phone_not_found';
        } else {

            $validation_times = $this->CitaModel->validationTimes($evento);

            $validation_mensual = $this->CitaModel->validationMensual($usuario_id);

            if ($validation_times === false && $usuario_id != 1) {
                $resp['status'] = 'error_times';
            }elseif ($validation_mensual >= 50) {
                $resp['status'] = 'error_times_mensual';
            } else{

                $response = $this->CitaModel->sendWhatapp($dataMensaje);

                $res = json_decode($response, true);
                $status = $res['messages'][0]['message_status'];

                if ($status === 'accepted') {
                    $this->CitaModel->insertRegistroWhatsapp($evento);
                }
                $resp['status'] = 'accepted';
                $resp['code'] = $status;
            }
        }
        echo json_encode($resp);
    }

    public function updateFechaCita()
    {
        $session = session();
        $data = $_REQUEST;
        $data['user_id'] = $session->get('user');

        $responseData = $this->CitaModel->updateUserCitaHora($data);

        echo json_encode($responseData);
    }

    public function getCitaDetalle()
    {

        $idCita = $_REQUEST['idCita'];

        $responseData = $this->CitaModel->selectCitaDetalle($idCita);

        echo json_encode($responseData);
    }

    public function editCita()
    {

        $citaData = $_REQUEST;

        $data_dia = $citaData['fecha'];
        $data_hora = $citaData['hora'];
        $id_duracion = $citaData['duracion'];
//        $data_duracion = $this->CitaModel->GetDuracionById($id_duracion);

        $minutes_to_add = $id_duracion * 30;

        $time = new \DateTime($data_dia . ' ' . $data_hora);
        $time->modify("+{$minutes_to_add} minutes");

        $citaData['hora_termino'] = $time->format('H:i');

        $responseData = $this->CitaModel->updateCita($citaData);

        echo $responseData;
    }

    public function editTarea()
    {

        $data = $_REQUEST;

        $responseData = $this->TareaModel->updateTarea($data);

        echo $responseData;
    }

    public function removeCita()
    {

        $idCita = $_REQUEST['idCita'];

        $responseData = $this->CitaModel->deleteCita($idCita);

        echo $responseData;
    }

}
