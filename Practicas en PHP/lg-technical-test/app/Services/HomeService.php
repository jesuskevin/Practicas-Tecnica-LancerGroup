<?php

namespace App\Services;

use App\Models\AuthorModel;
use App\Models\BookModel;

class HomeService
{
    protected $authorModel;
    protected $bookModel;

    public function __construct()
    {
        $this->authorModel = new AuthorModel();
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $data['registered_authors_qty'] = count($this->authorModel->findAll());
        $data['registered_books_qty'] = count($this->bookModel->findAll());

        return view('index', $data);
    }
}