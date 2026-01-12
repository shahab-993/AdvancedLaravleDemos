<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
 {

    public function getAllEmployees() {
        return Employee::with( [ 'department', 'country' ] )->get();
    }

    public function getEmployeeById( int $id ): Employee {
        return Employee::with( [ 'department', 'country' ] )->findOrFail( $id );
    }

    public function deleteEmployee( int $id ): bool {
        $employee = Employee::findOrFail( $id );
        return $employee->delete();
    }

    public function updateEmployee( int $id, array $data ): Employee {
        $employee = Employee::findOrFail( $id );
        $employee->update( $data );

        return $employee;
    }

    public function createEmployee( array $data ): Employee {
        return Employee::create( $data );
    }

}