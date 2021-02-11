<?php

use Illuminate\Support\Facades\Route;
use App\Member;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function (){
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@index')->name('profile');
Route::post('/profile', 'UserController@update')->name('updateprofile');
Route::get('/members', 'MemberController@index')->name('members');
Route::get('/getMembers', 'MemberController@getMembers')->name('getMembers');
Route::get('/addMember', 'MemberController@addMember')->name('addMember');
Route::get('/editMember/{id}', 'MemberController@edit')->name('editMember');
Route::post('/editMember/{id}', 'MemberController@update')->name('updateMember');
Route::get('/deleteMember/{id}', 'MemberController@destroy')->name('deleteMember');
Route::post('/addMember', 'MemberController@store');
Route::post('/import', 'MemberController@import');

Route::get('/all-tweets-csv', function(){

    $table = Member::all();
    $filename = "sample.csv";
    $headers = array(
        'Content-Type' => 'text/csv',
    );
  return response()->download($filename, 'sample.csv', $headers);
});

});