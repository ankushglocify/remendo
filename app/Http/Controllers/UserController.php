<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use App\Rules\MatchOldPassword;
use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id =  Auth::id();
        $data = User::where('id',$id)->first();
        //dd($data);
        return view('front.profile',compact('data'));
    }

    public function update(Request $request)
    {   
        $id =  Auth::id();
        if($request->filled('new_password')) {
        $v = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

          if ($v->fails()) {
            return redirect()
            ->back()->withInput($request->input())
            ->withErrors($v->errors());
          }
          User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        }

        $v = Validator::make($request->all(), [
          'name'            => 'required',
          'email'         => 'required|email|unique:users,email,'.$id
        ]);

          if ($v->fails()) {
            return redirect()
            ->back()->withInput($request->input())
            ->withErrors($v->errors());
          }
   
        User::find(auth()->user()->id)->update(['name'=> $request->name, 'email' => $request->email]);
       return redirect()->back()->with('success','Update successfully');
    }



    
}
