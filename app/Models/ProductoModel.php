<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{

    protected $table = 'producto';

    function insertProducto($data)
    {
        $db = db_connect();

        $nombre = $data['nombre'];
        $cantidad = $data['cantidad'];
        $descripcion = $data['descripcion'];
        $fecha = $data['fecha'];
        $unidad = $data['unidad'];

        $queryStr = "INSERT INTO producto VALUES (DEFAULT, '$nombre',";

        if($descripcion == 'NULL'){
            $queryStr .= 'NULL, ';
        }else{
            $queryStr .= "'$descripcion', ";
        }

        if($fecha == 'NULL'){
            $queryStr .= $fecha . ', ';
        }else{
            $queryStr .= "'$fecha', ";
        }

        $queryStr .= "$cantidad, $unidad";

        $queryStr .= ");";

        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }

    function updateProducto($data)
    {
        $db = db_connect();

        $id = $data['id'];
        $nombre = $data['nombre'];
        $cantidad = $data['cantidad'];
        $unidad = $data['unidad'];

        $descripcion = $data['descripcion'];
        $fecha = $data['fecha'];

        $queryStr = "UPDATE producto SET nombre='$nombre', cantidad=$cantidad, idunidad=$unidad, ";

        if($descripcion == 'NULL'){
            $queryStr .= 'descripcion=NULL, ';
        }else{
            $queryStr .= "descripcion='$descripcion', ";
        }

        if($fecha == 'NULL'){
            $queryStr .= 'fecha_vencimiento=NULL';
        }else{
            $queryStr .= "fecha_vencimiento='$fecha'";
        }

        $queryStr .= " WHERE idproducto = $id;";


        $query = $db->query($queryStr);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function selectProductos()
    {

        $db = db_connect();

        $queryStr = "SELECT p.idproducto,  p.nombre, p.cantidad, p.descripcion, p.fecha_vencimiento, 
                     p.idunidad, u.nombre as nombreunidad
                    FROM producto as p
                    INNER JOIN unidad u ON u.idunidad = p.idunidad";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->idproducto;
            $arr['nombre'] = $row->nombre;
            $arr['descripcion'] = $row->descripcion;
            $arr['fecha_vencimiento'] = $row->fecha_vencimiento;
            $arr['cantidad'] = $row->cantidad;
            $arr['idunidad'] = $row->idunidad;
            $arr['nombreunidad'] = $row->nombreunidad;
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