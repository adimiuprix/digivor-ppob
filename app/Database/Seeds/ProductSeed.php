<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category' => '1',
                'nama'  => 'Dana',
                'code'  => 'DANA1',
                'harga' => '1000',
            ],
            [
                'category' => '1',
                'nama'  => 'Dana',
                'code'  => 'DANA5',
                'harga' => '5000',
            ],
            [
                'category' => '1',
                'nama'  => 'Dana',
                'code'  => 'DANA10',
                'harga' => '10000',
            ],

        ];
        // Simple Query
        $this->db->table('products')->insertBatch($data);
    }
}