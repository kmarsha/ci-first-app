<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'nis' => [
                'type' => 'char',
                'constraint' => 8
            ],
            'prog' => [
                'type' => 'varchar',
                'constraint' => 120
            ],
            'tingkat' => [
                'type' => 'int',
                'constraint' => 2,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('username', 'users', 'username');

        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}
