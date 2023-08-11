<?php

namespace App\Controllers;

use App\Models\usersModel;

class Home extends BaseController
{


  public function pages()
  {
    return view('page_welcome');
  }
}
