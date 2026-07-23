<?php

namespace App\Models;

use CodeIgniter\Model;

class UnidadModel extends Model
{

    protected $table = 'unidad';

    function insertUnidad($unidadData)
    {
        $db = db_connect();

        $nombre = $unidadData['nombre'];

        $queryStr = "INSERT INTO unidad VALUES (DEFAULT, '$nombre', DEFAULT )";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }

    function updateUnidad($unidadData)
    {
        $db = db_connect();

        $id = $unidadData['id'];
        $nombre = $unidadData['nombre'];
        $bloqueada = $unidadData['bloqueada'];

        $queryStr = "UPDATE unidad SET nombre='$nombre', bloqueada=$bloqueada WHERE idunidad = $id";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function selectUnidades()
    {

        $db = db_connect();

        $queryStr = "SELECT idunidad as id, nombre, bloqueada FROM unidad";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->id;
            $arr['nombre'] = $row->nombre;
            $arr['activoid'] = $row->bloqueada;
            $arr['activo'] = $row->bloqueada == 1 ? 'Bloqueada' : 'Activa';
            $ret[] = $arr;
        }

        return $ret;
    }

    function selectUnidadesActivas()
    {

        $db = db_connect();

        $queryStr = "SELECT idunidad as id, nombre, bloqueada FROM unidad WHERE bloqueada = FALSE";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->id;
            $arr['nombre'] = $row->nombre;
            $arr['activoid'] = $row->bloqueada;
            $arr['activo'] = $row->bloqueada == 1 ? 'Bloqueada' : 'Activa';
            $ret[] = $arr;
        }

        return $ret;
    }



    function selectInputActiveUsers()
    {
        $db = db_connect();

        $queryStr = "SELECT codigo as id, nombre FROM usuario WHERE activo = TRUE AND rol = 2";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->id;
            $arr['nombre'] = $row->nombre;
            $ret[] = $arr;
        }

        return $ret;
    }


}