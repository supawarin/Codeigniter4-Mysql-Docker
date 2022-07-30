<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller {
    public function index() {
        // include helper form
        helper(['form']);
        echo view('login');
        
    }






}