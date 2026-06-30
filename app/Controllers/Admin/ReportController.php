<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GameSessionModel;
use App\Models\StudentModel;
use App\Models\StudentLevelModel;

class ReportController extends BaseController
{
    public function index()
    {
        $sessionModel = new GameSessionModel();
        $studentModel = new StudentModel();
        $progressModel = new StudentLevelModel();

        $data = [
            'title' => 'Laporan & Statistik',
            
            // Statistik Umum
            'total_students' => $studentModel->countAll(),
            'total_sessions' => $sessionModel->countAll(),
            'avg_score'      => $sessionModel->selectAvg('score')->first()['score'] ?? 0,

            // Top Siswa
            'top_students' => $sessionModel->select('students.full_name, AVG(game_sessions.score) as avg_score, COUNT(game_sessions.id) as total_play')
                ->join('students', 'students.id = game_sessions.student_id')
                ->groupBy('students.id')
                ->orderBy('avg_score', 'DESC')
                ->limit(10)
                ->find(),

            // Progress per Level
            'progress_per_level' => $progressModel->select('levels.level_name, COUNT(student_levels.id) as total_student, AVG(student_levels.progress_percentage) as avg_progress')
                ->join('levels', 'levels.id = student_levels.level_id')
                ->groupBy('levels.id')
                ->findAll(),

            // Riwayat Permainan Terbaru
            'recent_games' => $sessionModel->select('game_sessions.*, students.full_name, levels.level_name')
                ->join('students', 'students.id = game_sessions.student_id')
                ->join('levels', 'levels.id = game_sessions.level_id', 'left')
                ->orderBy('game_sessions.session_date', 'DESC')
                ->limit(20)
                ->find()
        ];

        return view('admin/reports/index', $data);
    }
}