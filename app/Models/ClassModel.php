<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table            = 'classes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['class_name', 'teacher_id'];

    protected $useTimestamps = true;

    protected $validationRules = [
        'class_name' => 'required|min_length[2]'
    ];
}