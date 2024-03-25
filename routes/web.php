<?php

use Illuminate\Support\Facades\Route;
use App\Models\student;
use App\Models\standard;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>'userIsLogined'],function(){
    Route::get('/', function () {
   
        $data=student::classWise('1')->paginate(10);
        return view('student/list')->with(['data'=>$data]);
        
    })->name('student.home');

    Route::get('/student-form', function(){
        $std = standard::all();
        return view('student/form')->with('data',$std);
    })->name('student.form');
    Route::post('save-data',[StudentController::class,'save'])->name('student.save');
    Route::get('edit/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::put('editUpdate/{id}',[StudentController::class,'update'])->name('student.update');
    Route::get('student-delete/{id}',[StudentController::class,'delete'])->name('student.delete');

    Route::get('/logout',[UsersController::class,'logout'])->name('logout');
});





Route::get('/login',[UsersController::class,'loginhome'])->name('login.home');
Route::post('/do-login',[UsersController::class,'doLogin'])->name('do.login');
