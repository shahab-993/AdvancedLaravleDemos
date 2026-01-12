<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\EmployeeService;

class EmployeeDIDemoController extends Controller {

    protected $employeeService;

    public function __construct( EmployeeService $employeeService ) {
        $this->employeeService = $employeeService;
    }

    public function index( Request $request ) {

        $employees = $this->employeeService->getAllEmployees();

        return view( 'employeesDI.index', compact( 'employees' ) );
    }

    public function show( $id ) {
        $employee = $this->employeeService->getEmployeeById( $id );

        return view( 'employeesDI.show', compact( 'employee' ) );
    }

    public function destroy( $id ) {
        $this->employeeService->deleteEmployee( $id );

        return redirect()->route( 'employeesDI.index' )->with( 'success', 'Employee deleted successfully.' );
    }

    public function edit( $id ) {
        $employee = $this->employeeService->getEmployeeById( $id );
        $departments = Department::all();
        $countries = Country::all();

        return view( 'employeesDI.edit', compact( 'employee', 'departments', 'countries' ) );
    }

    public function update( Request $request, $id ) {

        $data = $request->all();

        $this->employeeService->updateEmployee( $id, $data );

        return redirect()->route( 'employeesDI.index' )->with( 'success', 'Employee updated successfully.' );
    }

    public function create() {
        $departments = Department::all();
        $countries = Country::all();

        return view( 'employeesDI.create', compact( 'departments', 'countries' ) );
    }

    public function store( Request $request ) {

        $data = $request->all();
        $this->employeeService->createEmployee( $data );

        return redirect()->route( 'employeesDI.index' )->with( 'success', 'Employee created successfully.' );
    }
}
