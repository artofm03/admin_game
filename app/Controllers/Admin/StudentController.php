<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\ClassModel;

class StudentController extends BaseController
{
    protected $studentModel;
    protected $classModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->classModel   = new ClassModel();
    }

    public function index()
    {
        $data['students'] = $this->studentModel
            ->select('students.*, classes.class_name')
            ->join('classes', 'classes.id = students.class_id', 'left')
            ->findAll();

        return view('admin/students/index', $data);
    }

    public function create()
    {
        $data['classes'] = $this->classModel->findAll();
        return view('admin/students/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'nisn'       => 'required|min_length[5]|is_unique[students.nisn]',
            'full_name'  => 'required',
            'class_id'   => 'required|numeric',
            'password'   => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', $validation->getErrors());
        }

        $data = [
            'nisn'       => $this->request->getPost('nisn'),
            'full_name'  => $this->request->getPost('full_name'),
            'class_id'   => $this->request->getPost('class_id'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            // 'is_active'  => 1
        ];

        $model = new \App\Models\StudentModel();

        if ($model->insert($data)) {
            return redirect()->to('/admin/students')
                            ->with('success', 'Siswa berhasil ditambahkan ke database');
        } else {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal menyimpan data ke database');
        }
    }

    public function edit($id = null)
    {
        $data['student'] = $this->studentModel->find($id);
        $data['classes'] = $this->classModel->findAll();
        return view('admin/students/edit', $data);
    }

    public function update($id = null)
    {
        $data = [
            'nisn'      => $this->request->getPost('nisn'),
            'full_name' => $this->request->getPost('full_name'),
            'class_id'  => $this->request->getPost('class_id'),
            'is_active' => $this->request->getPost('is_active')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->studentModel->update($id, $data);
        return redirect()->to('/admin/students')->with('success', 'Data siswa berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->studentModel->delete($id);
        return redirect()->to('/admin/students')->with('success', 'Siswa berhasil dihapus');
    }
}