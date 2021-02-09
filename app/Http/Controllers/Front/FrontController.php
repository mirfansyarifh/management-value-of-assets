<?php


namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    // TODO: fix the view
    public function login() {
        return redirect('/login');
    }

    // TODO: fix the view
    public function dashboard() {
        return view('index');
    }
}
