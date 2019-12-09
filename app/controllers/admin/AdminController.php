<?php

namespace App\controllers\admin;

use App\controllers\Controller;
use App\models\admin\Admin;
use App\src\Login;
use App\src\Validate;

class AdminController extends Controller
{

    public function index()
    {
        $this->view('admin.login', [
            'title' => 'Login - Painel Administrativo'
        ]);
    }

    public function store()
    {

        $validate = new Validate;
        $data = $validate->validate([
            'email' => 'required:email',
            'passwd' => 'required'
        ]);

        if ($validate->hasErrors()) {
            return back();
        } 

        $login = new Login('admin');
        $loggedIn = $login->login($data, new Admin);

        if ($loggedIn) {
            redirect('/painel');
        }

        return back();
    }

    public function destroy()
    {
        $login = new Login('admin');
        $login->logout();
    }
    
}
