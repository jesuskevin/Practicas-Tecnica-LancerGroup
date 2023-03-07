<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthorBookModel;
use App\Models\AuthorModel;
use App\Models\BookModel;

class Book extends BaseController
{

    protected $model;
    protected $authorModel;
    protected $authorBookModel;
    protected $db;


    public function __construct()
    {
        $this->model = new BookModel();
        $this->authorModel = new AuthorModel();
        $this->authorBookModel = new AuthorBookModel();
        $this->db = db_connect();
        helper('form');
    }

    public function index()
    {
        $data['books'] = $this->model->orderBy('publication_date', 'ASC')->findAll();
        return view('book/index', $data);
    }

    public function create()
    {
        $data['authors'] = $this->authorModel->findAll();
        return view('book/create/index', $data);
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        //Get post data
        $data = $this->request->getPost([
            'book_name',
            'publication_date',
            'edition',
            'authors',
        ]);

        try {
            if (!$book = $this->model->insert($data)) {
                return redirect()->back()->with('validationErrors', $this->model->errors());
            }
            foreach ($data['authors'] as $author) { // save author id and book id in the pivot table
                $this->authorBookModel->save([
                    'author_id' => $author,
                    'book_id' => $book,
                ]);
            }
            return redirect('books.index')->with('success', 'Libro creado con exito.');
        } catch (\Exception $ex) {
            log_message('error', $ex->getMessage());
            return redirect()->back()->with('error', 'Ha ocurrido un error, intente nuevamente en un momento o contacte a soporte si el problema persiste.');
        }
    }

    public function show($id)
    {

        $book = $this->model->find($id);
        $builder = $this->db->table('authors')->select(['authors.first_name', 'authors.last_name']);
        $builder->join('authors_books', 'authors_books.author_id = authors.id');
        $builder->where('authors_books.book_id', $book->id);
        $book->authors = $builder->get()->getResult();

        $data['book'] = $book;
        return view('book/show/index', $data);
    }

    public function edit($id)
    {
        $selectedAuthors = [];
        $book = $this->model->find($id);
        $builder = $this->db->table('authors')->select('authors.id');
        $builder->join('authors_books', 'authors_books.author_id = authors.id');
        $builder->where('authors_books.book_id', $book->id);
        $book->authors = $builder->get()->getResult();

        foreach ($book->authors as $author) {
            array_push($selectedAuthors, $author->id);
        }

        $data['book'] = $book;
        $data['authors'] = $this->authorModel->findAll();
        $data['selectedAuthors'] = $selectedAuthors;

        return view('book/edit/index', $data);
    }

    public function update($id)
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        //Get post data
        $data = $this->request->getPost([
            'book_name',
            'publication_date',
            'edition',
            'authors',
        ]);

        try {
            if (!$this->model->update($id, $data)) {
                return redirect()->back()->with('validationErrors', $this->model->errors());
            }
            $this->authorBookModel->where('book_id', $id)->delete(); //Detach all the authors first and attach it again, do not matter if there are news or not
            foreach ($data['authors'] as $author) { // save author id and book id in the pivot table
                $this->authorBookModel->save([
                    'author_id' => $author,
                    'book_id' => $id,
                ]);
            }
            return redirect('books.index')->with('success', 'Libro actualizado con exito.');
        } catch (\Exception $ex) {
            log_message('error', $ex->getMessage());
            return redirect()->back()->with('error', 'Ha ocurrido un error, intente nuevamente en un momento o contacte a soporte si el problema persiste.');
        }
    }

    public function delete($id)
    {
        try {
            $this->model->delete($id);
            return redirect('books.index')->with('success', 'Libro eliminado con exito.');
        } catch (\Exception $ex) {
            log_message('error', $ex->getMessage());
            return redirect()->back()->with('error', 'Ha ocurrido un error, intente nuevamente en un momento o contacte a soporte si el problema persiste.');
        }
    }
}
