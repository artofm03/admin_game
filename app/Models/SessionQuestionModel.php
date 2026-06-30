<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionQuestionModel extends Model
{
    protected $table            = 'session_questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'session_id', 
        'question_id', 
        'student_pronunciation_score', 
        'is_correct'
    ];

    protected $useTimestamps = false;
}