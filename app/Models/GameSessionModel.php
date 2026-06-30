<?php

namespace App\Models;

use CodeIgniter\Model;

class GameSessionModel extends Model
{
    protected $table            = 'game_sessions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'student_id', 
        'level_id', 
        'total_questions', 
        'correct_answers', 
        'score'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'session_date';

    public function getRecentSessions()
    {
        return $this->select('game_sessions.*, students.full_name')
                    ->join('students', 'students.id = game_sessions.student_id')
                    ->orderBy('session_date', 'DESC')
                    ->limit(10)
                    ->find();
    }
}