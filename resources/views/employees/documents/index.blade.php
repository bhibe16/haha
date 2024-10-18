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
    <title>HRIS - Documents</title>
</head>
<body class="relative">

    <!-- Navbar -->
    <nav class="navbar">
        <div class="flex items-center">
            <button id="menu-toggle" class="sm:hidden">
                <span class="material-icons">menu</span>
            </button>
        </div>
        <h1 class="text-2xl flex-grow text-center">Human Resources Information System</h1>
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-1">
                <span class="material-icons">access_time</span>
                <span id="time" class="text-lg font-bold text-black dark:text-white"></span>
            </div>
            <button id="theme-toggle" class="material-icons cursor-pointer focus:outline-none">brightness_6</button>
            <button class="material-icons cursor-pointer">account_circle</button>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="default-sidebar" class="sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <div class="flex justify-end sm:hidden">
                <button id="sidebar-close">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <br>
            <ul class="space-y-2 font-medium">
                <li class="flex justify-center">
                    <a href="dashboard">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16">
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee.index') }}" class="hover-d">
                        Employee Records
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <span>Log Out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="maincontent p-4">
        <h2 class="text-xl font-semibold mb-4">Document for {{ $employee->First_name }} {{ $employee->Last_name }}</h2>
        
        <!-- Document Upload Form -->
        <form action="{{ route('employee.upload', ['id' => $employee->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Document Name:</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full"/>
            </div>
            <div class="mb-4">
                <label for="document" class="block text-sm font-medium text-gray-700">Select Document:</label>
                <input type="file" name="file" id="document" required class="mt-1 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded file:border-0
                file:text-sm file:font-semibold
                file:bg-gray-50 file:text-gray-700
                hover:file:bg-gray-100"/>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload Document</button>
        </form>

        <h2 class="text-xl font-semibold mt-8">Uploaded Documents</h2>
        
        @if($employee->documents->isEmpty())
            <p>No documents uploaded yet.</p>
        @else
            <ul class="mt-4">
                @foreach($employee->documents as $document)
                    <li>
                        <a href="{{ Storage::url($document->file_path) }}" class="text-blue-500" target="_blank">{{ $document->name }}</a>
                        <span class="text-gray-500"> (Uploaded on {{ $document->created_at->format('d-m-Y') }})</span>
                    </li>
                @endforeach
            </ul>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>

    @vite('resources/js/app.js')
    <script>
        // Function to update time inside the icon
        function updateTime() {
            const timeElement = document.getElementById('time');
            const currentTime = new Date().toLocaleTimeString();
            timeElement.textContent = currentTime;
        }

        // Update the time every second
        setInterval(updateTime, 1000);
        updateTime(); // Call it initially to avoid delay
    </script>
</body>
</html>
