<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueryBuilderDemoController extends Controller {
    public function index( Request $request ) {
        //$query = Employee::with( [ 'department', 'country' ] );

        $query = DB::table( 'employees' )
        ->join( 'departments', 'employees.department_id', '=', 'departments.id' )
        ->join( 'countries', 'employees.country_id', '=', 'countries.id' )
        ->select( 'employees.*', 'departments.name as departmentname', 'countries.name as countryname' );

        $employees = collect( [] );
        $employees = $query->get();

        if ( $request->filled( 'search' ) ) {
            $search = $request->input( 'search' );
            $employees = $query->where( 'first_name', 'like', "%$search%" )->get();
            // dd( $employees );
            //$employees = $query->where( 'first_name', 'not like', "%$search%" )->get();

            //$employees = $query->where( 'email', '=', $search )->get();
            //$employees = $query->whereNot( 'email', '=', $search )->get();

            //$employees = $query->where( 'salary', '>', $search )->get();
            //$employees = $query->where( 'salary', '<', $search )->get();
            // $employees = $query->where( 'salary', '>=', $search )->get();
            // $employees = $query->where( 'salary', '<=', $search )->get();

            //$employees = $query->whereBetween( 'salary', [ $search, 67000 ] )->get();
            //$employees = $query->whereNotBetween( 'salary', [ $search, 67000 ] )->get();

            //$employees = $query->where( 'email', '=', $search )
            //->orWhere( 'department_id', '=', 5 )->get();

            //$employees = $query->where( 'first_name', '=', 'Alex' )
            // ->where( 'department_id', '=', 4 )->get();

        }

        // if ( $request->filled( 'country_id' ) ) {
        //     $employees = $query->where( 'country_id', $request->input( 'country_id' ) )->get();
        // }

        //if ( $request->filled( 'department_ids' ) ) {
        //$employees = $query->whereIn( 'department_id', $request->input( 'department_ids' ) )->get();
        //$employees = $query->whereNotIn( 'department_id', $request->input( 'department_ids' ) )->get();
        //}

        // if ( $request->filled( 'start_date' ) ) {

        //     $startdate = $request->input( 'start_date' );
        //     $enddate = $request->input( 'end_date' );
        //     $employees = $query->whereBetween( 'hire_date', [ $startdate, $enddate ] )->get();
        // }

        //$employees = $query->whereNull( 'phone_number' )->get();
        //$employees = $query->whereNotNull( 'phone_number' )->get();

        //$employees = $query->orderBy( 'department_id', 'desc' )->get();

        //$employees = $query->orderBy( 'department_id', 'desc' )
        //->orderBy( 'country_id', 'asc' )->get();

        //$countries = Country::all();
        //$departments = Department::all();

        $countries = DB::table( 'countries' )->get();
        $departments = DB::table( 'departments' )->get();

        return view( 'employeefilters.index', compact( 'employees', 'countries', 'departments' ) );

    }

    public function queryfilter( Request $request ) {
        $results = null;

        // Find employee by ID
        // $results = DB::table( 'employees' )->where( 'id', 13 )->first();

        // Find multiple employees by IDs
        $results = DB::table( 'employees' )->whereIn( 'id', [ 16, 19 ] )->get();

        // Get one employee record
        //$results = DB::table( 'employees' )->take( 1 )->get();

        // dd( $results );
        // Get first 3 employees
        // $results = DB::table( 'employees' )->take( 3 )->get();

        // Get first employee
        // $results = DB::table( 'employees' )->first();

        // Order by firstname, then get the first employee
        // $results = DB::table( 'employees' )->orderBy( 'first_name' )->first();

        // Get last employee
        // $results = DB::table( 'employees' )->latest( 'id' )->first();

        // Order by firstname and get the last employee
        // $results = DB::table( 'employees' )->orderBy( 'first_name', 'desc' )->first();

        // Find employee by firstname
        // $results = DB::table( 'employees' )->where( 'first_name', 'NickDiaz' )->first();

        if ( $results ) {
            return view( 'employeefilters.queryfilter', compact( 'results' ) );
        } else {
            return 'Employee Not Found.';
        }
    }

}
