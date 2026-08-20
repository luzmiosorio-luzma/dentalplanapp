<?php

namespace App\Models;

use CodeIgniter\Model;

class PresupuestoModel extends Model
{

    protected $table = 'presupuesto';


    function updatePrestaciones($prestaciones){
        $db = db_connect();
        $db->transStart();

        $session = session();
        $usuario = $session->get('user');

        $queryStr = "DELETE FROM prestacion WHERE idusuario = ?";
        $db->query($queryStr, [$usuario]);

        foreach ($prestaciones as $prestacion) {
            $descripcion = $prestacion['descripcion'];
            $valor = $prestacion['valor'];

            $queryStr = "INSERT INTO prestacion VALUES (DEFAULT, ?, ?, ?)";
            $db->query($queryStr, [$usuario, $descripcion, $valor]);
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return false;
        }

        return true;
    }

    function getPrestaciones()
    {
        $db = db_connect();
        $session = session();
        $usuario = $session->get('user');

        $queryStr = "SELECT p.idprestacion, p.descripcion, p.valor FROM prestacion p WHERE idusuario = ? order by p.idprestacion";

        $query = $db->query($queryStr, [$usuario]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idprestacion'] = $row->idprestacion;
            $arr['descripcion'] = $row->descripcion;

            if ($row->valor){
                $arr['valor'] = "$".number_format($row->valor, 0, ',', '.');
                $arr['valor_int'] = $row->valor;
            } else {
                $arr['valor'] = "";
                $arr['valor_int'] = "";
            }

            $ret[] = $arr;
        }

        return $ret;
    }
    
    function getPacientePresupuestos($id_paciente)
    {
        $db = db_connect();
        $session = session();
        $usuario = $session->get('user');

        $queryStr = "SELECT idpresupuesto, fecha, nombre FROM presupuesto WHERE idpaciente = ? AND idusuario = ? ORDER BY fecha DESC";

        $query = $db->query($queryStr, [$id_paciente, $usuario]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idpresupuesto'] = $row->idpresupuesto;
            $arr['fecha'] = $row->fecha;
            $arr['nombre'] = $row->nombre;
            $ret[] = $arr;
        }

        return $ret;
    }

    function getUserPresupuestos($usuario)
    {
        $db = db_connect();

        $queryStr = "SELECT idpresupuesto, nombre_pcte, fecha FROM presupuesto WHERE idusuario = ? ORDER BY fecha DESC";

        $query = $db->query($queryStr, [$usuario]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idpresupuesto'] = $row->idpresupuesto;
            $arr['nombre_pcte'] = $row->nombre_pcte;
            $arr['fecha'] = $row->fecha;
            $ret[] = $arr;
        }

        return $ret;
    }

