<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\AuthorService;

class Author extends BaseController
{
    protected $authorService;

    public function __construct()
    {
        $this->authorService = new AuthorService();
    }

    public function index()
    {
        return $this->authorService->index();
    }

    public function create()
    {
        return $this->authorService->create();
    }

    public function store()
    {
        return $this->authorService->store($this->request);
    }

    public function show($id)
    {
        return $this->authorService->show($id);
    }

    public function edit($id)
    {
        return $this->authorService->edit($id);
    }

    public function update($id, $request)
    {
        return $this->authorService->update($id, $this->request);
    }

    public function delete($id)
    {
        return $this->authorService->delete($id);
    }
}
