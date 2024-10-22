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
        <h2 class="text-xl font-semibold mb-4">Contract for {{ $employee->First_name }} {{ $employee->Last_name }}</h2>
        
        <!-- Contract Upload Form -->
        <form action="{{ route('employee.uploadContract', ['id' => $employee->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Contract Name:</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-lg"/>
            </div>
            <div class="mb-4">
                <label for="contract" class="block text-sm font-medium text-gray-700">Select Contract:</label>
                <input type="file" name="file" id="contract" required class="mt-1 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded file:border-0
                file:text-sm file:font-semibold
                file:bg-gray-50 file:text-gray-700
                hover:file:bg-gray-100"/>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload Contract</button>
        </form>

        <h2 class="text-xl font-semibold mt-8">Uploaded Contracts</h2>

        @if($employee->contracts->isEmpty())
            <p>No contracts uploaded yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                @foreach($employee->contracts as $contract)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <a href="{{ Storage::url($contract->file_path) }}" class="text-blue-500 font-semibold" target="_blank">{{ $contract->name }}</a>
                                <span class="text-gray-500 block text-sm">Uploaded on {{ $contract->created_at->format('d-m-Y') }}</span>
                            </div>
                            <form action="{{ route('employee.contract.delete', ['employee' => $employee->id, 'contract' => $contract->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>

    @vite('resources/js/app.js')
</body>
</html>
