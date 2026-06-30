<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\QuestionModel;
use App\Models\LevelModel;

class QuestionController extends BaseController
{
    protected $questionModel;
    protected $levelModel;

    public function __construct()
    {
        $this->questionModel = new QuestionModel();
        $this->levelModel    = new LevelModel();
    }

    public function index()
    {
        $data['questions'] = $this->questionModel
            ->select('questions.*, levels.level_name')
            ->join('levels', 'levels.id = questions.level_id')
            ->findAll();

        return view('admin/questions/index', $data);
    }

    public function create()
    {
        $data['levels'] = $this->levelModel->findAll();
        return view('admin/questions/create', $data);
    }

    public function store()
    {
        $this->questionModel->insert([
            'level_id'  => $this->request->getPost('level_id'),
            'text_en'   => $this->request->getPost('text_en'),
            'text_id'   => $this->request->getPost('text_id'),
            'created_by'=> session()->get('teacher_id')
        ]);

        return redirect()->to('/admin/questions')->with('success', 'Soal berhasil ditambahkan');
    }
}