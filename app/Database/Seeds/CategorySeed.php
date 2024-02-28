<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category'  => 'Pulsa',
            ],
            [
                'category'  => 'Data',
            ],
            [
                'category'  => 'E-wallet',
            ],
            [
                'category'  => 'Game',
            ],
            [
                'category'  => 'PLN',
            ],
            [
                'category'  => 'Streamming',
            ],
            [
                'category'  => 'Samsat',
            ],
        ];
        // Simple Query
        $this->db->table('categories')->insertBatch($data);
    }
}