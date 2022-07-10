<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 255,
                'unique' => true,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'role' => [
                'type' => 'enum',
                'constraint' => ['admin', 'student'],
                'default' => 'student',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        // $this->forge->addUniqueKey('username');

        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
