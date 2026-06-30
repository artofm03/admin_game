<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MaterialModel;
use App\Models\LevelModel;

class MaterialController extends BaseController
{
    protected $materialModel;
    protected $levelModel;

    public function __construct()
    {
        $this->materialModel = new MaterialModel();
        $this->levelModel    = new LevelModel();
    }

    public function index()
    {
        $levelId = $this->request->getGet('level_id');

        $data['levels'] = $this->levelModel->findAll();
        $data['selectedLevel'] = $levelId;

        $query = $this->materialModel
            ->select('materials.*, levels.level_name')
            ->join('levels', 'levels.id = materials.level_id');

        if ($levelId) {
            $query->where('materials.level_id', $levelId);
        }

        $data['materials'] = $query->findAll();

        return view('admin/materials/index', $data);
    }

    public function create()
    {
        $data['levels'] = $this->levelModel->findAll();
        return view('admin/materials/create', $data);
    }

    public function store()
    {
        $text_en = $this->request->getPost('text_en');

        $data = [
            'level_id'      => $this->request->getPost('level_id'),
            'text_en'       => $text_en,
            'text_id'       => $this->request->getPost('text_id'),
            'audio_path'    => $this->request->getPost('audio_path'),
            'created_by'    => session()->get('teacher_id')
        ];

        $this->materialModel->insert($data);

        return redirect()->to('/admin/materials')
            ->with('success', 'Materi berhasil ditambahkan');
    }

    public function edit($id = null){
        $data['levels'] = $this->levelModel->findAll();
        $data['material'] = $this->materialModel->find($id);
        return view('admin/materials/edit', $data);
    }

    

    // edit, update, delete bisa ditambahkan sesuai kebutuhan
}