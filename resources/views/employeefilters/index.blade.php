@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Employee Filter</h2>
        <form action="{{ route('employeefilters.index') }}" method="GET" class="form-inline">
            <div class="row mb-3">
                {{-- Search Field  --}}
                <div class="col-md-3">
                    <label for="search">Search</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }} " placeholder="Search">
                </div>
                {{-- Country Select  --}}
                <div class="col-md-3">
                    <label for="country_id">Counrty</label>
                    <select name="country_id" id="counrty_id" class="form-select">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">
                                {{ request('country_id') == $country->id ? 'selected' : '' }}
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- department Select  --}}
                <div class="col-md-3">
                    <label for="departmentSelect">Department</label>
                    <select name="department_ids[]" id="departmentSelect" multiple class="form-select">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ in_array($department->id, (array) request('department_ids')) ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>

                </div>
                {{-- start date  --}}
                <div class="col-md-3">
                    <label for="birth_date">Start Date</label>
                    <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control"
                        id="start_date">
                </div>
                {{-- end date  --}}
                <div class="col-md-3">
                    <label for="hire_date">End Date</label>
                    <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control"
                        id="end_date">
                </div>
                {{-- Submit button  --}}
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 mt-4">Filter</button>

                </div>
            </div>
        </form>




        @if ($employees->isNotEmpty())
            <table class="table table-striped mt-4">
                <thead class="table table-striped mt-4">
                    <th>ID</th>
                    <th>Frist Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>birth Date</th>
                    <th>Hire Date</th>
                    <th>Email</th>
                    <th>Country</th>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->department?->name ?? 'N/A' }}</td>
                            <td>{{ $employee->country?->name ?? 'N/A' }}</td>

                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->birth_date }}</td>
                            <td>{{ $employee->hire_date }}</td>
                            <td>{{ $employee->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No Employees found.</p>
        @endif
    </div>
@endsection
