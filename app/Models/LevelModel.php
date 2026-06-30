<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table            = 'levels';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['level_name', 'description'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'level_name' => 'required'
    ];
}