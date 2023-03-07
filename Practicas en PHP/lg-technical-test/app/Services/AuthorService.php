<?php

namespace App\Services;

use App\Models\AuthorModel;

class AuthorService
{
    protected $model;
    protected $db;

    public function __construct()
    {
        $this->model = new AuthorModel();
        $this->db = db_connect();
        helper('form');
    }
    
    public function index()
    {
        $data['authors'] = $this->model->orderBy('registration_date', 'ASC')->findAll();
        return view('author/index', $data);
    }

    public function create()
    {
        return view('author/create/index');
    }

    public function store($request)
    {
        if (! $request->is('post') ) {
            return redirect()->back();
        }

        //Get post data
        $data = $request->getPost([
            'first_name',
            'last_name',
            'country',
        ]);

        try {
            if (!$this->model->save($data)) {
                return redirect()->back()->with('validationErrors', $this->model->errors());
            }
            return redirect('authors.index')->with('success', 'Autor creado con exito.');
        } catch (\Exception $ex) {
            log_message('error', $ex->getMessage());
            return redirect()->back()->with('error', 'Ha ocurrido un error, intente nuevamente en un momento o contacte a soporte si el problema persiste.');
        }
    }

    public function show($id)
    {
        $author = $this->model->find($id);
        $builder = $this->db->table('books')->select(['books.id']);
        $builder->join('authors_books', 'authors_books.book_id = books.id');
        $builder->where('authors_books.author_id', $author->id);
        $author->books_qty = count($builder->get()->getResult());

        $data['author'] = $author;
        return view('author/show/index', $data);
    }

    public function edit($id)
    {
        $data['author'] = $this->model->find($id);
        return view('author/edit/index', $data);
    }

    public function update($id, $request)
    {
        if (! $request->is('post') ) {
            return redirect()->back();
        }

        //Get post data
        $data = $request->getPost([
            'first_name',
            'last_name',
            'country',
        ]);

        try {
            if (!$this->model->update($id, $data)) {
                return redirect()->back()->with('validationErrors', $this->model->errors());
            }
            return redirect('authors.index')->with('success', 'Autor actualizado con exito.');
        } catch (\Exception $ex) {
            log_message('error', $ex->getMessage());
            return redirect()->back()->with('error', 'Ha ocurrido un error, intente nuevamente en un momento o contacte a soporte si el problema persiste.');
        }
    }
    
    public function delete($id)
    {
        try {
            $this->model->delete($id);
            return redirect('authors.index')->with('success', 'Autor eliminado con exito.');
        } catch (\Exception $ex) {
            log_message('error', $ex->getMessage());
            return redirect()->back()->with('error', 'Ha ocurrido un error, intente nuevamente en un momento o contacte a soporte si el problema persiste.');
        }
    }
}