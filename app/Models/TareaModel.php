<?php

namespace App\Models;

use CodeIgniter\Model;

class TareaModel extends Model
{

    protected $table = 'tarea';

    function insertTarea($data)
    {
        $db = db_connect();

        $usuario = $data['usuario'];
        $fecha = $data['fecha'];
        $tarea = $data['tarea'];

        $queryStr = "INSERT INTO tarea VALUES(DEFAULT, '$tarea', '$fecha', FALSE, $usuario)";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }

    function updateTareaDetalle($data){
        $db = db_connect();

        $tarea = $data['tarea'];
        $nombre = $data['tarea_detalle'];
        $usuario = $data['usuario'];

        $queryStr = "UPDATE tarea SET nombre='$nombre' WHERE idtarea = $tarea and idusuario = $usuario";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function updateTarea($data)
    {
        $db = db_connect();

        $tarea = $data['tarea'];
        $nombre = $data['nombre'];
        $estado = $data['estado'];

        $queryStr = "UPDATE tarea SET nombre='$nombre', completa=$estado WHERE idtarea = $tarea";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function updateTareaFecha($data){
        $db = db_connect();

        $tarea = $data['tarea'];
        $fecha = $data['fecha'];
        $usuario = $data['usuario'];

        $queryStr = "UPDATE tarea SET fecha= '$fecha' WHERE idtarea = $tarea and idusuario = $usuario";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function updateTareaEstado($data)
    {
        $db = db_connect();

        $tarea = $data['tarea'];
        $estado = $data['estado'];

        $queryStr = "UPDATE tarea SET completa=$estado WHERE idtarea = $tarea";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function deleteTarea($data)
    {
        $db = db_connect();

        $tarea = $data['tarea'];
        $usuario = $data['usuario'];

        $queryStr = "DELETE FROM tarea WHERE idtarea = $tarea AND idusuario = $usuario";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function selectTareasUsuarioByMes($usuario, $fecha_inicio, $fecha_termino)
    {
        $db = db_connect();

        $queryStr = "SELECT t.idtarea as codigo, t.fecha, t.nombre, t.completa 
                FROM tarea t 
                WHERE t.fecha 
                BETWEEN '$fecha_inicio' AND '$fecha_termino'
                AND t.idusuario = $usuario
                ORDER BY t.fecha";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id_task'] = $row->codigo;
            $arr['fecha'] = $row->fecha;
            $arr['detalle'] = $row->nombre;
            $arr['estado'] = $row->completa;
            $ret[] = $arr;
        }
        return $ret;

    }
}