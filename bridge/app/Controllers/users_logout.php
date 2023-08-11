<?php

namespace App\Controllers;

use App\Models\usersModel;

class users_logout extends BaseController
{


    public function logout()
    {
        $session = session();
        $session->destroy(); // Clear all session data
        return view('page_welcome');
    }

    public function redirect()
    {

        return view('page_welcome');
    }
}
