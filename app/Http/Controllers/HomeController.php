<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // Assuming you will create a home.blade.php view
    }
    public function showcategory()
    {
        return view('QuizList'); // Assuming you will create a home.blade.php view
    }

    public function contactus(){
        return view('team');
    }
}
