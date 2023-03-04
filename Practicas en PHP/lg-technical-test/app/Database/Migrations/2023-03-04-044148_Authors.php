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
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'registration_date' => [
                'type' => 'DATE',
            ],
            'registered_books_qty' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->createTable('authors', true);
    }

    public function down()
    {
        $this->forge->dropTable('authors', true);
    }
}
