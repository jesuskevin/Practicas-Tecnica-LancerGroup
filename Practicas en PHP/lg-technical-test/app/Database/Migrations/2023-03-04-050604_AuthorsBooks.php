<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthorsBooks extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'author_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'book_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
        ]);
        $this->forge->addForeignKey('author_id', 'authors', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('book_id', 'books', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('authors_books', true);
    }

    public function down()
    {
        $this->forge->dropTable('authors_books', true);
    }
}
