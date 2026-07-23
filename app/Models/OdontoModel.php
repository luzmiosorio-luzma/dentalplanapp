<?php

namespace App\Models;

use CodeIgniter\Model;
use PDOException;

class OdontoModel extends Model
{

    protected $table = 'odontograma';

    function getUserPacienteOdontos($id_usuario, $id_paciente)
    {
        $db = db_connect();
        $queryStr = "SELECT idodontograma,nombre, observacion FROM odontograma 
                    WHERE atencion_idpaciente = $id_paciente AND atencion_idusuario = $id_usuario";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idodontograma'] = $row->idodontograma;
            $arr['nombre'] = $row->nombre;
            $arr['observacion'] = $row->observacion;
            $ret[] = $arr;
        }

        return $ret;
    }


    function insertNuevoOdonto($nombre, $usuario, $paciente)
    {
        $db = db_connect();

        $queryStr = "INSERT INTO odontograma VALUES (DEFAULT, $paciente, $usuario, '$nombre', null)";

        $query = $db->query($queryStr);
        $affected_rows_item = $db->affectedRows();
        if ($affected_rows_item != 1) {
            $res['status'] = 'error';
            $res['value'] = '';
        } else {
            $res['status'] = 'success';
            $res['value'] = $db->insertID();;
        }

        return $res;

    }

    function insertOdontoItems($usuario, $odonto, $paciente, $items, $obs)
    {

        $db = db_connect();
        $db->transStart() or die('NO SE PUDO INICIAR TRANSACCION');
        $response = true;

        if ($obs != "" && $obs != null){
            $queryStr_Obs = "UPDATE odontograma SET observacion = '$obs' WHERE idodontograma = $odonto";

            $query_Obs = $db->query($queryStr_Obs);

            $affected_rows_obs = $this->db->affectedRows();

            if ($affected_rows_obs != 1) {
                $response = false;
                $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            }
        }

        $queryStr_del = "DELETE FROM item_odontograma WHERE idodontograma = $odonto";

        $query = $db->query($queryStr_del);

        foreach ($items as $item) {
            $pieza = $item['pieza'];
            $cara = $item['cara'];
            $cara_id = $item['cara_id'] == 0 ? $item['cara_id'] = 1 : $item['cara_id'];
            $raiz = $item['raiz'];
            $raiz_id = $item['raiz_id'] == 0 ? $item['raiz_id'] = 1 : $item['raiz_id'];
            $area1 = $item['area1'];
            $area2 = $item['area2'];
            $area3 = $item['area3'];
            $area4 = $item['area4'];
            $area5 = $item['area5'];

            $queryStr = "INSERT INTO item_odontograma VALUES (DEFAULT, $odonto, $cara_id, $raiz_id, $pieza, $area1, $area2, $area3, $area4, $area5)";

            $query = $db->query($queryStr);

            $affected_rows = $this->db->affectedRows();


            if ($affected_rows != 1) {
                $response = false;
                $db->transRollback() or die('NO SE PUDO DETENER TRANSACCION');
            }

        }

        if ($response == true) {
            $res['sucess'] = $response;
            $db->transComplete();
        }

        return $res;

    }


    function getCaraItems()
    {
        $db = db_connect();

        $queryStr = "SELECT * FROM item_odonto_cara";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['item_id'] = $row->iditem_odonto_cara;
            $arr['item_nombre'] = $row->nombre_item_odonto_cara;
            $ret[] = $arr;
        }

        return $ret;
    }

    function getRaizItems()
    {
        $db = db_connect();

        $queryStr = "SELECT * FROM item_odonto_raiz";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['item_id'] = $row->iditem_odonto_raiz;
            $arr['item_nombre'] = $row->nombre_item_odonto_raiz;
            $ret[] = $arr;
        }

        return $ret;
    }

    function selectOdontoItems($odonto)
    {
        $db = db_connect();

        $queryStr = "SELECT i.iditem_odontograma as id_pieza, i.pieza as pieza, ic.nombre_item_odonto_cara as cara, i.iditem_odonto_cara as cara_id,
                           ir.nombre_item_odonto_raiz as raiz, i.iditem_odonto_raiz as raiz_id,
                           i.area1 as area1, i.area2 as area2, i.area3 as area3, i.area4 as area4, i.area5 as area5
                    FROM item_odontograma i
                             INNER JOIN item_odonto_cara ic ON ic.iditem_odonto_cara = i.iditem_odonto_cara
                             INNER JOIN item_odonto_raiz ir ON ir.iditem_odonto_raiz = i.iditem_odonto_raiz
                    WHERE i.idodontograma = $odonto";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id_pieza'] = $row->id_pieza;
            $arr['pieza'] = $row->pieza;
            $arr['cara'] = $row->cara;
            $arr['cara_id'] = $row->cara_id;
            $arr['raiz'] = $row->raiz;
            $arr['raiz_id'] = $row->raiz_id;
            $arr['area1'] = $row->area1 == 1 ? $row->area1 = true : $row->area1 = false;
            $arr['area2'] = $row->area2 == 1 ? $row->area2 = true : $row->area2 = false;
            $arr['area3'] = $row->area3 == 1 ? $row->area3 = true : $row->area3 = false;
            $arr['area4'] = $row->area4 == 1 ? $row->area4 = true : $row->area4 = false;
            $arr['area5'] = $row->area5 == 1 ? $row->area5 = true : $row->area5 = false;
            $ret[] = $arr;
        }

        $res['items'] = $ret;


        $queryStrObs = "SELECT o.observacion as obs
                    FROM odontograma o
                    WHERE o.idodontograma = $odonto";

        $queryObs = $db->query($queryStrObs);

        $ret = array();

        foreach ($queryObs->getResult() as $rowObs) {
            $res['obs'] = $rowObs->obs == null ? '' : $rowObs->obs;
        }

        $res['success'] = true;

        return $res;
    }

}
