<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentLevelModel;

class ProgressController extends BaseController
{
    public function index()
    {
        $model = new StudentLevelModel();

        $data['progress'] = $model
            ->select('
                student_levels.*,
                students.full_name,
                classes.class_name,
                levels.level_name
            ')
            ->join('students', 'students.id = student_levels.student_id')
            ->join('classes', 'classes.id = students.class_id', 'left')
            ->join('levels', 'levels.id = student_levels.level_id')
            ->orderBy('students.full_name', 'ASC')
            ->findAll();

        return view('admin/progress/index', $data);
    }
}