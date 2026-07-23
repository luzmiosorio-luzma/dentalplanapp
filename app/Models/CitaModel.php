<?php

namespace App\Models;

use CodeIgniter\Model;

date_default_timezone_set('America/Santiago');

class CitaModel extends Model
{

    protected $table = 'cita';

    function getPacienteCitasFromUsuario($data)
    {

        $str_si = '<span class="badge text-bg-light border border-secondary n-box  ">SI</span>';
        $str_no = '<span class="badge text-bg-secondary n-box">NO</span>';


        $usuario = $data['usuario'];
        $paciente = $data['paciente'];

        $db = db_connect();


        $queryStr = "SELECT c.idcita, c.fecha, cd.nombre as duracion, c.observacion, c.pago, c.boleta, c.monto, c.asistencia
        FROM cita c 
        INNER JOIN cita_duracion cd ON c.idduracion = cd.idcita_duracion
        WHERE c.idusuario = $usuario AND c.idpaciente = $paciente 
        ORDER BY c.fecha DESC";

        $query = $db->query($queryStr);

        $response = array();

        foreach ($query->getResult() as $row) {

            $arr['id'] = $row->idcita;
            $arr['fecha'] = $row->fecha;
            $arr['duracion'] = $row->duracion;
            $arr['observacion'] = $row->observacion;
            $arr['pago'] = $row->pago === '1' ? $str_si : $str_no;
            $arr['boleta'] = $row->boleta === '1' ? $str_si : $str_no;
            $arr['monto'] = number_format($row->monto, 0, ',', '.');
            $arr['asistencia'] = $row->asistencia === '1' ? $str_si : $str_no;

            $response[] = $arr;
        }

        return $response;
    }

    function insertCita($citaData)
    {
        $db = db_connect();

        $usuario = $citaData['usuario'];
        $paciente = $citaData['paciente'];
        $fecha_termino = $citaData['fecha'] . ' ' . $citaData['hora_termino'];
        $duracion = $citaData['duracion'];
        $fecha = $citaData['fecha'] . ' ' . $citaData['hora'] . ':00';
        $observacion = $citaData['observacion'] ? "'" . $citaData['observacion'] . "'" : 'NULL';
        $pago = $citaData['pago'];
        $boleta = $citaData['boleta'];
        $monto = $citaData['monto'] ? $citaData['monto'] : 0;
        $asistencia = $citaData['asistencia'];


        $queryStr = "INSERT INTO cita
                    VALUES (DEFAULT,$observacion,'$fecha','$fecha_termino', 0, $pago, $boleta, $monto, $paciente, $usuario, $duracion, $asistencia)";
        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }


