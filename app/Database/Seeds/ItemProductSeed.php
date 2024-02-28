<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemProductSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_item'  => 'TELKOMSEL',
                'category'  => 'Pulsa',
            ],
            [
                'nama_item'  => 'THREE',
                'category'  => 'Pulsa',
            ],
            [
                'nama_item'  => 'INDOSAT',
                'category'  => 'Pulsa',
            ],
            [
                'nama_item'  => 'AS',
                'category'  => 'Pulsa',
            ],
        ];
        // Simple Query
        $this->db->table('item_products')->insertBatch($data);
    }
}
