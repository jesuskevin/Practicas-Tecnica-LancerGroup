<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthorModel;

class Author extends BaseController
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

    public function store()
    {
        if (! $this->request->is('post') ) {
            return redirect()->back();
        }

        //Get post data
        $data = $this->request->getPost([
            'first_name',
            'last_name',
            'country',
        ]);

        //validate data
        if (! $this->validateData($data, [
            'first_name' => [
                'rules' => 'required|string|max_length[255]|min_length[3]',
                'errors' => [
                    'required' => 'El campo nombre es requerido.',
                    'string' => 'El campo nombre debe de ser de tipo texto.',
                    'max_length' => 'El campo nombre no debe de ser mayor a {param} caracteres.',
                    'min_length' => 'El campo nombre no debe de ser menor a {param} caracteres.',
                ]
            ],
            'last_name' => [
                'rules' => 'required|string|max_length[255]|min_length[3]',
                'errors' => [
                    'required' => 'El campo apellido es requerido.',
                    'string' => 'El campo apellido debe de ser de tipo texto.',
                    'max_length' => 'El campo apellido no debe de ser mayor a {param} caracteres.',
                    'min_length' => 'El campo apellido no debe de ser menor a {param} caracteres.',
                ]
            ],
            'country' => [
                'rules' => 'required|string|max_length[255]|min_length[2]',
                'errors' => [
                    'required' => 'El campo país es requerido.',
                    'string' => 'El campo país debe de ser de tipo texto.',
                    'max_length' => 'El campo país no debe de ser mayor a {param} caracteres.',
                    'min_length' => 'El campo país no debe de ser menor a {param} caracteres.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        try {
            $this->model->save($data);
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

    public function update($id)
    {
        if (! $this->request->is('post') ) {
            return redirect()->back();
        }

        //Get post data
        $data = $this->request->getPost([
            'first_name',
            'last_name',
            'country',
        ]);

        //validate data
        if (! $this->validateData($data, [
            'first_name' => [
                'rules' => 'required|string|max_length[255]|min_length[3]',
                'errors' => [
                    'required' => 'El campo nombre es requerido.',
                    'string' => 'El campo nombre debe de ser de tipo texto.',
                    'max_length' => 'El campo nombre no debe se ser mayor a {param} caracteres.',
                    'min_length' => 'El campo nombre no debe se ser menor a {param} caracteres.',
                ]
            ],
            'last_name' => [
                'rules' => 'required|string|max_length[255]|min_length[3]',
                'errors' => [
                    'required' => 'El campo apellido es requerido.',
                    'string' => 'El campo apellido debe de ser de tipo texto.',
                    'max_length' => 'El campo apellido no debe se ser mayor a {param} caracteres.',
                    'min_length' => 'El campo apellido no debe se ser menor a {param} caracteres.',
                ]
            ],
            'country' => [
                'rules' => 'required|string|max_length[255]|min_length[2]',
                'errors' => [
                    'required' => 'El campo país es requerido.',
                    'string' => 'El campo país debe de ser de tipo texto.',
                    'max_length' => 'El campo país no debe se ser mayor a {param} caracteres.',
                    'min_length' => 'El campo país no debe se ser menor a {param} caracteres.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        try {
            $this->model->update($id, $data);
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
