<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_name' => 'Emina1',
                'product_deskripsi' => 'Emina Deskripsi 1'
            ],
            [
                'product_name' => 'Emina2',
                'product_deskripsi' => 'Emina Deskripsi 2'
            ],
            [
                'product_name' => 'Emina3',
                'product_deskripsi' => 'Emina Deskripsi 3'
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }

}
