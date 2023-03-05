<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeEditionColumnType extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('books', [
            'edition' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
