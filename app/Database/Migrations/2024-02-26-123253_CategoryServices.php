<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategorysTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_category' => [
                'type'           => 'INT',
                'constraint'     => 11, // Consider using a standard constraint for IDs
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_category', true); // Set id_category as the primary key
        $this->forge->createTable('categorys');
    }

    public function down()
    {
        $this->forge->dropTable('categorys');
    }
}
