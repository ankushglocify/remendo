<?php

namespace App\Http\Controllers;
use App\Member;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $date = now();

       $dob= Member::whereMonth('dob', '>', $date->month)
           ->orWhere(function ($query) use ($date) {
               $query->whereMonth('dob', '=', $date->month)
                   ->whereDay('dob', '>=', $date->day);

           })
           ->orderByRaw("DAYOFMONTH('dob')",'ASC')
           ->get();

        $aniversary= Member::whereMonth('aniversary', '>', $date->month)
       ->orWhere(function ($query) use ($date) {
           $query->whereMonth('aniversary', '=', $date->month)
               ->whereDay('aniversary', '>=', $date->day);

       })
       ->orderByRaw("DAYOFMONTH('aniversary')",'ASC')
       ->get();
       $dob_count = count($dob);
       $aniversary_count = count($aniversary);

        return view('dashboard',compact('dob','aniversary','dob_count','aniversary_count'));
    }
}
