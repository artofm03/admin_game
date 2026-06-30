<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LevelModel;

class LevelController extends BaseController
{
    protected $levelModel;

    public function __construct()
    {
        $this->levelModel = new LevelModel();
    }

    public function index()
    {
        $data['levels'] = $this->levelModel->findAll();
        return view('admin/levels/index', $data);
    }

    public function create() { return view('admin/levels/create'); }

    public function store()
    {
        $this->levelModel->insert([
            'level_name'  => $this->request->getPost('level_name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/admin/levels')->with('success', 'Level berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        $data['level'] = $this->levelModel->find($id);

        if (!$data['level']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/levels/edit', $data);
    }

    public function update($id = null)
    {
        $this->levelModel->update($id, [
            'level_name'  => $this->request->getPost('level_name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/admin/levels')->with('success', 'Level berhasil diupdate');
    }

    public function delete($id = null){
        $this->levelModel->delete($id);
        return redirect()->to('/admin/levels')->with('success', 'Level Berhasil dihapus');
    }

    // edit, update, delete (sama seperti di atas)
}