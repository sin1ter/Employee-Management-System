<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/admin',[AdminController::class, 'index'])->name('admin.create');
Route::post('/admin',[AdminController::class, 'storeData'])->name('admin.save');

Route::get('/admin/viewadmin',[AdminController::class, 'getadminview']);

Route::get('/admin/delete/{id}',[AdminController::class, 'deleteAdmin']);
Route::get('/admin/edit/{id}',[AdminController::class, 'editAdmin']);
Route::post('/admin/update/{id}',[AdminController::class, 'update']);


Route::get('/admin/ed/{id}',[AdminController::class, 'edAdmin']);
Route::post('/admin/up/{id}',[AdminController::class, 'upAdmin']);

Route::get('/employee',[EmployeeController::class, 'index'])->name('employee.create');
Route::post('/employee',[EmployeeController::class, 'storeData'])->name('employee.save');

Route::get('/employee/viewemployee',[EmployeeController::class, 'getemployeeview']);

Route::get('/employee/delete/{id}',[EmployeeController::class, 'deleteEmployee']);
Route::get('/employee/edit/{id}',[EmployeeController::class, 'editEmployee']);
Route::post('/employee/update/{id}',[EmployeeController::class, 'update']);

Route::get('/employee/ed/{id}',[EmployeeController::class, 'edEmployee']);
Route::post('/employee/up/{id}',[EmployeeController::class, 'upEmployee']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminindex'])->name('admin.home')->middleware('is_admin');