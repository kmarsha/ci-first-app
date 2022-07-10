<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_karyawan' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'usia' => [
                'type' => 'int',
                'constraint' => 2,
            ],
            'status_vaksin_1' => [
                'type' => 'enum',
                'constraint' => ['sudah', 'belum'],
                'default' => 'belum',
            ],
            'status_vaksin_2' => [
                'type' => 'enum',
                'constraint' => ['sudah', 'belum'],
                'default' => 'belum',
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('employees', true);
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
