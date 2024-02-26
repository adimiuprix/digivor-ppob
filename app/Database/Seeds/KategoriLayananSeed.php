<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriLayananSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori'  => 'Pulsa',
            ],
            [
                'kategori'  => 'Data',
            ],
            [
                'kategori'  => 'E-wallet',
            ],
        ];
        // Simple Query
        $this->db->table('kategoris')->insertBatch($data);
    }
}