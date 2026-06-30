<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClassModel;

class ClassController extends BaseController
{
    protected $classModel;

    public function __construct()
    {
        $this->classModel = new ClassModel();
    }

    public function index()
    {
        $data['classes'] = $this->classModel
            ->select('classes.*, teachers.full_name')
            ->join('teachers', 'teachers.id = classes.teacher_id', 'left')
            ->findAll();
        return view('admin/classes/index', $data);
    }

    public function create()
    {
        $data['classes'] = $this->classModel
            ->select('classes.*, teachers.full_name')
            ->join('teachers', 'teachers.id = classes.teacher_id', 'left')
            ->findAll();
        return view('admin/classes/create');
    }

    public function store()
    {
        $data = [
            'class_name' => $this->request->getPost('class_name'),
            'teacher_id' => session()->get('teacher_id')
        ];

        $this->classModel->insert($data);
        return redirect()->to('/admin/classes')->with('success', 'Kelas berhasil ditambahkan');
    }

    // edit, update, delete (sama pola seperti StudentController)
    public function edit($id = null)
    {
        $data['class'] = $this->classModel
            ->select('classes.*, teachers.full_name')
            ->join('teachers', 'teachers.id = classes.teacher_id', 'left')
            ->find($id);
        return view('admin/classes/edit', $data);
    }

    public function update($id = null)
    {
        $this->classModel->update($id, ['class_name' => $this->request->getPost('class_name')]);
        return redirect()->to('/admin/classes')->with('success', 'Kelas berhasil diupdate');
    }

    public function delete($id = null)
    {
        $this->classModel->delete($id);
        return redirect()->to('/admin/classes')->with('success', 'Kelas berhasil dihapus');
    }
}