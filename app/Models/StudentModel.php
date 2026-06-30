<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'nisn', 
        'full_name', 
        'class_id', 
        'password', 
        // 'is_active'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    protected $validationRules = [
        'nisn'       => 'required|min_length[5]|is_unique[students.nisn]',
        'full_name'  => 'required',
        'class_id'   => 'required|numeric',
        'password'   => 'required|min_length[6]',
    ];
}