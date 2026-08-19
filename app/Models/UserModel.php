<?php

namespace App\Models;

use CodeIgniter\Model;
use mysql_xdevapi\Exception;

class UserModel extends Model
{

    protected $table = 'usuario';


    function generarTokenReset($idusuario)
    {
        $db = db_connect();

        // Invalidar cualquier token anterior sin usar de este usuario
        $db->query("UPDATE password_reset_token SET usado = 1 WHERE idusuario = ? AND usado = 0", [$idusuario]);

        $token = bin2hex(random_bytes(32));
        $tokenHash = hash('sha256', $token);

        $db->query(
            "INSERT INTO password_reset_token (idusuario, token_hash, fecha_creacion, fecha_expiracion) VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR))",
            [$idusuario, $tokenHash]
        );

        return $token;
    }

    function actualizarPass($user, $password){
        $db = db_connect();

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $db->query("UPDATE usuario SET password = ? WHERE idusuario = ?", [$hash, $user]);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }



    function recoverPasswordByEmail($email){

        $db = db_connect();

        $queryStr = "SELECT idusuario as id FROM usuario WHERE correo = ? LIMIT 1";
        $query = $db->query($queryStr, [$email]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $ret[] = $row->id;
        }

        return $ret;

    }


    function insertUser($userData)
    {
        $db = db_connect();

        $nombre = $userData['nombre'];
        $email = $userData['email'];
        $password = password_hash($userData['password'], PASSWORD_DEFAULT);
        $role = $userData['rol'];


        $queryValidation = "SELECT count(*) as cantidad FROM usuario WHERE correo = ?";

        $queryRes = $db->query($queryValidation, [$email]);

        $ret = array();

        foreach ($queryRes->getResult() as $row) {
            $result = $row->cantidad;
        }

        if ($result != 0) {
            return 'Correo ya registrado';
        }

        $queryStr = "INSERT INTO usuario VALUES (DEFAULT, ?, ?, ?, ?, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT )";
        $binds = [$nombre, $email, $password, $role];

        $query = $db->query($queryStr, $binds);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;

    }

    function updateUser($userData)
    {
        $db = db_connect();

        $id = $userData['id'];
        $nombre = $userData['nombre'];
        $email = $userData['email'];
        $role = $userData['rol'];
        $estado = $userData['estado'];


        $queryValidation = "SELECT count(*) as cantidad FROM usuario WHERE correo = ? AND idusuario <> ?";

        $queryRes = $db->query($queryValidation, [$email, $id]);

        $ret = array();

        foreach ($queryRes->getResult() as $row) {
            $result = $row->cantidad;
        }

        if ($result != 0) {
            return 'Correo ya registrado';
        }


        $queryStr = "UPDATE usuario
                    SET nombre=?, correo=?, rol=?, activo=?
                    WHERE idusuario = ?";
        $binds = [$nombre, $email, $role, $estado, $id];

        $query = $db->query($queryStr, $binds);

        $affected_rows = $this->db->affectedRows();

        $affected_rows == 1 ? $response = 'true' : $response = 'false';

        return $response;
    }

    function getDataSexo()
    {
        $db = db_connect();

        $queryStr = "SELECT idsexo, nombre FROM sexo";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['idsexo'] = $row->idsexo;
            $arr['nombre'] = $row->nombre;
            $ret[] = $arr;
        }

