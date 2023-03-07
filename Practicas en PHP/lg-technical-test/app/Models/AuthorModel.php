<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'authors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'first_name',
        'last_name',
        'country',
        'registration_date',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'registration_date';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'first_name' => 'required|string|max_length[255]|min_length[3]',
        'last_name' => 'required|string|max_length[255]|min_length[3]',
        'country' => 'required|string|max_length[255]|min_length[2]',
    ];
    protected $validationMessages   = [
        'first_name' => [
            'required' => 'El campo nombre es requerido.',
            'string' => 'El campo nombre debe de ser de tipo texto.',
            'max_length' => 'El campo nombre no debe de ser mayor a {param} caracteres.',
            'min_length' => 'El campo nombre no debe de ser menor a {param} caracteres.',
        ],
        'last_name' => [
            'required' => 'El campo apellido es requerido.',
            'string' => 'El campo apellido debe de ser de tipo texto.',
            'max_length' => 'El campo apellido no debe de ser mayor a {param} caracteres.',
            'min_length' => 'El campo apellido no debe de ser menor a {param} caracteres.',
        ],
        'country' => [
            'required' => 'El campo país es requerido.',
            'string' => 'El campo país debe de ser de tipo texto.',
            'max_length' => 'El campo país no debe de ser mayor a {param} caracteres.',
            'min_length' => 'El campo país no debe de ser menor a {param} caracteres.',
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
