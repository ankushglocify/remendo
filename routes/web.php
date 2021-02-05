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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/members', 'MemberController@index')->name('members');
Route::get('/getMembers', 'MemberController@getMembers')->name('getMembers');
Route::get('/addMember', 'MemberController@addMember')->name('addMember');
Route::post('/addMember', 'MemberController@addMember');

Route::get('/all-tweets-csv', function(){

    $table = Member::all();
    $filename = "tweets.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('name','email', 'phone', 'dob', '	aniversary'));

    foreach($table as $row) {
        fputcsv($handle, array('name', 'email', 'phone', date('Y-m-d'),date('Y-m-d')));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );
    download($filename, 'tweets.csv', $headers);
    return redirect('/');
});
