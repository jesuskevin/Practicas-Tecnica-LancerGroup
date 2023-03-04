<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Book extends BaseController
{
    public function index()
    {
        return view('book/index');
    }

    public function create()
    {
        return view('book/create/index');
    }
}
