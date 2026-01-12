@extends('layouts.app')
@section('content')
    <div class="container mt-5">

        <a href="{{ route('employeesDI.create') }}" class="btn btn-primary mb-3">
            Add New Employee
        </a>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name></th>
                    <th>Title</span></th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>

            </thead>
            <tbody id="employeeTable">
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->title_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->department ? $employee->department->name : 'N/A' }}</td>
                        <td>{{ $employee->country ? $employee->country->name : 'N/A' }}</td>

                        <td>
                            <a href="{{ route('employeesDI.show', $employee['id']) }}" class="btn btn-info btn-sm">Details</a>
                            |
                            <form action="{{ route('employeesDI.destroy', $employee->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                    class="btn btn-danger">Delete</button>
                            </form>
                            |
                            <a href="{{ route('employeesDI.edit', $employee['id']) }}"
                                class="btn btn-warning btn-sm">Edit</a>




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
