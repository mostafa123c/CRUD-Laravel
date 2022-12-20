<?php

use App\Http\Controllers\DepartmentController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('department/create',[DepartmentController::class , 'create'])->name('depar.create');
Route::post('department/store',[DepartmentController::class , 'store'])->name('depar.store');
Route::get('/' , [DepartmentController::class , 'alldepartments'])->name('depar.all');
Route::delete('department/delete' , [DepartmentController::class , 'delete'])->name('depar.delete');
//Route::get('department/delete/{department_id}' , [DepartmentController::class , 'delete'])->name('depar.delete');
Route::get('department/edit/{department_id}' , [DepartmentController::class , 'edit'])->name('depar.edit');
Route::put('department/update', [DepartmentController::class , 'update' ])->name('depar.update');

