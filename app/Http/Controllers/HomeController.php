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
        //$this->middleware('auth');
         $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $date = now();
        $id = Auth::id();
       $dob= Member::whereMonth('dob', '>', $date->month)
           ->orWhere(function ($query) use ($date) {
               $query->whereMonth('dob', '=', $date->month)
                   ->whereDay('dob', '>=', $date->day);

           })
           ->orderByRaw("DAYOFMONTH('dob')",'ASC')->where('user_id',$id)
           ->get();

        $aniversary= Member::whereMonth('aniversary', '>', $date->month)
       ->orWhere(function ($query) use ($date) {
           $query->whereMonth('aniversary', '=', $date->month)
               ->whereDay('aniversary', '>=', $date->day);

       })
       ->orderByRaw("DAYOFMONTH('aniversary')",'ASC')->where('user_id',$id)
       ->get();
       $dob_count = count($dob);
       $aniversary_count = count($aniversary);

        return view('dashboard',compact('dob','aniversary','dob_count','aniversary_count'));
    }
}
