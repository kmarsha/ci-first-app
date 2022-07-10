<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ], 
            'name' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'message' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'varchar',
                'constraint' => 20,
            ]
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('contacts');
    }

    public function down()
    {
        $this->forge->dropTable('contacts');
    }
}
