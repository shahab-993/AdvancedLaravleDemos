<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeFirltersController extends Controller
{
    public function index(Request $request)
    {
        // Base query with relations
        $query = Employee::with(['department', 'country']);

        // Search by first_name or last_name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        // Filter by country
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        // Filter by department (multiple)
        if ($request->filled('department_ids')) {
            $query->whereIn('department_id', $request->department_ids);
        }

        // Filter by start_date (birth_date)
        if ($request->filled('start_date')) {
            $query->whereDate('birth_date', '>=', $request->start_date);
        }

        // Filter by end_date (hire_date)
        if ($request->filled('end_date')) {
            $query->whereDate('hire_date', '<=', $request->end_date);
        }

        // Execute query
        $employees = $query->get();

        // Get countries and departments for the filters
        $countries = Country::all();
        $departments = Department::all();

        // Return view
        return view('employeefilters.index', compact('employees', 'countries', 'departments'));
    }
}
