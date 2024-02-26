<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'  => 'Dana',
                'code'  => 'DANA1',
                'harga' => '1000',
            ],
            [
                'nama'  => 'Dana',
                'code'  => 'DANA5',
                'harga' => '5500',
            ],
            [
                'nama'  => 'Dana',
                'code'  => 'DANA20',
                'harga' => '22000',
            ],
            [
                'nama'  => 'Dana',
                'code'  => 'DANA50',
                'harga' => '50000',
            ],
            [
                'nama'  => 'Dana',
                'code'  => 'DANA100',
                'harga' => '100000',
            ],
            [
                'nama'  => 'Telkomsel',
                'code'  => 'TELKOM5',
                'harga' => '6000',
            ],
            [
                'nama'  => 'Telkomsel',
                'code'  => 'TELKOM10',
                'harga' => '12000',
            ],
            [
                'nama'  => 'Telkomsel',
                'code'  => 'TELKOM20',
                'harga' => '22000',
            ],
            [
                'nama'  => 'Telkomsel',
                'code'  => 'TELKOM50',
                'harga' => '52000',
            ],
            [
                'nama'  => 'Token PLN',
                'code'  => 'PLN20',
                'harga' => '22000',
            ],
        ];
        // Simple Query
        $this->db->table('products')->insertBatch($data);
    }
}