    function sendWhatapp($dataMensaje)
    {

        $client = \Config\Services::curlrequest();

        $url = WHATSAPP_SEND_URL;
        $token = WHATSAPP_TOKEN;

        $data = [
            "messaging_product" => "whatsapp",
            "to" => eliminarPlusCaracter($dataMensaje['fono']),
            "type" => "template",
            "template" => [
                "name" => "cita_medica_test",
                "language" => ["code" => "es"],
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $dataMensaje['nombre_pcte']],
                            ["type" => "text", "text" => $dataMensaje['fecha']],
                            ["type" => "text", "text" => $dataMensaje['hora']],
                            ["type" => "text", "text" => $dataMensaje['profesional']],
                            ["type" => "text", "text" => $dataMensaje['contacto']],
                        ]
                    ]
                ]
            ]
        ];


        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ],
            'json' => $data
        ]);

        // Obtener el cuerpo de la respuesta
        $body = $response->getBody();

        // Mostrar la respuesta
        return $body;

    }

    function validationMensual($usuario_id){
        helper('utils_helper');
        $db = db_connect();

        $arr_dias = obtenerPrimerosDias();


        $queryStr = "SELECT COUNT(rw.id_registro) as cantidad
                    FROM registro_whatsapp rw
                    INNER JOIN cita c ON c.idcita = rw.idcita
                    WHERE c.idusuario = $usuario_id
                    AND rw.fecha > '$arr_dias[primerDiaMesActual]'
                    AND rw.fecha < '$arr_dias[primerDiaMesSiguiente]'";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['cantidad'] = $row->cantidad;
            $ret[] = $arr;
        }

        return $ret[0]['cantidad'];

    }

    function validationTimes($id_cita){
        $db = db_connect();

        $response = false;

        $queryStr = "SELECT MAX(fecha) as fecha FROM registro_whatsapp WHERE idcita = $id_cita";

        $query = $db->query($queryStr);


        if ($query->getNumRows() > 0) {

            $query_result = array();

            foreach ($query->getResult() as $row) {
                $arr['fecha'] = $row->fecha;
                $query_result[] = $arr;
            }

            if ($arr['fecha']) {
                $ultima_fecha_dt = new \DateTime($arr['fecha']);
                $ahora = new \DateTime();
                $interval = $ahora->diff($ultima_fecha_dt);

                // Verificar si han pasado al menos 24 horas
                if ($interval->days >= 1 || $interval->h >= 24) {
                    // "Han pasado al menos 24 horas desde la última llamada.";
                    $response = true;
                } else {
                    // "No han pasado 24 horas desde la última llamada.";
                    $response = false;
                }
            }else{
                $response = true;
            }
        }else{
            $response = true;
        }


        return $response;
    }

    function insertRegistroWhatsapp($id_cita)
    {
        $db = db_connect();

        $queryStr = "INSERT INTO registro_whatsapp
                    VALUES (DEFAULT, $id_cita, now())";
        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function selectUserCitas($usuario)
    {
        helper('date');
        $db = db_connect();

        $fecha_desde = str_replace("T", " ", $_POST['start']);
        $fecha_hasta = str_replace("T", " ", $_POST['end']);


        $queryStr = "SELECT c.idpaciente,  DATE_FORMAT(c.fecha, '%Y-%m-%d %H:%i') as fecha, DATE_FORMAT(c.fecha_termino, '%Y-%m-%d %H:%i') as fecha_termino,
                    c.idcita, p.nombre as nombre_pcte, COALESCE(c.observacion, '') as obs, c.asistencia
                    FROM cita c
                    INNER JOIN paciente p ON p.idpaciente = c.idpaciente
                    WHERE c.idusuario = $usuario AND c.borrada = FALSE
                    AND c.fecha BETWEEN '$fecha_desde' AND '$fecha_hasta'";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {



            $arr['title'] = $row->nombre_pcte;
            $arr['start'] = $row->fecha;
            $arr['end'] = $row->fecha_termino;
            $arr['id'] = $row->idcita;
            $arr['asistencia'] = $row->asistencia;
            $arr['classNames'] = ['bold'];

            if ($row->obs != '') {
                $arr['obs'] = " - " . $row->obs;
            }else{
                $arr['obs'] = "";
            }

//            echo $row->fecha;die;
            $now_date_format = date("Y-m-d H:i:s", strtotime("now -3 GMT"));
            $t = strtotime($now_date_format);


            if ($row->asistencia === '1') {
                $arr['backgroundColor'] = '#6cded3';
                $arr['borderColor'] = '#003c1c';
                $arr['textColor'] = '#003c1c';
            } else {
                if ($t > strtotime($row->fecha . ":00")) {
                    $arr['backgroundColor'] = '#ffc6c2';
                    $arr['borderColor'] = '#970000';
                    $arr['textColor'] = '#970000';
                } else {
                    $arr['backgroundColor'] = '#aecafa';
                    $arr['borderColor'] = '#44476a';
                    $arr['textColor'] = '#44476a';
                }
//                echo $arr['title']."<br/>";
//                echo $t." | ". strtotime($row->fecha.":00")."<br/>";
//                echo $now_date_format;
//                echo "<br/>";
//                echo $row->fecha.":00";
//                echo "<br/><br/><br/>";
//                echo "---------------------------------------<br/>";
//                echo date_format($t, "Y-m-d H:i:s");
            }


            $ret[] = $arr;
        }


        return $ret;

    }

    function GetDuracionById($id_periodo)
    {
        $db = db_connect();

        $queryStr = "SELECT cd.nombre FROM cita_duracion cd WHERE cd.idcita_duracion = $id_periodo";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['nombre'] = $row->nombre;
            $ret[] = $arr;
        }

        return $ret[0]['nombre'];
    }

    function selectDuraciones()
    {
        $db = db_connect();

        $queryStr = "SELECT cd.idcita_duracion as id_duracion, cd.nombre
                    FROM cita_duracion cd";

        $query = $db->query($queryStr);

        foreach ($query->getResult() as $row) {
            $arr['id_duracion'] = $row->id_duracion;
            $arr['nombre'] = $row->nombre;
            $ret[] = $arr;
        }

        return $ret;
    }

    function selectUserCitasFecha($usuario, $fecha)
    {

        $str_tarea_completa = '<span class="badge text-bg-light border border-secondary n-box">Completa</span>';
        $str_tarea_incompleta = '<span class="badge text-bg-secondary n-box">Pendiente</span>';

        $db = db_connect();

        $queryStr = "SELECT c.idcita as id, c.fecha as fecha_compuesta, p.nombre as paciente, p.fono,
                           c.observacion as tratamiento, c.boleta, c.pago, c.monto
                    FROM cita c
                    INNER JOIN paciente p on c.idpaciente = p.idpaciente
                    WHERE c.idusuario = $usuario";

        if ($fecha) {
            $queryStr .= " AND CAST(c.fecha AS date) = '$fecha'";

        } else {
            $queryStr .= " AND CAST(c.fecha AS date) = CAST( now() AS date)";
        }

        $queryStr .= " ORDER BY c.fecha";


        $query = $db->query($queryStr);

        $ret = array();
        $retTotal = array();
        $retTareas = array();


        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->id;
            $fecha_compuesta = explode(' ', $row->fecha_compuesta);
            $arr['hora'] = substr($fecha_compuesta[1], 0, 5);
            $arr['paciente'] = $row->paciente;
            $arr['fono'] = $row->fono;
            $arr['tratamiento'] = $row->tratamiento;
            $arr['boleta'] = $row->boleta == 1 ? 'SI' : 'NO';
            $arr['pago'] = $row->pago == 1 ? 'SI' : 'NO';
            $arr['monto'] = "$" . number_format($row->monto, 0, ',', '.');

            $ret[] = $arr;
        }

        $sqlQueryTotal = "SELECT SUM(c.monto) as monto_total
            FROM cita c
            WHERE c.idusuario = $usuario";

        if ($fecha) {
            $sqlQueryTotal .= " AND CAST(c.fecha AS date) = '$fecha'";

        } else {
            $sqlQueryTotal .= " AND CAST(c.fecha AS date) = CAST( now() AS date)";
        }

        $queryTotal = $db->query($sqlQueryTotal);

        foreach ($queryTotal->getResult() as $rowTotal) {
            $arrTotal['monto_total'] = number_format($rowTotal->monto_total, 0, ",", ".");
            $retTotal[] = $arrTotal;
        }

        $sqlQueryTareas = "SELECT t.idtarea, t.nombre, t.completa 
            FROM tarea t
            WHERE t.idusuario = $usuario";

        if ($fecha) {
            $sqlQueryTareas .= " AND t.fecha = '$fecha'";

        } else {
            $sqlQueryTareas .= " AND t.fecha = CAST( now() AS date)";
        }

        $sqlQueryTareas .= " ORDER BY t.idtarea";

        $queryTareas = $db->query($sqlQueryTareas);

        foreach ($queryTareas->getResult() as $rowTarea) {
            $arrTarea['id'] = $rowTarea->idtarea;
            $arrTarea['nombre'] = $rowTarea->nombre;
            $arrTarea['estado'] = $rowTarea->completa == 0 ? $str_tarea_incompleta : $str_tarea_completa;
            $arrTarea['estadoid'] = $rowTarea->completa;
            $retTareas[] = $arrTarea;
        }


        $result['data'] = $ret;
        $result['total'] = $retTotal;
        $result['tareas'] = $retTareas;

        return $result;

    }

    function updateUserCitaHora($data)
    {
        $db = db_connect();
        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');
        $fecha = $data['fecha'];
        $hora = $data['hora'];
        $id_cita = $data['id_cita'];
        $user = $data['user_id'];
        $id_duracion = "";
        $hora_termino = "";
        $fecha_inicio = $fecha . " " . $hora;
        $fecha_termino = "";
//        $minutes_to_add = 0;


        $queryStr_duracion = "SELECT c.idduracion as duracion 
                            FROM cita c 
                            WHERE c.idcita = $id_cita";

        $query_duracion = $db->query($queryStr_duracion);

        if ($query_duracion->getNumRows() > 0) {
            $row = $query_duracion->getRow();
            $id_duracion = $row->duracion;
        } else {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            echo "ERROR AL OBTENER DURACION DE CITA";
            die;
        }

        $minutes_to_add = $id_duracion * 30;

        $time = new \DateTime($fecha . ' ' . $hora);
        $time->modify("+{$minutes_to_add} minutes");

        $hora_termino = $time->format('H:i');
        $fecha_termino = $fecha . " " . $hora_termino;


        $queryStr = "UPDATE cita c SET c.fecha = '$fecha_inicio', c.fecha_termino= '$fecha_termino' 
                    WHERE c.idcita = $id_cita AND c.idusuario = $user";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        if ($affected_rows != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            echo "ERROR AL ACTUALIZAR CITA";
            die;
        } else {
            $db->transComplete() or die('NO SE PUDO COMPLETAR TRANSACCION');
        }

        return true;

    }

    function selectCitaDetalle($citaId)
    {
        $db = db_connect();

        $queryStr = "SELECT p.nombre as nombre_pcte, p.rut as rut_pcte, p.fono as telefono, p.edad as edad_pcte,
                    p.sexo as sexo_pcte, p.direccion as direccion_pcte, c.observacion, c.fecha, c.pago,
                    c.boleta, c.monto, p.idpaciente, c.idduracion as duracion, c.asistencia
                    FROM cita c
                    INNER JOIN paciente p ON p.idpaciente = c.idpaciente
                    WHERE c.idcita =  $citaId";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idCita'] = $citaId;
            $arr['nombre_pcte'] = $row->nombre_pcte;
            $arr['rut_pcte'] = $row->rut_pcte;
            $arr['fono'] = $row->telefono;
            $arr['edad_pcte'] = $row->edad_pcte;
            $arr['sexo_pcte'] = $row->sexo_pcte;
            $arr['direccion_pcte'] = $row->direccion_pcte;
            $arr['observacion'] = $row->observacion;
            $fecha_compuesta = explode(' ', $row->fecha);
            $arr['fecha'] = $fecha_compuesta[0];
            $arr['hora'] = substr($fecha_compuesta[1], 0, 5);
            $arr['pago'] = $row->pago == 1 ? 'true' : 'false';
            $arr['boleta'] = $row->boleta == 1 ? 'true' : 'false';
            $arr['monto'] = $row->monto;
            $arr['idpaciente'] = $row->idpaciente;
            $arr['duracion'] = $row->duracion;
            $arr['asistencia'] = $row->asistencia == 1 ? 'true' : 'false';
            $ret[] = $arr;
        }
        return $ret;
    }

    function updateCita($citaData)
    {
        $db = db_connect();

        $id = $citaData['idCita'];
        $observacion = $citaData['observacion'] ? "'" . $citaData['observacion'] . "'" : 'NULL';
        $fecha_termino = $citaData['fecha'] . ' ' . $citaData['hora_termino'];
        $fecha = $citaData['fecha'] . ' ' . $citaData['hora'] . ':00';
        $duracion = $citaData['duracion'];
        $pago = $citaData['pago'];
        $boleta = $citaData['boleta'];
        $monto = $citaData['monto'] ? $citaData['monto'] : 0;
        $asistencia = $citaData['asistencia'];

        $queryStr = "UPDATE cita 
                    SET observacion=$observacion,fecha='$fecha', fecha_termino='$fecha_termino', pago=$pago, 
                        boleta=$boleta, monto=$monto, idduracion=$duracion, asistencia = $asistencia
                    WHERE idcita = $id";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function deleteCita($idCita)
    {
        $db = db_connect();
        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');

        try {
            // ELIMINAR REGISTROS DE WHATSAPP
            $queryStr = "DELETE FROM registro_whatsapp WHERE idcita = ?";
            $db->query($queryStr, [$idCita]);

            // ELIMINAR CITA
            $queryStr = "DELETE FROM cita WHERE idcita = ?";
            $db->query($queryStr, [$idCita]);

            // Finalizar la transacción
            $db->transComplete();

            if ($db->transStatus() === FALSE) {
                // Si algo falló, hacer un rollback
                $db->transRollback();
                return 'false';
            } else {
                // Si todo fue exitoso, retornar true
                return 'true';
            }
        } catch (\Exception $e) {
            // En caso de excepción, hacer rollback
            $db->transRollback();
            return 'false';
        }

    }

    public function citaBelongsToUsuario(int $idCita, int $idUsuario): bool
    {
        $db = \Config\Database::connect();
        $count = $db->table('cita')
            ->where('idcita', $idCita)
            ->where('idusuario', $idUsuario)
            ->countAllResults();
        return $count > 0;
    }

}