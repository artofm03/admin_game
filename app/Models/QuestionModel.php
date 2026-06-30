<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table            = 'questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'level_id', 
        'material_id', 
        'text_en', 
        'text_id', 
        'created_by'
    ];

    protected $useTimestamps = true;

    public function getQuestionsWithLevel()
    {
        return $this->select('questions.*, levels.level_name')
                    ->join('levels', 'levels.id = questions.level_id')
                    ->findAll();
    }

    public function getRandomQuestions($level_id, $limit = 10)
    {
        return $this->where('level_id', $level_id)
                    ->orderBy('RAND()')
                    ->limit($limit)
                    ->find();
    }
}