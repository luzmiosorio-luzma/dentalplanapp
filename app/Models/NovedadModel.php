<?php

namespace App\Models;

use CodeIgniter\Model;

date_default_timezone_set('America/Santiago');

class NovedadModel extends Model
{

    protected $table = 'novedad';

    function selectNovedades($estado = null)
    {
        $db = db_connect();

        $prefix_url = base_url() . '/public/uploads/novedades/';

        $queryStr = "SELECT n.idnovedad, n.titulo, n.url, n.activo, n.fecha
                FROM novedad n";

        if ($estado) {
            $queryStr .= " WHERE n.activo = $estado and (n.fecha >= CURDATE() OR n.fecha IS NULL)";
        }

        $queryStr .= " ORDER BY n.idnovedad";


        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idnovedad'] = $row->idnovedad;
            $arr['titulo'] = $row->titulo;
            $specific_url = $prefix_url . $row->url;
            $arr['url'] = "<a target='_blank' href='$specific_url'>Ver Imagen</a>";
            $arr['archivo'] = $specific_url;
            $arr['activo'] = $row->activo == '1' ? 'Activo' : 'Inactivo';
            $arr['data_estado'] = $row->activo;
            $arr['fecha'] = $row->fecha ? $row->fecha : '';
            $ret[] = $arr;
        }

        return $ret;

    }

    function insertNovedad($data)
    {
        $db = db_connect();

        $titulo = $data['titulo'];
        $uuid = $data['uuid'];


        // SUBIDA DE ARCHIVO
        if ($_FILES) {
            $file = $_FILES['file'];
            $dot_pos = strrpos($file['name'], '.') + 1;
            $ext = substr($file['name'], $dot_pos, strlen($file['name']) - $dot_pos);
            $filename = "nov" . $uuid . "." . $ext;

            try {
                move_uploaded_file($file["tmp_name"], ROOTPATH . "public/uploads/novedades/" . $filename);
            } catch (Exception $e) {
                var_dump($e);
                die;
            }
        }


        if ($data['fecha']) {
            $queryStr = "INSERT INTO novedad (titulo, url, activo, fecha) VALUES ('$titulo', '$filename', TRUE, '$data[fecha]')";
        } else {
            $queryStr = "INSERT INTO novedad (titulo, url, activo) VALUES ('$titulo', '$filename', TRUE)";
        }

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }

    function updateNovedad($data)
    {
        $db = db_connect();
        $idnovedad = $data['idnovedad'];
        $titulo = $data['titulo'];
        $estado = $data['estado'];
        $fecha = $data['fecha'];

        $queryStr = "UPDATE novedad SET titulo = '$titulo', activo = $estado ";

        if (isset($data['file'])) {
            $file = $_FILES['file'];
            $dot_pos = strrpos($file['name'], '.') + 1;
            $ext = substr($file['name'], $dot_pos, strlen($file['name']) - $dot_pos);
            $filename = "nov" . $data['uuid'] . "." . $ext;

            try {
                move_uploaded_file($file["tmp_name"], ROOTPATH . "public/uploads/novedades/" . $filename);
            } catch (Exception $e) {
                var_dump($e);
                die;
            }

            $queryStr .= ", url = '$filename'";
        }

        if (isset($data['fecha']) && $data['fecha'] != '') {
            $fecha = $data['fecha'];
            $queryStr.= ", fecha = '$fecha'";
        }

        $queryStr .= " WHERE idnovedad = $idnovedad";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

}