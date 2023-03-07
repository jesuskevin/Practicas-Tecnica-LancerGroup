<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'book_name',
        'publication_date',
        'edition',
        'deleted_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'book_name' => 'required|string|max_length[255]|min_length[3]',
        'publication_date' => 'required|string|max_length[255]|min_length[3]',
        'edition' => 'required|integer|min_length[1]',
        'authors.*' => 'required|integer|min_length[1]',
    ];
    protected $validationMessages   = [
        'book_name' => [
            'required' => 'El campo titulo es requerido.',
            'string' => 'El campo titulo debe de ser de tipo texto.',
            'max_length' => 'El campo titulo no debe de ser mayor a {param} caracteres.',
            'min_length' => 'El campo titulo no debe de ser menor a {param} caracteres.',
        ],
        'publication_date' => [
            'required' => 'El campo fecha de publicación es requerido.',
            'string' => 'El campo fecha de publicación debe de ser de tipo texto.',
            'max_length' => 'El campo fecha de publicación no debe de ser mayor a {param} caracteres.',
            'min_length' => 'El campo fecha de publicación no debe de ser menor a {param} caracteres.',
        ],
        'edition' => [
            'required' => 'El campo edición es requerido.',
            'integer' => 'El campo edición debe de ser de tipo numerico.',
            'max_length' => 'El campo edición no debe se ser mayor a {param} caracteres.',
            'min_length' => 'El campo edición no debe de ser menor a {param} caracteres.',
        ],
        'authors.*' => [
            'required' => 'El campo autores es requerido.',
            'integer' => 'El campo autores debe de ser de tipo numerico',
            'min_length' => 'El campo autores no debe de ser menor a {param} caracteres.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
