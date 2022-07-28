<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts');
    }
}