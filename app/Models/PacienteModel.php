<?php

namespace App\Models;

use Dompdf\Dompdf;
use CodeIgniter\Model;

class PacienteModel extends Model
{

    protected $table = 'paciente';

    function validaExisteRut($rut_paciente, $usuario)
    {
        $db = db_connect();

        $queryStr = "SELECT COUNT(*) AS existe
                        FROM atencion a
                        JOIN paciente p ON a.idpaciente = p.idpaciente
                        WHERE p.rut = '$rut_paciente'
                        AND a.idusuario = $usuario";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['existe'] = $row->existe;
            $ret[] = $arr;
        }

        return $ret;


    }

    function insertPaciente($data)
    {
        $db = db_connect();
        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');

        $usuario = $data['usuario'];
        $nombre = $data['nombre'];
        $rut = $data['rut'] ? "'" . $data['rut'] . "'" : 'NULL';
        $edad = $data['edad'] ? $data['edad'] : 'NULL';
        $sexo = $data['sexo'] ? $data['sexo'] : 'NULL';
        $nacionalidad = $data['nacionalidad'] ? $data['nacionalidad'] : 0;
        $fono = $data['fono'] ? "'" . $data['fono'] . "'" : 'NULL';
        $mail = $data['mail'] ? "'" . $data['mail'] . "'" : 'NULL';
        $direccion = $data['direccion'] ? "'" . $data['direccion'] . "'" : 'NULL';
        $prevision = $data['prevision'] ? "'" . $data['prevision'] . "'" : 'NULL';

        $queryStr = "INSERT INTO paciente VALUES (DEFAULT, '$nombre', $rut, $edad, $sexo, $fono, $mail, $direccion, $prevision, $nacionalidad)";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();
        if ($affected_rows != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            return "ERROR INSERTANDO PRESUPUESTO";
            die;
        }

        $idPaciente = $db->insertID();

        $queryStrFk = "INSERT INTO atencion VALUES ($idPaciente, $usuario)";
        $query = $db->query($queryStrFk);

        $affected_rows_fk = $this->db->affectedRows();
        if ($affected_rows_fk != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            return "ERROR INSERTANDO PRESUPUESTO";
            die;
        }

        $db->transComplete();

        return true;

    }

    function insertPacienteDinamic($data)
    {
        $db = db_connect();
        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');

        $usuario = $data['usuario'];
        $nombre = $data['nombre'];
        $rut = $data['rut'] ? "'" . $data['rut'] . "'" : 'NULL';
        $edad = $data['edad'] ? $data['edad'] : 'NULL';
        $sexo = $data['sexo'] ? $data['sexo'] : 'NULL';
        $nacionalidad = $data['nacionalidad'] ? $data['nacionalidad'] : 'DEFALUT';
        $fono = $data['fono'] ? "'" . $data['fono'] . "'" : 'NULL';
        $mail = $data['mail'] ? "'" . $data['mail'] . "'" : 'NULL';
        $direccion = $data['direccion'] ? "'" . $data['direccion'] . "'" : 'NULL';
        $prevision = $data['prevision'] ? "'" . $data['prevision'] . "'" : 'NULL';

        $queryStr = "INSERT INTO paciente VALUES (DEFAULT, '$nombre', $rut, $edad, $sexo, $fono, $mail, $direccion, $prevision, $nacionalidad)";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();
        if ($affected_rows != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            return "ERROR INSERTANDO PRESUPUESTO";
            die;
        }

        $idPaciente = $db->insertID();

        $queryStrFk = "INSERT INTO atencion VALUES ($idPaciente, $usuario)";
        $query = $db->query($queryStrFk);

        $affected_rows_fk = $this->db->affectedRows();
        if ($affected_rows_fk != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            return "ERROR INSERTANDO PRESUPUESTO";
            die;
        }

        $db->transComplete();

        $ret['result'] = 'true';
        $ret['id_paciente'] = $idPaciente;
        return $ret;

    }

    function selectPacientes($id_usuario)
    {

        $db = db_connect();

        $queryStr = "select p.idpaciente, p.nombre, p.rut, p.edad,
                    (SELECT COALESCE(nombre, '') FROM sexo s WHERE s.idsexo = p.sexo) as sexo,
                    p.fono, p.mail, p.direccion, p.prevision, p.sexo as idsexo, p.nacionalidad
                    FROM atencion a
                    INNER JOIN paciente p on a.idpaciente = p.idpaciente
                    where idusuario = $id_usuario;";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idpaciente'] = $row->idpaciente;
            $arr['nombre'] = $row->nombre;
            $arr['rut'] = $row->rut;
            $arr['edad'] = $row->edad;
            $arr['sexo'] = $row->sexo;
            $arr['nacionalidad'] = $row->nacionalidad;
            $arr['fono'] = $row->fono;
            $arr['mail'] = $row->mail;
            $arr['direccion'] = $row->direccion;
            $arr['prevision'] = $row->prevision;
            $arr['idsexo'] = $row->idsexo;
            $ret[] = $arr;
        }

        return $ret;

    }

    function selectPacientesBuscar($id_usuario, $paciente)
    {

        $db = db_connect();

        $queryStr = "select p.idpaciente, CONCAT(p.nombre, ' - ', p.rut) as paciente
                    FROM atencion a
                             INNER JOIN paciente p on a.idpaciente = p.idpaciente
                    where idusuario = $id_usuario AND p.nombre LIKE '%$paciente%'";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idpaciente'] = $row->idpaciente;
            $arr['paciente'] = $row->paciente;
            $ret[] = $arr;
        }

        return $ret;

    }


    function updatePaciente($data)
    {
        $db = db_connect();

        $idpaciente = $data['idpaciente'];
        $nombre = str_replace("'", "", $data['nombre']);
        $rut = $data['rut'] ? "'" . str_replace("'", "", $data['rut']) . "'" : 'NULL';
        $edad = $data['edad'] ? $data['edad'] : 'NULL';
        $sexo = $data['sexo'] ? $data['sexo'] : 'NULL';
        $nacionalidad = $data['nacionalidad'] ? $data['nacionalidad'] : 'DEFALUT';
        $fono = $data['fono'] ? "'" . str_replace("'", "", $data['fono']) . "'" : 'NULL';
        $mail = $data['mail'] ? "'" . str_replace("'", "", $data['mail']) . "'" : 'NULL';
        $direccion = $data['direccion'] ? "'" . str_replace("'", "", $data['direccion']) . "'" : 'NULL';
        $prevision = $data['prevision'] ? "'" . str_replace("'", "", $data['prevision']) . "'" : 'NULL';

        $queryStr = "UPDATE paciente SET nombre = '$nombre', rut=$rut, edad=$edad, sexo=$sexo, fono=$fono, mail=$mail, direccion=$direccion, prevision=$prevision, nacionalidad = $nacionalidad WHERE idpaciente = $idpaciente";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }

    function getPacienteData($id_paciente)
    {
        $db = db_connect();

        $queryStr = "select nombre, rut, edad, fono, mail, direccion, prevision
                    from paciente
                    where idpaciente = $id_paciente;";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['nombre'] = $row->nombre;
            $arr['rut'] = $row->rut;
            $arr['edad'] = $row->edad;
            $arr['fono'] = $row->fono;
            $arr['mail'] = $row->mail;
            $arr['direccion'] = $row->direccion;
            $arr['prevision'] = $row->prevision;
            $ret[] = $arr;
        }

        return $ret[0];

    }

    function getEvolucionPaciente($paciente)
    {
        $db = db_connect();
        $session = session();
        $usuario = $session->get('user');

        $queryStr = "SELECT u.nombre, DATE_FORMAT(e.fecha, '%Y-%m-%d %H:%i') as fecha, e.detalle FROM evolucion_clinica e
                    INNER JOIN usuario u ON u.idusuario = e.idusuario
                    WHERE e.idpaciente = $paciente And e.idusuario = $usuario
                    ORDER BY e.fecha DESC";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['nombre'] = $row->nombre;
            $arr['fecha'] = $row->fecha;
            $arr['detalle'] = $row->detalle;
            $ret[] = $arr;
        }

        return $ret;

    }

    function insertEvolucion($data)
    {
        $db = db_connect();

        $detalle = str_replace("'", "", $data['detalle']);
        $paciente = $data['paciente'];
        $usuario = $data['usuario'];

        $queryStr = "INSERT INTO evolucion_clinica VALUES (DEFAULT, '$detalle', now(), $paciente, $usuario)";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }

    function selectAnamnesisCorta($id_paciente)
    {
        $db = db_connect();

        $queryStr = "SELECT * FROM anamnesis_corta WHERE idpaciente = $id_paciente";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['historia_clinica'] = $row->historia_clinica;
            $arr['farmacos'] = $row->farmacos;
            $arr['habitos'] = $row->habitos;
            $arr['motivo'] = $row->motivo;
            $arr['diagnostico'] = $row->diagnostico;
            $arr['observaciones'] = $row->observaciones;
            $arr['alertas'] = $row->alertas;
            $ret[] = $arr;
        }

        return $ret;


    }

    function insertAnamnesisCorta($data)
    {
        $db = db_connect();
        $session = session();

        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');
        $usuario = $session->get('user');

        $paciente = str_replace("'", "", $data['paciente']);
        $historia = str_replace("'", "", $data['historia']);
        $farmacos = str_replace("'", "", $data['farmacos']);
        $habitos = str_replace("'", "", $data['habitos']);
        $motivo = str_replace("'", "", $data['motivo']);
        $diagnostico = str_replace("'", "", $data['diagnostico']);
        $observaciones = str_replace("'", "", $data['observaciones']);
        $alertas = str_replace("'", "", $data['alertas']);
        $response = true;

        $queryStr_cantidad = "SELECT COUNT(*) as cantidad FROM anamnesis_corta WHERE idpaciente = $paciente";

        $query_res = $db->query($queryStr_cantidad);

        foreach ($query_res->getResult() as $row) {
            $cantidad = $row->cantidad;
        }

        if ($cantidad > 0) {
            // YA TIENE UNA ANANMESIS PREVIA, SE ACTUALIZA
            $queryStr_update = "UPDATE anamnesis_corta SET historia_clinica = '$historia', farmacos = '$farmacos', 
                           habitos = '$habitos', motivo = '$motivo', diagnostico = '$diagnostico', 
                           observaciones = '$observaciones', alertas = '$alertas'
                           WHERE idpaciente = $paciente and idusuario = $usuario";

            $query = $db->query($queryStr_update);

            $affected_rows = $this->db->affectedRows();

            if ($affected_rows == 1) {
                $response = true;
                $db->transComplete();
            } else {
                $response = false;
                $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            }

            return $response;
        } else {
            // NO TIENE ANAMNESIS PREVIA, SE INGRESA
            $queryStr_insert = "INSERT INTO anamnesis_corta VALUES(DEFAULT, '$historia', '$farmacos', 
                                   '$habitos', '$motivo', '$diagnostico', '$observaciones', '$alertas', $paciente, $usuario)";

            $query = $db->query($queryStr_insert);

            $affected_rows = $this->db->affectedRows();

            if ($affected_rows == 1) {
                $response = true;
                $db->transComplete();
            } else {
                $response = false;
                $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            }
        }

        return $response;

    }


    function insertAnamnesisDetallada($data)
    {

        $db = db_connect();

        $desc = str_replace("'", "", $data['desc']);
        $usuario = $data['usuario'];
        $paciente = $data['paciente'];
        $fecha = $data['fecha'];
        $tipo = $data['tipo'];

        $queryStr = "INSERT INTO anamnesis_detalle 
                    VALUES(DEFAULT, $tipo, $paciente, $usuario , '$desc', '$fecha')";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        if ($affected_rows == 1) {
            $response = true;
        } else {
            $response = false;
        }

        return $response;

    }

    function selectAnamnesisDetallada($data)
    {
        $db = db_connect();

        $usuario = $data['usuario'];
        $paciente = $data['paciente'];
        $tipo = $data['tipo'];

        $queryStr = "SELECT
                        (SELECT nombre FROM usuario WHERE idusuario = $usuario) as usuario,
                        detalle, DATE_FORMAT(fecha, '%Y-%m-%d') as fecha
                    FROM anamnesis_detalle
                    WHERE idanamnesis_detalle_tipo = $tipo
                      AND atencion_idpaciente = $paciente
                      AND atencion_idusuario = $usuario
                    ORDER BY fecha DESC";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['usuario'] = $row->usuario;
            $arr['detalle'] = $row->detalle;
            $arr['fecha'] = $row->fecha;
            $ret[] = $arr;
        }

        return $ret;

    }

    function insertReceta($data)
    {

        helper('utils_helper');
        $db = db_connect();

        $usuario = $data['usuario'];
        $paciente = $data['paciente'];
        $receta = json_encode($data['receta']);
        $formatReceta = escapeSpecialCharacters($receta);


        $queryStr = "INSERT INTO receta 
                    VALUES(DEFAULT, $paciente, $usuario , now(), '$formatReceta')";


        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        if ($affected_rows == 1) {
            $response = true;
        } else {
            $response = false;
        }

        return $response;

    }

    function selectRecetasUsuario($data)
    {

        helper('utils_helper');
        $db = db_connect();

        $usuario = $data['usuario'];
        $paciente = $data['paciente'];

        $queryStr = "SELECT idreceta, DATE_FORMAT(fecha, '%d-%m-%Y') as fecha, detalle FROM receta WHERE atencion_idpaciente = $paciente AND atencion_idusuario = $usuario";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idreceta'] = $row->idreceta;
            $arr['fecha'] = $row->fecha;
            $arr['detalle'] = removeSpecialCharacters(concatenateInserts(json_decode($row->detalle)));

            $ret[] = $arr;
        }

        return $ret;
    }

    function selectReceta($data)
    {
        helper('utils_helper');
        $db = db_connect();

        $id_receta = $data['id_receta'];


        $queryStr = "SELECT detalle FROM receta WHERE idreceta = $id_receta";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $receta = $row->detalle;
        }

        return $receta;

    }


    function sendEmailReceta($data, $receta)
    {


        ini_set("memory_limit", "512M");

        $id_paciente = $data['paciente'];
        $data_paciente = $data['data_paciente'];
        $mail_paciente = $data_paciente['mail'];

        $data_usuario = $data['data_usuario'];

        $fechaHoy = date('d-m-Y');
        $nombre = $data_usuario[0]['nombre'];

        $fono = $data_usuario[0]['fono'];
        $oficina = $data_usuario[0]['oficina'];
        $correo = $data_usuario[0]['correo'];
        $id_usuario = $data_usuario[0]['id_usuario'];
        $logo = $data_usuario[0]['logo'];


        $email = \Config\Services::email();
        $email->setFrom('presupuesto@dentalplan.cl', 'DentalPlan');
        $email->setBCC(['alonsoleon89@gmail.com', 'luzmiosorio@gmail.com']);


        $email->setSubject('DentalPlan - Receta médica');
        $titulo = '<h3 style="color: #000">Estimado usuario, ha recibido una receta médica adjunta.</h3><br>';
        $email->setMessage($titulo);

        $email->setTo($mail_paciente);

        $txt_footer = '';
        $txt_fono = '';

        if ($fono) {

            $txt_fono = '<td><strong>Fono: </strong>' . $fono . '</td>';

            if ($oficina) {
                $txt_footer = '<p>' . $oficina . ' | ' . $fono . '</p>';
            } else {
                $txt_footer = '<p>' . $fono . '</p>';
            }
        } else {
            if ($oficina) {
                $txt_footer = '<p>' . $oficina . '</p>';
            }
        }

        if ($logo) {

            $logo_url = base_url() . '/public/uploads/logo/' . $logo;

            $obj_logo = "<img style='height: 100px' src='$logo_url' ></img>";
        } else {
            $obj_logo = "";
        }

        $file = "firma_usuario_" . $id_usuario . ".png";
        $firma_url = base_url() . '/public/uploads/firma/' . $file;

        $bg_img = "DP.png";
        $bg_url = base_url() . '/public/uploads/logo/' . $bg_img;


        // instantiate and use the dompdf class
        $dompdf = new Dompdf(array('enable_remote' => true));

        $path_logo = base_url() . '/public/uploads/logo/default.png';

        $titulo = '<h1 style="width: 100%; text-align: center; margin-top: 100px">Receta Médica</h1>';

        $contenedor_receta = '<div style="padding-left: 100px; margin-top: 50px"' . $receta . '</div>';

        $html = '
<!DOCTYPE html>
<html>
<head>
    <style>
    
        html{
            color: #44476a;
        }
        
        @page {
            margin: 100px 50px; /* Márgenes para cabecera y pie */
        }

        header {
            position: fixed;
            top: -80px; /* Posición de la cabecera fuera del margen del contenido */
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            line-height: 30px;
            font-size: 14px;
        }
        
        body { font-size: 12px; margin: 0; padding: 0; font-family: sans-serif; line-height: 15px; }
        
        .table_items { width: 100%; border: 1px solid #44476a; border-collapse: collapse; } .table_items th { border: 1px solid #44476a; border-collapse: collapse; } .table_items td { border: 1px solid #44476a; border-collapse: collapse; text-align: center; } .w-100 { width: 100%; } .w-50 { width: 50%; }
        
        .footer_container > p{
            margin: 0;
            line-height: 20px
        }
        
        tr { line-height: 15px; height: 15px; text-align: end !important}
        

        footer {
            position: fixed;
            bottom: 50px; /* Posición del pie fuera del margen del contenido */
            left: 0;
            right: 0;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 12px;
        }

        .content {
            font-size: 12px;
            text-align: justify;
        }
        
        .watermark{
            position: absolute;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            opacity: 0.1; /* Efecto de transparencia para marca de agua */
            width: 50%; /* Ajusta el tamaño según lo necesites */
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <table>
            <tbody>
            <tr style="max-width: 950px;">
                <td style="width: 580px;">
                    <table>
                        <tbody>
                        <tr>
                            ' . $obj_logo . '
                        </tr>
                        <tr>
                            <td><strong>Dr. </strong>' . $nombre . '</td>
                        </tr>
                        ' . $txt_fono . '
                        <tr>
                            <td><strong>Fecha: </strong>' . $fechaHoy . '</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <img style="width: 150px" src="' . $path_logo . '">
                </td>
            </tr>
            </tbody>
        </table>
    </header>

    <footer style="width: 100%; height: fit-content; text-align: center;">
        <div class="footer_container" style="width: 400px; margin: 0 auto;">
            <img alt="user_sign" style="height: 100px; display: block; margin: 0 auto; border-bottom: 1px solid #44476a;" src="' . $firma_url . '"/>
            <p>Dr. ' . $nombre . '</p>
            <p>' . $correo . '</p>
            ' . $txt_footer . '
        </div>
    </footer>
    

    <div class="content">
    <img class="watermark" alt="watermark" src="' . $bg_url . '"></img>
    ' . $titulo . $contenedor_receta . '
    </div>
</body>
</html>
';


        $dompdf->loadHtml($html);

        $dompdf->setPaper('letter', 'portrait');

        $dompdf->render();

        $output = $dompdf->output();

//        $dompdf->stream();

        $email->attach($output, 'attachment', 'report.pdf', 'application/pdf');

        if ($email->send()) {
            return true;
        } else {
            $resp_data = $email->printDebugger(['headers']);
            print_r($resp_data);
        }

    }


    function printReceta($data, $receta)
    {
        ini_set("memory_limit", "512M");

        $id_paciente = $data['paciente'];
        $data_paciente = $data['data_paciente'];
        $mail_paciente = $data_paciente['mail'];

        $data_usuario = $data['data_usuario'];

        $fechaHoy = date('d-m-Y');
        $nombre = $data_usuario[0]['nombre'];

        $fono = $data_usuario[0]['fono'];
        $oficina = $data_usuario[0]['oficina'];
        $correo = $data_usuario[0]['correo'];
        $id_usuario = $data_usuario[0]['id_usuario'];
        $logo = $data_usuario[0]['logo'];


        $txt_footer = '';
        $txt_fono = '';

        if ($fono) {

            $txt_fono = '<td><strong>Fono: </strong>' . $fono . '</td>';

            if ($oficina) {
                $txt_footer = '<p>' . $oficina . ' | ' . $fono . '</p>';
            } else {
                $txt_footer = '<p>' . $fono . '</p>';
            }
        } else {
            if ($oficina) {
                $txt_footer = '<p>' . $oficina . '</p>';
            }
        }

        if ($logo) {

            $logo_url = base_url() . '/public/uploads/logo/' . $logo;

            $obj_logo = "<img style='height: 100px' src='$logo_url' ></img>";
        } else {
            $obj_logo = "";
        }

        $file = "firma_usuario_" . $id_usuario . ".png";
        $firma_url = base_url() . '/public/uploads/firma/' . $file;

        $bg_img = "DP.png";
        $bg_url = base_url() . '/public/uploads/logo/' . $bg_img;


        // instantiate and use the dompdf class
        $dompdf = new Dompdf(array('enable_remote' => true));

        $path_logo = base_url() . '/public/uploads/logo/default.png';

        $titulo = '<h1 style="width: 100%; text-align: center; margin-top: 100px">Receta Médica</h1>';

        $contenedor_receta = '<div style="padding-left: 100px; margin-top: 50px"' . $receta . '</div>';

        $html = '
<!DOCTYPE html>
<html>
<head>
    <style>
    
        html{
            color: #44476a;
        }
        
        @page {
            margin: 100px 50px; /* Márgenes para cabecera y pie */
        }

        header {
            position: fixed;
            top: -80px; /* Posición de la cabecera fuera del margen del contenido */
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            line-height: 30px;
            font-size: 14px;
        }
        
        body { font-size: 12px; margin: 0; padding: 0; font-family: sans-serif; line-height: 15px; }
        
        .table_items { width: 100%; border: 1px solid #44476a; border-collapse: collapse; } .table_items th { border: 1px solid #44476a; border-collapse: collapse; } .table_items td { border: 1px solid #44476a; border-collapse: collapse; text-align: center; } .w-100 { width: 100%; } .w-50 { width: 50%; }
        
        .footer_container > p{
            margin: 0;
            line-height: 20px
        }
        
        tr { line-height: 15px; height: 15px; text-align: end !important}
        

        footer {
            position: fixed;
            bottom: 50px; /* Posición del pie fuera del margen del contenido */
            left: 0;
            right: 0;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 12px;
        }

        .content {
            font-size: 12px;
            text-align: justify;
        }
        
        .watermark{
            position: absolute;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            opacity: 0.1; /* Efecto de transparencia para marca de agua */
            width: 50%; /* Ajusta el tamaño según lo necesites */
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <table>
            <tbody>
            <tr style="max-width: 950px;">
                <td style="width: 580px;">
                    <table>
                        <tbody>
                        <tr>
                            ' . $obj_logo . '
                        </tr>
                        <tr>
                            <td><strong>Dr. </strong>' . $nombre . '</td>
                        </tr>
                        ' . $txt_fono . '
                        <tr>
                            <td><strong>Fecha: </strong>' . $fechaHoy . '</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <img style="width: 150px" src="' . $path_logo . '">
                </td>
            </tr>
            </tbody>
        </table>
    </header>

    <footer style="width: 100%; height: fit-content; text-align: center;">
        <div class="footer_container" style="width: 400px; margin: 0 auto;">
            <img alt="user_sign" style="height: 100px; display: block; margin: 0 auto; border-bottom: 1px solid #44476a;" src="' . $firma_url . '"/>
            <p>Dr. ' . $nombre . '</p>
            <p>' . $correo . '</p>
            ' . $txt_footer . '
        </div>
    </footer>
    

    <div class="content">
    <img class="watermark" alt="watermark" src="' . $bg_url . '"></img>
    ' . $titulo . $contenedor_receta . '
    </div>
</body>
</html>
';


        $dompdf->loadHtml($html);

        $dompdf->setPaper('letter', 'portrait');

        $dompdf->render();

        $output = $dompdf->output();

        $dompdf->stream();

    }

    public function insertRadiografia($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('radiografia');
        $builder->insert($data);
        return $db->insertID();
    }

    public function getRadiografias($id_paciente)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('radiografia');
        $builder->where('atencion_idpaciente', $id_paciente);
        $builder->orderBy('fecha', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function getRadiografia($id_radiografia)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('radiografia');
        $builder->where('id_radiografia', $id_radiografia);
        return $builder->get()->getRowArray();
    }

    public function deleteRadiografia($id_radiografia)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('radiografia');
        $builder->where('id_radiografia', $id_radiografia);
        return $builder->delete();
    }

    public function insertConsentimiento($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consentimiento');
        $builder->insert($data);
        return $db->insertID();
    }

    public function getConsentimiento($id_paciente, $id_usuario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consentimiento');
        $builder->where('atencion_idpaciente', $id_paciente);
        $builder->where('atencion_idusuario', $id_usuario);
        $builder->orderBy('fecha', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function getConsentimientoById($id_consentimiento)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consentimiento');
        $builder->where('id_consentimiento', $id_consentimiento);
        return $builder->get()->getRowArray();
    }

    public function deleteConsentimiento($id_consentimiento)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('consentimiento');
        $builder->where('id_consentimiento', $id_consentimiento);
        return $builder->delete();
    }
}
