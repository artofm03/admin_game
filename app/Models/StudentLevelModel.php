<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentLevelModel extends Model
{
    protected $table            = 'student_levels';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'student_id', 
        'level_id', 
        'progress_percentage', 
        'unlocked'
    ];

    public function getStudentProgress()
    {
        return $this->select('student_levels.*, students.full_name, levels.level_name')
                    ->join('students', 'students.id = student_levels.student_id')
                    ->join('levels', 'levels.id = student_levels.level_id')
                    ->findAll();
    }
}