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
        $filename = '';

        $file = \Config\Services::request()->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            helper('upload_validation');
            $error = validate_uploaded_image($file, ['jpg', 'jpeg', 'png', 'webp'], ['image/jpeg', 'image/png', 'image/webp'], 5 * 1024 * 1024);
            if ($error) {
                return $error;
            }

            $ext = strtolower($file->guessExtension());
            $filename = "nov" . $uuid . "." . $ext;
            $file->move(ROOTPATH . "public/uploads/novedades/", $filename, true);
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

        $file = \Config\Services::request()->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            helper('upload_validation');
            $error = validate_uploaded_image($file, ['jpg', 'jpeg', 'png', 'webp'], ['image/jpeg', 'image/png', 'image/webp'], 5 * 1024 * 1024);
            if ($error) {
                return $error;
            }

            $ext = strtolower($file->guessExtension());
            $filename = "nov" . $data['uuid'] . "." . $ext;
            $file->move(ROOTPATH . "public/uploads/novedades/", $filename, true);

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