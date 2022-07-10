<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductFakerSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i <10; $i++) {
            $data = [
                'product_name' => $faker->colorName,
                'product_deskripsi' => $faker->paragraph,
            ];
            $this->db->table('products')->insert($data);
        }
    }
}
