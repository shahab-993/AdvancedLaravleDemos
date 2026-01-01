{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Training Demos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="{{ asset('/') }}js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tofsjonas/sortable@latest/sortable.min.css">
</head>

<body>

    <div class="content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div>
            @yield('content')
        </div>
    </div>

    <script>
        function searchEmployees(page = 1) {
            let query = $('#search').val();
            let perPage = $('#recordsPerPage').val();

            $.ajax({
                url: "{{ route('employees.search') }}?page=" + page,
                //url: "{{ route('employees.search') }}",
                method: "POST",
                data: {
                    search: query,
                    perPage: perPage,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#employeeTable').html(response.html);
                    $('#searchResultsCount').html(response.countMessage).show();
                    $('.pagination-container').html(response.pagination);
                },
                error: function(xhr) {
                    console.error('Search failed', xhr.responseJSON);
                }
            });
        }

        // Delegate click event for pagination links
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            alert($(this).attr('href').split('page=')[1]);
            let page = $(this).attr('href').split('page=')[1];
            searchEmployees(page);
        });
    </script>





</body>

</html>
