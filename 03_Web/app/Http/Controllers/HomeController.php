<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function schedule(){
      return view('schedule')->with('title', 'Schedule');
    }

    public function dashboard(){
      return view('dashboard')->with('title','Dashboard');
    }

    public function user(){
      return view('user')->with('title','User');
    }

}
