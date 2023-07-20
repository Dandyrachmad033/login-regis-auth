<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use App\Models\usersModel;

class users_register extends BaseController
{
    public function registered()
    {
        $session = session();
        $userModel = new usersModel();
        $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $Email    = $this->request->getVar('email');
        $validationRules = [
            'username'          => 'required|min_length[3]',
            'password'          => 'required|min_length[6]',
        ];

        if ($this->validate($validationRules)) {
            
            // Save user data to database
            $userModel = new usersModel();
            $userData = [
                'username' => $username,
                'password' => $password,
                'Email'    => $Email
            ];

            $userModel->insert($userData);
            $session->setFlashdata('msg', 'Berhasil membuat account');    
            // Redirect to success page or login page
            return view('page_welcome');
        } else {
            
            echo "tidak bisa menambahkan account";
        }
        
    }
}