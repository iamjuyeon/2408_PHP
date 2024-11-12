<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function goLogin() {
        return view('login');//blade템플릿으로 이동(blade.php 이름 적으면 됨)
        
    }
}
