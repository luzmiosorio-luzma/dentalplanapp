<?php

namespace App\Models;

use CodeIgniter\Model;

class EgresoModel extends Model
{

    protected $table = 'egreso';

    function insertIngreso($data){
        $db = db_connect();

        $usuario = $data['usuario'];
        $fecha = $data['fecha'];
        $detalle = $data['detalle'];
        $pago = $data['pago'];
        $boleta = $data['boleta'];
        $monto = $data['monto'];

        $queryStr = "INSERT INTO ingreso_extra VALUES(DEFAULT, $usuario, '$fecha', '$detalle', $pago, $boleta, $monto)";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }

    function getImpuestoActual(){
        $db = db_connect();

        $query = "SELECT impuesto as monto FROM `impuesto` WHERE anio = YEAR(CURDATE())";

        $query = $db->query($query);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $impuesto = $row->monto;
        }

        return $impuesto;
    }

    function getUserResumenOtrosIngresos($usuario, $fecha_inicio, $fecha_termino){
        $db = db_connect();
        $ingresos = array();

        $queryStr_con_boleta = "SELECT COALESCE(sum(monto) , 0) as monto
                                FROM ingreso_extra 
                                WHERE idusuario = $usuario
                                AND pago = TRUE
                                AND fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'
                                AND boleta = TRUE";

        $query_con_boleta = $db->query($queryStr_con_boleta);

        foreach ($query_con_boleta->getResult() as $row) {
            $ingresos['con_boleta'] = $row->monto;
        }

        $queryStr_sin_boleta = "SELECT COALESCE(sum(monto) , 0) as monto
                                FROM ingreso_extra 
                                WHERE idusuario = $usuario
                                AND pago = TRUE
                                AND fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'
                                AND boleta = FALSE";

        $query_sin_boleta = $db->query($queryStr_sin_boleta);

        foreach ($query_sin_boleta->getResult() as $row) {
            $ingresos['sin_boleta'] = $row->monto;
        }

        return $ingresos;
    }

    function getUserResumenIngresos($usuario, $fecha_inicio, $fecha_termino){
        $db = db_connect();
        $ingresos = array();

        $queryStr_con_boleta = "SELECT COALESCE(sum(monto) , 0) as monto
                    FROM cita WHERE idusuario = $usuario AND pago = TRUE
                    AND fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'
                    and boleta = true";


        $query_con_boleta = $db->query($queryStr_con_boleta);

        foreach ($query_con_boleta->getResult() as $row) {
            $ingresos['con_boleta'] = $row->monto;
        }

        $queryStr_sin_boleta = "SELECT COALESCE(sum(monto) , 0) as monto
                    FROM cita WHERE idusuario = $usuario AND pago = TRUE
                    AND fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'
                    and boleta = false";

        $query_sin_boleta = $db->query($queryStr_sin_boleta);

        foreach ($query_sin_boleta->getResult() as $row) {
            $ingresos['sin_boleta'] = $row->monto;
        }

        return $ingresos;

    }

    function getTipoEgresos(){
        $db = db_connect();

        $queryStr = "SELECT idtipo_egreso, nombre_tipo_egreso
                    FROM tipo_egreso";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idtipo_egreso'] = $row->idtipo_egreso;
            $arr['nombre_tipo_egreso'] = $row->nombre_tipo_egreso;
            $ret[] = $arr;
        }

        return $ret;
    }

    function getUserIngresos($usuario, $fecha_inicio, $fecha_termino){
        $db = db_connect();

        $queryStr = "SELECT c.idcita, DATE_FORMAT(c.fecha,'%Y-%m-%d %H:%i') as fecha, p.nombre as paciente, 
                    c.observacion as detalle, c.monto as valor, c.pago as pago, c.boleta as boleta
                    FROM cita c
                    INNER JOIN paciente p ON p.idpaciente = c.idpaciente
                    WHERE c.idusuario = $usuario
                    AND c.fecha  BETWEEN '$fecha_inicio' AND '$fecha_termino' ";
        $queryStr .= "UNION
                    SELECT '0' as idcita, DATE_FORMAT(ige.fecha,'%Y-%m-%d %H:%i'), 'Otros ingresos' as paciente, ige.detalle, ige.monto as valor, ige.pago, ige.boleta
                    FROM ingreso_extra as ige
                    WHERE ige.idusuario = $usuario
                    AND ige.fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'
                    ORDER BY 2";


        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idcita'] = $row->idcita;
            $arr['fecha'] = $row->fecha;
            $arr['paciente'] = $row->paciente;
            $arr['detalle'] = $row->detalle;
            $arr['pago'] = $row->pago == 1 ? 'SI' : 'NO';
            $arr['boleta'] = $row->boleta == 1 ? 'SI' : 'NO';
            $arr['valor'] = "$".number_format($row->valor, 0, ',', '.');
            $arr['valor_num'] = $row->valor;
            $ret[] = $arr;
        }

        return $ret;

    }

    function getUserResumenEgresos($usuario, $fecha_inicio, $fecha_termino){
        $db = db_connect();

        $queryStr = "SELECT COALESCE(sum(valor) , 0) as monto
                    FROM egreso WHERE idusuario = $usuario
                    AND fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $monto = $row->monto;
        }

        return $monto;
    }

    function getUserResumenEgresosDetalle($usuario, $fecha_inicio, $fecha_termino){
        $db = db_connect();

        $queryStr = "SELECT te.nombre_tipo_egreso as tipo_ingreso, sum(e.valor) as valor
                    FROM egreso e
                    JOIN tipo_egreso te on e.idtipo_egreso = te.idtipo_egreso
                    WHERE e.idusuario = $usuario
                    AND e.fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'
                    GROUP BY te.nombre_tipo_egreso
                    ORDER BY 1";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['tipo_ingreso'] = $row->tipo_ingreso;
            $arr['valor'] =  number_format($row->valor,0,',', '.');
            $ret[] = $arr;
        }

        return $ret;
    }

    function getUserEgresos($usuario, $fecha_inicio, $fecha_termino){
        $db = db_connect();

        $queryStr = "SELECT idegreso, fecha, detalle, valor, idtipo_egreso as cod_tipo_egreso
                    FROM egreso WHERE idusuario = $usuario
                    AND fecha BETWEEN '$fecha_inicio' AND '$fecha_termino'";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->idegreso;
            $arr['fecha'] = $row->fecha;
            $arr['detalle'] = $row->detalle;
            $arr['valor'] = "$".number_format($row->valor, 0, ',', '.');
            $arr['valor_num'] = $row->valor;
            $arr['cod_tipo_egreso'] = $row->cod_tipo_egreso;
            $ret[] = $arr;
        }

        return $ret;

    }

    function insertEgreso($data)
    {
        $db = db_connect();

        $usuario = $data['usuario'];
        $tipo_egreso = $data['tipo_egreso'];
        $fecha = $data['fecha'];
        $detalle = $data['detalle'];
        $valor = $data['valor'];

        $queryStr = "INSERT INTO egreso VALUES(DEFAULT, '$fecha', '$detalle', $valor, $usuario, $tipo_egreso)";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }

    function updateEgreso($data){
        $db = db_connect();

        $id = $data['id'];
        $tipo_egreso = $data['tipo_egreso'];
        $fecha = $data['fecha'];
        $detalle = $data['detalle'];
        $valor = $data['valor'];

        $queryStr = "UPDATE egreso SET fecha='$fecha', detalle='$detalle', valor=$valor, idtipo_egreso=$tipo_egreso
                    WHERE idegreso = $id";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

}