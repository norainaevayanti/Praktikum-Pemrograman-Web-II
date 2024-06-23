<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('vw_login');
    }

    public function process()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where('username', $username)->first();

        if ($dataUser) {
            // Check the password using object property syntax
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
