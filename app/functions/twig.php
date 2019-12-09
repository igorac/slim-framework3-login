<?php

/**
 * Functions Custons Twig
 */

use App\models\admin\Admin;
use App\src\Flash;

$message = new \Twig\TwigFunction('message', function($index){
    echo Flash::get($index);
});

$assets = new \Twig\TwigFunction('assets', function($target) {
    echo assets($target);
});

$dd = new \Twig\TwigFunction('dd', function($dados){
    dd($dados);
});

$admin = new \Twig\TwigFunction('admin', function() {
    return Admin::getUser();    
}); 



// Responsável por retornar as functions
return [ 
  $message,
  $assets,
  $dd,
  $admin
];