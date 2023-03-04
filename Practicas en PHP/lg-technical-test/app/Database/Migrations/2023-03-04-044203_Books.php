<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'book_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'publication_date' => [
                'type' => 'DATE',
            ],
            'edition' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deleted_at' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->createTable('books', true);
    }

    public function down()
    {
        $this->forge->dropTable('books', true);
    }
}
