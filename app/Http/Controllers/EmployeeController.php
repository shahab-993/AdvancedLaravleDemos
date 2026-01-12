<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Employee;
use App\Models\Department;



use App\Mail\EmployeeAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    //
    public function index(){
        $employees=Employee::with(['department','country'])->get();
        return view('employees.Index',compact('employees'));
    }
    public function show($id){
        $employee=Employee::with(['department','country'])->findOrFail($id);
        return view('employees.show',compact('employee'));
    }
    public function edit($id){
        $employee=Employee::with(['department','country'])->findOrFail($id);
        $departments=Department::all();
        $countries=Country::all();
        return view('employees.edit',compact('employee','departments','countries'));
    }
    public function update(Request $request,$id){
        $employee=Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success','Employee upadated successfully!');
    }

    public function destroy($id){
        $employee=Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee deleted successfully!');
    }

    public function create(){
        $departments=Department::all();
        $countries=Country::all();
        return view('employees.create',compact('countries','departments'));
    }
    public function store(Request $request){
       $employee= Employee::create($request->all());
       Mail::to($employee->email)->send(new EmployeeAdded($employee));
        return redirect()->route('employees.index')->with('success','Employee created successfully!');
    }
   }
