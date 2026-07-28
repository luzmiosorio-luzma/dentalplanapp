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
                "SELECT idusuario as code, nombre as name, correo as email, rol, password
                    FROM usuario WHERE correo = ? AND activo = 1",
                [$email]
            );

            $resp = array();

            if ($query->getNumRows() > 0) {
                $row = $query->getRow();

                $info = password_get_info($row->password);
                if ($info['algo']) {
                    $valido = password_verify($password, $row->password);
                } else {
                    $valido = hash_equals($row->password, $password);
                    if ($valido) {
                        $nuevoHash = password_hash($password, PASSWORD_DEFAULT);
                        $db->query("UPDATE usuario SET password = ? WHERE idusuario = ?", [$nuevoHash, $row->code]);
                    }
                }

                if ($valido) {
                    $resp['status'] = true;
                    $resp['code'] = $row->code;
                    $resp['name'] = $row->name;
                    $resp['email'] = $row->email;
                    $resp['role'] = $row->rol;
                } else {
                    $resp['status'] = false;
                }
            } else {
                $resp['status'] = false;
            }
        }


        return $resp;

    }

}