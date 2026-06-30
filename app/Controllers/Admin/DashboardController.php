<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\GameSessionModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();
        $sessionModel = new GameSessionModel();

        $data = [
            'total_students'    => $studentModel->countAll(),
            'active_students'   => $studentModel->where('is_active', 1)->countAllResults(),
            'total_sessions'    => $sessionModel->countAll(),
            'avg_score'         => $sessionModel->selectAvg('score')->first()['score'] ?? 0,
            'recent_sessions'   => $sessionModel->select('game_sessions.*, students.full_name')
                                ->join('students', 'students.id = game_sessions.student_id')
                                ->orderBy('session_date', 'DESC')
                                ->limit(5)
                                ->find()
        ];

        return view('admin/dashboard', $data);
    }
}