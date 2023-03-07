<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\BookService;

class Book extends BaseController
{

    protected $bookService;

    public function __construct()
    {
        $this->bookService = new BookService();
    }

    public function index()
    {
        return $this->bookService->index();
    }

    public function create()
    {
        return $this->bookService->create();
    }

    public function store()
    {
        return $this->bookService->store($this->request);
    }
   
    public function show($id)
    {
        return $this->bookService->show($id);
    }

    public function edit($id)
    {
        return $this->bookService->edit($id);
    }

    public function update($id)
    {
        return $this->bookService->update($id, $this->request);
    }

    public function delete($id)
    {
        return $this->bookService->delete($id);
    }
}
