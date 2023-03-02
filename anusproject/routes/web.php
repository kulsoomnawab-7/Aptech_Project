<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentcontroller;
use App\Models\user;

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
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
    // Route::get('/dashboard', function () {
    //     if(Auth::user()->role==2)
    //     {
    //         return view('companydashboard');
    //     }
    //     else
    //     {            
    //         // return view('dashboard');
    //     }
    // Route::get("/dashboard", [studentcontroller::class,'get'])->name('dashboard');

    // })->name('dashboard');
// });

Route::post("/register_insert", [studentcontroller::class,'reg_insert']);
Route::get("/admin_login", [studentcontroller::class,'loginget']);
Route::get("/register", [studentcontroller::class,'registerget']);
Route::post("/register", [studentcontroller::class,'registerpost']);
Route::get("/login", [studentcontroller::class,'adminget']);
Route::post("/login_admin", [studentcontroller::class,'loginadminpost']);
Route::get("/labs", [studentcontroller::class,'labs']);
Route::get("/lab_systems", [studentcontroller::class,'lab_systems_']);
// exam fetch
Route::get("/exam_fetch", [studentcontroller::class,'exam_fetch']);