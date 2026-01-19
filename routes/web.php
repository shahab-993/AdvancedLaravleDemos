<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDIDemoController;
use App\Http\Controllers\EmployeeFirltersController;
use App\Http\Controllers\ValidationsDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::get('/employees/{id}',[EmployeeController::class,'show'])->name('employees.show');

Route::get('/employees/{id}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::put('/employees/{id}',[EmployeeController::class,'update'])->name('employees.update');
Route::delete('/employee/delete/{id}',[EmployeeController::class,'destroy'])->name('employees.destroy');

Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');

Route::get('/employeesDI', [EmployeeDIDemoController::class, 'index'])->name('employeesDI.index');

Route::get('/employeesDI/create', [EmployeeDIDemoController::class, 'create'])->name('employeesDI.create');
Route::post('/employeesDI', [EmployeeDIDemoController::class, 'store'])->name('employeesDI.store');


Route::get('/employeesDI/{id}', [EmployeeDIDemoController::class, 'show'])->name('employeesDI.show');
Route::delete('/employeesDI/delete/{id}', [EmployeeDIDemoController::class, 'destroy'])->name('employeesDI.destroy');

Route::get('/employeesDI/{id}/edit', [EmployeeDIDemoController::class, 'edit'])->name('employeesDI.edit');
Route::put('/employeesDI/{id}', [EmployeeDIDemoController::class, 'update'])->name('employeesDI.update');

Route::get('/validationsdemo', [ValidationsDemoController::class,'create'])->name('validationsdemo.create');
Route::post('/validationsdemo', [ValidationsDemoController::class,'store'])->name('validationsdemo.store');

Route::get('/employeefilters',[EmployeeFirltersController::class,'index'])->name('employeefilters.index');
