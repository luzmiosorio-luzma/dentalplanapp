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

        $queryStr = "INSERT INTO tarea VALUES(DEFAULT, ?, ?, FALSE, ?)";
        $binds = [$tarea, $fecha, $usuario];

        $query = $db->query($queryStr, $binds);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }

    function updateTareaDetalle($data){
        $db = db_connect();

        $tarea = $data['tarea'];
        $nombre = $data['tarea_detalle'];
        $usuario = $data['usuario'];

        $queryStr = "UPDATE tarea SET nombre=? WHERE idtarea = ? and idusuario = ?";
        $binds = [$nombre, $tarea, $usuario];

        $query = $db->query($queryStr, $binds);

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

        $queryStr = "UPDATE tarea SET nombre=?, completa=? WHERE idtarea = ?";
        $binds = [$nombre, $estado, $tarea];

        $query = $db->query($queryStr, $binds);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function updateTareaFecha($data){
        $db = db_connect();

        $tarea = $data['tarea'];
        $fecha = $data['fecha'];
        $usuario = $data['usuario'];

        $queryStr = "UPDATE tarea SET fecha= ? WHERE idtarea = ? and idusuario = ?";
        $binds = [$fecha, $tarea, $usuario];

        $query = $db->query($queryStr, $binds);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function updateTareaEstado($data)
    {
        $db = db_connect();

        $tarea = $data['tarea'];
        $estado = $data['estado'];
        $usuario = $data['usuario'];

        $queryStr = "UPDATE tarea SET completa=? WHERE idtarea = ? and idusuario = ?";
        $binds = [$estado, $tarea, $usuario];

        $query = $db->query($queryStr, $binds);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function deleteTarea($data)
    {
        $db = db_connect();

        $tarea = $data['tarea'];
        $usuario = $data['usuario'];

        $queryStr = "DELETE FROM tarea WHERE idtarea = ? AND idusuario = ?";
        $binds = [$tarea, $usuario];

        $query = $db->query($queryStr, $binds);

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
                BETWEEN ? AND ?
                AND t.idusuario = ?
                ORDER BY t.fecha";
        $binds = [$fecha_inicio, $fecha_termino, $usuario];

        $query = $db->query($queryStr, $binds);

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