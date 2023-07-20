<?php

namespace App\Controllers;

class Home extends BaseController
{
    

    public function pages()
    {
      
      
      return view('page_welcome');
    }

    public function dash(){
      return view('dashboard');
    }
   
    
}






