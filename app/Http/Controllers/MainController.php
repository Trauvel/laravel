<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }
}