<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>

</head>

<body>
    <h1>Welcome to the Company, {{ $employee->first_name }} {{ $employee->last_name }}!</h1>
    <p>Here is the information have you provided:</p>

    <table>
        <tr>
            <th>First Name</th>
            <td>{{ $employee->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $employee->last_name }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $employee->title_name }}</td>
        </tr>
        <tr>
            <th>Has Passport</th>
            <td>{{ $employee->has_passport ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <th>Salary</th>
            <td>${{ number_format($employee->salary, 2) }}</td>
        </tr>
        <tr>
            <th>Birth Date</th>
            <td>{{ \Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Hire Date</th>
            <td>{{ \Carbon\Carbon::parse($employee->hire_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Notes</th>
            <td>{{ $employee->notes }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $employee->phone_number }}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{ $employee->department->name }}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>{{ $employee->country->name }}</td>
        </tr>
    </table>

    <p>We are thrilled to have you on our team!</p>
    <p>Best regards,</p>
    <p>Company Team</p>

</body>

</html>
