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
            'nama_item' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'category' => [
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
