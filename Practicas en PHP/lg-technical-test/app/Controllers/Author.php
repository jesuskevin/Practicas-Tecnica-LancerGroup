<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Author extends BaseController
{
    public function index()
    {
        return view('author/index');
    }

    public function create()
    {
        return view('author/create/index');
    }
}
