<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use App\Models\usersModel;

class users_login extends BaseController
{
    public function login()
    {
        $session = session();
        $userModel = new usersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $userModel->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = $pass === $password;
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);


                return redirect()->route('Dashboard');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return view('page_welcome');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return view('page_welcome');
        }
    }
}
