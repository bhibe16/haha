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
       <!-- Create Employment History Form -->
<div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-white dark:bg-[#404040] p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800 dark:text-white">
        Add Employment History for {{ $employee->First_name }} {{ $employee->Last_name }}
    </h2>

    <form action="{{ route('employee.history.store', $employee->id) }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Job Title Field -->
            <div class="mb-4">
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}" required class="w-full p-2 border border-gray-300 rounded" />
            </div>

            <!-- Company Name Field -->
            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required class="w-full p-2 border border-gray-300 rounded" />
            </div>

            <!-- Location Field -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" required class="w-full p-2 border border-gray-300 rounded" />
            </div>

            <!-- Job Responsibilities Field -->
            <div class="mb-4">
                <label for="job_responsibilities" class="block text-sm font-medium text-gray-700">Job Responsibilities</label>
                <input type="text" name="job_responsibilities" id="job_responsibilities" value="{{ old('job_responsibilities') }}" required class="w-full p-2 border border-gray-300 rounded" />
            </div>

            <!-- Start Date Field -->
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required class="w-full p-2 border border-gray-300 rounded" />
            </div>

            <!-- End Date Field -->
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="w-full p-2 border border-gray-300 rounded" />
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add History</button>
    </form>

    <a href="{{ route('employee.history.index', $employee->id) }}" class="block text-center text-blue-600 hover:underline mt-4">Back to History</a>
</div>

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
