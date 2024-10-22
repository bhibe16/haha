<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>HRIS</title>
</head>
<body class="relative">

@include('components.navbar')

 <!-- Toggle Button -->
<button id="toggleSidebar" class="fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">
    <!-- Hamburger Icon (Menu) -->
    <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
    </svg>
    <!-- Close Icon (X) -->
    <svg id="closeIcon" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>

@include('components.sidebar')

    <!-- Main Content Area -->
    <main class="maincontent p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold">Employment History of {{ $employee->First_name }} {{ $employee->Last_name }}</h2>
            <a href="{{ route('employee.history.create', $employee->id) }}" class="btn btn-primary">
                <span class="material-icons">add</span> Add Employment History
            </a>
        </div>
        
        <!-- Employment History Table -->
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Job Title</th>
                    <th class="px-4 py-2">Company Name</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Job Responsibilities</th>
                    <th class="px-4 py-2">Start Date</th>
                    <th class="px-4 py-2">End Date</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $entry)
                    <tr>
                        <td class="border px-4 py-2">{{ $entry->job_title }}</td>
                        <td class="border px-4 py-2">{{ $entry->company_name }}</td>
                        <td class="border px-4 py-2">{{ $entry->location }}</td>
                        <td class="border px-4 py-2">{{ $entry->job_responsibilities }}</td>
                        <td class="border px-4 py-2">{{ $entry->start_date }}</td>
                        <td class="border px-4 py-2">{{ $entry->end_date ?? 'Present' }}</td>
                        <td class="border px-4 py-2 flex justify-around">
                            <!-- Edit Button -->
                            <a href="{{ route('employee.history.edit', ['employee' => $employee->id, 'history' => $entry->id]) }}" class="text-blue-500">
                                <span class="material-icons">edit</span>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('employee.history.destroy', ['employee' => $employee->id, 'history' => $entry->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this history?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">
                                    <span class="material-icons">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('employee.index', $employee->id) }}">Back to Records</a>
        <!-- If no employment history available -->
        @if($history->isEmpty())
        
            <p class="text-center text-gray-500 mt-4">No employment history records found.</p>
        @endif
    </main>

    @vite('resources/js/app.js')
 
</body>
</html>
