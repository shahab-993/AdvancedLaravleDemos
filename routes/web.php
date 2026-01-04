<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('/employees/{id}',[EmployeeController::class,'show'])->name('employees.show');

Route::get('/employees/{id}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::put('/employees/{id}',[EmployeeController::class,'update'])->name('employees.update');
Route::delete('/employee/delete/{id}',[EmployeeController::class,'destroy'])->name('employees.destroy');
