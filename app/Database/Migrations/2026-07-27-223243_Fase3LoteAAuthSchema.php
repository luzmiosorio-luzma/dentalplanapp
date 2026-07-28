<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fase3LoteAAuthSchema extends Migration
{
    public function up()
    {
        // A1: ampliar usuario.password para soportar hashes bcrypt/argon2 (60-255 chars)
        $this->forge->modifyColumn('usuario', [
            'password' => [
                'name'       => 'password',
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);

        // A2: tabla de tokens de recuperacion de contrasena (un solo uso, con expiracion)
        $this->forge->addField([
            'id_token' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'idusuario' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'token_hash' => [
                'type'       => 'CHAR',
                'constraint' => 64,
            ],
            'fecha_creacion' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'fecha_expiracion' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'usado' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
        ]);
        $this->forge->addKey('id_token', true);
        $this->forge->addKey('token_hash');
        $this->forge->addForeignKey('idusuario', 'usuario', 'idusuario');
        $this->forge->createTable('password_reset_token');
    }

    public function down()
    {
        $this->forge->dropTable('password_reset_token');

        $this->forge->modifyColumn('usuario', [
            'password' => [
                'name'       => 'password',
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => false,
            ],
        ]);
    }
}
