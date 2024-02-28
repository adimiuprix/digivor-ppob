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
                'name'  => 'Pulsa Telkomsel',
                'type_listing'  => 'TELKOMSEL',
                'code'  => 'TLKM5',
                'price' => '5000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Telkomsel',
                'type_listing'  => 'TELKOMSEL',
                'code'  => 'TLKM10',
                'price' => '10000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Telkomsel',
                'type_listing'  => 'TELKOMSEL',
                'code'  => 'TLKM50',
                'price' => '50000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Three',
                'type_listing'  => 'THREE',
                'code'  => 'THR5',
                'price' => '5000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Three',
                'type_listing'  => 'THREE',
                'code'  => 'THR10',
                'price' => '10000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Three',
                'type_listing'  => 'THREE',
                'code'  => 'THR20',
                'price' => '20000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Three',
                'type_listing'  => 'THREE',
                'code'  => 'THR50',
                'price' => '50000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Indosat',
                'type_listing'  => 'INDOSAT',
                'code'  => 'INDST5',
                'price' => '5000',
            ],
            [
                'category' => 'Pulsa',
                'name'  => 'Pulsa Indosat',
                'type_listing'  => 'INDOSAT',
                'code'  => 'INDST10',
                'price' => '10000',
            ],
            [
                'category' => 'E-wallet',
                'name'  => 'Saldo Dana',
                'type_listing'  => 'DANA',
                'code'  => 'DANA5',
                'price' => '5000',
            ],
        ];
        // Simple Query
        $this->db->table('products')->insertBatch($data);
    }
}