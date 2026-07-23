<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{

    protected $table = 'usuario';

    function login($email, $password)
    {

        if (BYPASS_LOGIN == 'true') {
            $resp['status'] = true;
        } else {
            $db = db_connect();
            $query = $db->query(
                "SELECT idusuario as code, nombre as name, correo as email, rol
                    FROM usuario WHERE correo = ? AND password = ? AND activo = 1",
                [$email, $password]
            );

            $resp = array();

            if ($query->getNumRows() > 0) {
                $row = $query->getRow();

                $resp['status'] = true;
                $resp['code'] = $row->code;
                $resp['name'] = $row->name;
                $resp['email'] = $row->email;
                $resp['role'] = $row->rol;
            } else {
                $resp['status'] = false;
            }
        }


        return $resp;

    }

}