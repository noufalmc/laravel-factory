<?php

use Illuminate\Support\Facades\Route;
use App\Models\student;
use App\Models\standard;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {

    $data=student::classWise('1')->limit('10')->oldest()->get();
    $count=student::classWise('1')->count();
    return view('student/list')->with(['data'=>$data,'count'=>$count]);
})->name('student.home');
Route::get('/student-form', function(){
    $std = standard::all();
    return view('student/form')->with('data',$std);
})->name('student.form');

Route::post('save-data',[StudentController::class,'save'])->name('student.save');
Route::get('edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('editUpdate/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('student-delete/{id}',[StudentController::class,'delete'])->name('student.delete');