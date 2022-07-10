<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'product_deskripsi' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addPrimaryKey('product_id');

        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
