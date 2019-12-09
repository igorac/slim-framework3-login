<?php

namespace App\controllers;

use App\models\Model;
use App\models\Post;
use App\models\User;
use App\src\Login;
use App\src\Password;

class HomeController extends Controller
{

    public function index()
    {
        $user = new User;
        $users = $user->select()->busca('name,email')->paginate(5)->get();

        $this->view('home', [
            'users' => $users,
            'title' => 'Home',
            'links' => $user->links(),
        ]);
    }

}