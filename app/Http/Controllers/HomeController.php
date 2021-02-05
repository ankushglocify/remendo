<?php

namespace App\Http\Controllers;
use App\Member;
use Auth;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $dob = Member::whereDate('dob', date('Y-m-d'))->count();
        $aniver = Member::whereDate('aniversary', date('Y-m-d'))->count();
        return view('dashboard',compact('dob','aniver'));
    }
}