        return $ret;
    }


    function selectUsers()
    {

        $db = db_connect();

        $queryStr = "SELECT idusuario as id, nombre, correo as email, rol as role, activo FROM usuario";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->id;
            $arr['nombre'] = $row->nombre;
            $arr['email'] = $row->email;


            $arr['role'] = $row->role == 1 ? 'Administrador' : 'Usuario';
            $arr['activo'] = $row->activo == 1 ? 'Activo' : 'Bloqueado';
            $arr['roleid'] = $row->role;
            $arr['activoid'] = $row->activo;

            $ret[] = $arr;
        }

        return $ret;
    }

    function selectUserInfo($id_usuario)
    {
        $db = db_connect();

        $queryStr = "SELECT nombre, correo, oficina, fono, red_social, logo, firma_url FROM usuario WHERE idusuario = ?";

        $query = $db->query($queryStr, [$id_usuario]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['nombre'] = $row->nombre;
            $arr['correo'] = $row->correo;
            $arr['oficina'] = $row->oficina;
            $arr['fono'] = $row->fono;
            $arr['red_social'] = $row->red_social;
            $arr['logo'] = $row->logo;

            if($row->firma_url){
                $arr['firma'] = base_url().DIR_FIRMA.$row->firma_url;
            }else{
                $arr['firma'] = null;
            }


            $ret[] = $arr;
        }

        return $ret;
    }

    function selectInputActiveUsers()
    {
        $db = db_connect();

        $queryStr = "SELECT idusuario as id, nombre FROM usuario WHERE activo = TRUE AND rol = 2";

        $query = $db->query($queryStr);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['id'] = $row->id;
            $arr['nombre'] = $row->nombre;
            $ret[] = $arr;
        }

        return $ret;
    }

    public function insertSaveFirma($data){

        $db = db_connect();
        $user = (int) $data['user'];
        $img = $data['img'];
        $firma = $data['data'];

        $encoded_image = explode(",", $img);
        if (count($encoded_image) < 2) {
            return 'error_tipo_no_permitido';
        }

        $decoded_image = base64_decode($encoded_image[1], true);
        if ($decoded_image === false) {
            return 'error_tipo_no_permitido';
        }

        helper('upload_validation');
        $error = validate_decoded_image($decoded_image, 500 * 1024);
        if ($error) {
            return $error;
        }

        $file = "firma_usuario_".$user.".png";
        file_put_contents(ROOTPATH . "public/uploads/firma/".$file, $decoded_image);

        $queryStr = "UPDATE usuario
                    SET firma=?, firma_url=?
                    WHERE idusuario = ?";

        $query = $db->query($queryStr, [$firma, $file, $user]);

        $error = $db->error();

        $error['code'] == 0 ? $response = 'true' : $response = $db->error();

        return $response;

    }

    function selectFirma($data){
        $db = db_connect();

        $id = $data['user'];

        $queryStr = "SELECT firma, firma_url FROM usuario WHERE idusuario = ?";

        $query = $db->query($queryStr, [$id]);

        $ret = array();

        foreach ($query->getResult() as $row) {
            $arr['firma'] = json_decode($row->firma);
            $arr['firma_url'] = $row->firma_url;
            $ret[] = $arr;
        }

        return $ret;
    }


    function updateUserData($userData)
    {
        $db = db_connect();
        $path = base_url() . '/uploads/logo/';
        $filename = '';

        $id = $userData['id_usuario'];
        $nombre = $userData['nombre'];
        $email = $userData['mail'];
        $fono = $userData['fono'];
        $oficina = $userData['oficina'];
        $redes = $userData['redes'];

        $file = \Config\Services::request()->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            helper('upload_validation');
            $error = validate_uploaded_file($file, ['jpg', 'jpeg', 'png', 'webp'], ['image/jpeg', 'image/png', 'image/webp'], 2 * 1024 * 1024);
            if ($error) {
                return $error;
            }

            $ext = strtolower($file->guessExtension());
            $filename = "user_logo_" . $id . "." . $ext;
            $file->move(ROOTPATH . "public/uploads/logo/", $filename, true);
        }

        $queryStr = "UPDATE usuario
                    SET nombre=?, correo=?, oficina = ?, fono = ?, red_social = ?";
        $binds = [$nombre, $email, $oficina, $fono, $redes];

        if ($filename) {
            $queryStr .= ", logo = ?";
            $binds[] = $filename;
        }

        $queryStr .= " WHERE idusuario = ?";
        $binds[] = $id;

        $query = $db->query($queryStr, $binds);

        $error = $db->error();

        $error['code'] == 0 ? $response = 'true' : $response = $db->error();

        return $response;
    }

}