    function updateItemFechaPago($data)
    {
        $id_item = $data['id_item_elemento'];
        $valor = $data['valor'];

        $db = db_connect();

        $queryStr = "UPDATE item_presupuesto SET fecha_pago = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$valor, $id_item]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }

    function updateItemPago($data)
    {
        $id_item = $data['id_item_elemento'];
        $valor = $data['valor'];

        $db = db_connect();

        $queryStr = "UPDATE item_presupuesto SET estado_pago = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$valor, $id_item]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }

    function updateItemValor($data)
    {
        $id_item = $data['id_item_elemento'];
        $valor = $data['valor'];

        $db = db_connect();

        $queryStr = "UPDATE item_presupuesto SET valor = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$valor, $id_item]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }


    function updateItemDescripcion($data)
    {
        $id_item = $data['id_item_elemento'];
        $valor = $data['valor'];

        $db = db_connect();

        $queryStr = "UPDATE item_presupuesto SET descripcion = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$valor, $id_item]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }


    function updateItemDiente($data)
    {
        $id_item = $data['id_item_elemento'];
        $valor = $data['valor'];

        $db = db_connect();

        $queryStr = "UPDATE item_presupuesto SET diente = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$valor, $id_item]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }


    function updateItemObservacion($data)
    {
        $id_item = $data['id_item_elemento'];
        $valor = $data['valor'];

        $db = db_connect();

        $queryStr = "UPDATE item_presupuesto SET observacion = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$valor, $id_item]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }

    function updateItemDesarrollo($data)
    {

        $id_item = $data['id_item_elemento'];
        $valor = $data['valor'];

        $db = db_connect();

        $queryStr = "UPDATE item_presupuesto SET desarrollo = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$valor, $id_item]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = true : $response = false;

        return $response;
    }

    function deleteItemPresupuesto($data)
    {
        $db = db_connect();
        $iditem_presupuesto = $data['iditem_presupuesto'];

        $queryStr = "DELETE FROM item_presupuesto WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$iditem_presupuesto]);
        $affected_rows = $this->db->affectedRows();
        if ($affected_rows != 1) {
            return 0;
        } else {
            return 1;
        }
    }

    function insertItemToPresupuesto($data)
    {
        $db = db_connect();
        $idPresupuesto = $data['idPresupuesto'];
        $item = $data['itemAdd'];
        $res = 0;

        $queryStrItem = "INSERT INTO item_presupuesto VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?)";
        $bindsItem = [$idPresupuesto, $item['descripcion'], $item['diente'], $item['observaciones'], $item['valor'], $item['desarrollo'], $item['estado_pago'], $item['fecha_pago']];

        $queryItem = $db->query($queryStrItem, $bindsItem);
        $affected_rows_item = $this->db->affectedRows();

        if ($affected_rows_item != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            $res = 0;
        } else {
            $res = 1;
        }

        return $res;


    }

    function insetPresupuesto($data)
    {
        $db = db_connect();
        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');
        $nombre = $data['nombrePresupuesto'];
        $usuario = $data['user_id'];
        $items = $data['items'];
        $subtotal = $data['subtotal'];
        $descuento = $data['descuento'];
        $total = $data['total'];
        $idPresupuesto = 0;
        $paciente = $data['paciente'];


        $queryStr = "INSERT INTO presupuesto VALUES (DEFAULT, now(), ?, ?, ?, ?, ?, ?)";
        $query = $db->query($queryStr, [$subtotal, $descuento, $total, $paciente, $usuario, $nombre]);
        $affected_rows = $this->db->affectedRows();
        if ($affected_rows != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            return "ERROR INSERTANDO PRESUPUESTO";
            die;
        }

        $idPresupuesto = $db->insertID();

        if ($idPresupuesto == 0 || !$idPresupuesto) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            return "ERROR RECUPERANDO ID PRESUPUESTO";
            die;
        }


        foreach ($items as $item) {

            $descripcion = str_replace("'", "", $item['descripcion']);
            $diente = str_replace("'", "", $item['diente']);
            $observaciones = str_replace("'", "", $item['observaciones']);
            $valor = str_replace("'", "", $item['valor']);


            $queryStrItem = "INSERT INTO item_presupuesto VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?)";
            $bindsItem = [$idPresupuesto, $descripcion, $diente, $observaciones, $valor, $item['desarrollo'], $item['estado_pago'], $item['fecha_pago']];

            $queryItem = $db->query($queryStrItem, $bindsItem);
            $affected_rows_item = $this->db->affectedRows();

            if ($affected_rows_item != 1) {
                $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
                return "ERROR INSERTANDO ITEM";
                die;
            }
        }

        $db->transComplete();

        return true;
    }

    function updatePresupuesto($data)
    {
        $db = db_connect();
        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');
        $nombre = $data['nombrePresupuesto'];
        $usuario = $data['user_id'];
        $items = $data['items'];
        $subtotal = $data['subtotal'];
        $descuento = $data['descuento'];
        $total = $data['total'];
        $idPresupuesto = $data['idPresupuesto'];
        $paciente = $data['paciente'];

        $queryStr = "UPDATE presupuesto SET nombre = ?, subtotal = ?, descuento = ?, total = ? WHERE idpresupuesto = ?";
        $query = $db->query($queryStr, [$nombre, $subtotal, $descuento, $total, $idPresupuesto]);
        $affected_rows = $this->db->affectedRows();
        if ($affected_rows != 1) {
            $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            return "ERROR ACTUALIZANDO PRESUPUESTO";
            die;
        }

        $db->transComplete();

        return true;

    }

    function getNombrePresupuestoById($id_presupuesto)
    {
        $db = db_connect();

        $queryStr = "SELECT nombre FROM presupuesto WHERE idpresupuesto = ?";
        $query = $db->query($queryStr, [$id_presupuesto]);

        foreach ($query->getResult() as $row) {
            $nombre = $row->nombre;
        }

        return $nombre;
    }

    function selectDataPresupuesto($id_presupuesto)
    {

        $db = db_connect();

        $descuento = 0;

        $queryStr = "SELECT fecha, descuento, idpaciente FROM presupuesto WHERE idpresupuesto = ?";
        $query = $db->query($queryStr, [$id_presupuesto]);


        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['fecha'] = $row->fecha;
            $arr['descuento'] = $row->descuento;
            $arr['idpaciente'] = $row->idpaciente;
            $ret[] = $arr;
        }

        return $ret;

    }

    function selectItemsPresupuesto($id_presupuesto)
    {

        $db = db_connect();

        $queryStr = "SELECT iditem_presupuesto, descripcion, diente, observacion, valor, desarrollo, estado_pago, fecha_pago FROM item_presupuesto WHERE idpresupuesto = ?";
        $query = $db->query($queryStr, [$id_presupuesto]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['iditem_presupuesto'] = $row->iditem_presupuesto;
            $arr['descripcion'] = $row->descripcion;
            $arr['diente'] = $row->diente;
            $arr['observacion'] = $row->observacion;
            $arr['valor'] = $row->valor;
            $arr['valor_format'] = "$" . number_format($row->valor, 0, ',', '.');
            $arr['desarrollo'] = $row->desarrollo;
            $arr['estado_pago'] = $row->estado_pago;
            $arr['fecha_pago'] = $row->fecha_pago;
            $ret[] = $arr;
        }

        return $ret;
    }

    function selectPresupuestoTratanteData($id_usuario)
    {
        $db = db_connect();

        $queryStr = "SELECT nombre, oficina, fono, correo, red_social, logo FROM usuario WHERE idusuario = ?";
        $query = $db->query($queryStr, [$id_usuario]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['nombre'] = $row->nombre;
            $arr['oficina'] = $row->oficina;
            $arr['fono'] = $row->fono;
            $arr['correo'] = $row->correo;
            $arr['red_social'] = $row->red_social;
            $arr['logo'] = $row->logo;
            $ret[] = $arr;
        }

        return $ret;
    }

    function selectSubtotalPresupuesto($id_presupuesto)
    {
        $db = db_connect();

        $queryStr = "SELECT SUM(valor) as subtotal FROM item_presupuesto WHERE idpresupuesto = ?";
        $query = $db->query($queryStr, [$id_presupuesto]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $subtotal = $row->subtotal;
        }

        return $subtotal;
    }

    function selectDataItemPresupuesto($id_item_presupuesto)
    {
        $db = db_connect();

        $queryStr = "SELECT descripcion, diente, observacion, valor, desarrollo, estado_pago, fecha_pago FROM item_presupuesto WHERE iditem_presupuesto = ?";
        $query = $db->query($queryStr, [$id_item_presupuesto]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['descripcion'] = $row->descripcion;
            $arr['diente'] = $row->diente;
            $arr['observacion'] = $row->observacion;
            $arr['valor'] = $row->valor;
            $arr['desarrollo'] = $row->desarrollo;
            $arr['estado_pago'] = $row->estado_pago;
            $arr['fecha_pago'] = $row->fecha_pago;
            $ret[] = $arr;
        }

        return $ret;
    }

    function updateDataItemPresupuesto($data)
    {
        $db = db_connect();

        $id_item_presupuesto = $data['idItemPresupuesto'];
        $desarrollo = $data['desarrollo'];
        $estado = $data['estado'];
        $fecha = $data['fecha'];

        $queryStr = "UPDATE item_presupuesto SET desarrollo = ?, estado_pago = ?, fecha_pago = ?
                    WHERE iditem_presupuesto = ?";

        $query = $db->query($queryStr, [$desarrollo, $estado, $fecha, $id_item_presupuesto]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    public function presupuestoBelongsToUsuario(int $idPresupuesto, int $idUsuario): bool
    {
        $db = \Config\Database::connect();
        $count = $db->table('presupuesto')
            ->where('idpresupuesto', $idPresupuesto)
            ->where('idusuario', $idUsuario)
            ->countAllResults();
        return $count > 0;
    }

}