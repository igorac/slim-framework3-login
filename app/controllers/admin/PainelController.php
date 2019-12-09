<?php

namespace App\controllers\admin;

use App\controllers\Controller;
use App\src\Login;

class PainelController extends Controller 
{


    public function index()
    {
        $login = new Login('admin');


        if ($login->verify()) {
            $this->view('admin.painel', [
                'title' => 'Admin - Painel Administrativo'
            ]);
        } else {
            return back();
        }

        
    }

}   
