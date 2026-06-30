<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialModel extends Model
{
    protected $table            = 'materials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'level_id', 
        'text_en', 
        'text_id', 
        'audio_path', 
        'created_by'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

    public function getMaterialsWithLevel()
    {
        return $this->select('materials.*, levels.level_name')
                    ->join('levels', 'levels.id = materials.level_id')
                    ->findAll();
    }
}