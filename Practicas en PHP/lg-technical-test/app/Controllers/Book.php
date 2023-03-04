<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;

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

    public function store(Request $request)
    {
        //
    }
}
