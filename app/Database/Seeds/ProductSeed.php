<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category' => 'Pulsa',
                'nama'  => 'Pulsa Telkomsel',
                'type_listing'  => 'TELKOMSEL',
                'code'  => 'TLKM10',
                'harga' => '10000',
            ],
            [
                'category' => 'Pulsa',
                'nama'  => 'Pulsa Telkomsel',
                'type_listing'  => 'TELKOMSEL',
                'code'  => 'TLKM50',
                'harga' => '50000',
            ],

        ];
        // Simple Query
        $this->db->table('products')->insertBatch($data);
    }
}