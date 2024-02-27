<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_item' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_cat' => [
                'type'       => 'INT',
                'constraint' => 15,
            ],
            'nama_product' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_item', true);
        $this->forge->createTable('item_products');
    }

    public function down()
    {
        $this->forge->dropTable('item_products');
    }
}
