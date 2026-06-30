<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeacherModel;

class AuthController extends BaseController
{
    public function login()
    {
        // Cegah loop
        if (session()->get('is_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        $model = new TeacherModel();
        $teacher = $model->where('username', $username)->first();

        if ($teacher && password_verify($password, $teacher['password'])) {
            
            session()->set([
                'teacher_id'   => $teacher['id'],
                'username'     => $teacher['username'],
                'full_name'    => $teacher['full_name'],
                'is_logged_in' => true
            ]);

            return redirect()->to('/admin/dashboard')->with('success', 'Login berhasil!');
        } 

        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}