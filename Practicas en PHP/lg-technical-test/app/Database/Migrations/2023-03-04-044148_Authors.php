<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Authors extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'registration_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'deleted_at' => [
                'type' => 'DATE',
                'null' => false,
            ],
        ]);
        $this->forge->createTable('authors', true);
    }

    public function down()
    {
        $this->forge->dropTable('authors', true);
    }
}
