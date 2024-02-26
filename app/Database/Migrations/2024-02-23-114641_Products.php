<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'code' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => '0.00',
            ],
        ]);

        $this->forge->addKey('id_product', true);
        $this->forge->createTable('products');

        // ... (Optional) Add foreign key constraint to 'category_id' referencing 'categories.id'
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
