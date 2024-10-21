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
<<<<<<< HEAD
    <title>HRIS</title>
=======
    <title>HRIS - Documents</title>
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
</head>
<body class="relative">

    <!-- Navbar -->
    <nav class="navbar">
        <div class="flex items-center">
<<<<<<< HEAD
        </div>
        <h1 class="text-2xl flex-grow text-center">Human Resources Information System</h1>
        <div class="flex items-center space-x-4">
            
             <!-- Displaying the time inside a Material Icon -->
             <div class="flex items-center space-x-2"> <!-- Parent flex container -->
    <div class="flex items-center space-x-1"> <!-- Time display -->
        <span class="material-icons">access_time</span>
        <span id="time" class="text-lg font-bold text-black dark:text-white"></span>
    </div>

    <button id="theme-toggle" class="material-icons cursor-pointer focus:outline-none ml-4">brightness_6</button> <!-- Theme toggle button -->

    <div class="relative inline-flex items-center ml-4"> <!-- Profile and admin section -->
        <button class="material-icons cursor-pointer" id="profileIcon">account_circle</button>
        <span class="text-xs text-center cursor-pointer mb-0" id="adminText">Admin</span>
        
        <div id="dropdown" class="hidden absolute left-0 top-full mt-1  text-white rounded px-2 py-1 shadow-lg z-10">
            <ul class="list-none p-0 m-0">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center justify-between w-full text-left btn-logout px-2 py-1 text-xs"> <!-- Adjusted flex and justify -->
                            <span class="mr-2 whitespace-nowrap">Log Out</span> <!-- Adjusted margin for spacing -->
                            
=======
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
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
                        </button>
                    </form>
                </li>
            </ul>
        </div>
<<<<<<< HEAD
    </div>
</div>

        </div>
    </nav>

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

<!-- Sidebar -->
<aside id="sidebar" class="sidebar hidden transition-transform transform -translate-x-full fixed top-0 left-0 w-64 h-full bg-gray-800 text-white">
<br>
            <ul class=" space-y-2 font-medium">
                <li class="flex justify-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16"> <!-- Update the path accordingly -->
                    </a>
                </li>
                
                <li class="relative">
                    <a href="{{ route('employee.index') }}" class="hover-d">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-black dark:text-white" viewBox="0 -960 960 960">
                            <path d="M480.16-493q-72.62 0-122.39-50.27Q308-593.54 308-666q0-72.46 49.61-121.73Q407.22-837 479.84-837t122.89 49.16Q653-738.69 653-665.5q0 71.96-50.11 122.23Q552.78-493 480.16-493ZM138-130v-115.79q0-41.19 22.17-75.12Q182.34-354.83 220-372q62.2-27.9 127.78-44.95Q413.36-434 479.99-434q67.01 0 131.79 17.05Q676.56-399.9 739-372q37.91 15.25 60.95 50.3Q823-286.64 823-245.79V-130H138Zm342-454q33 0 57-24t24-57q0-33-23.8-57.5-23.79-24.5-57-24.5-33.2 0-57.2 24.68t-24 56.82q0 33.5 24 57.5t57 24Zm166 272v91h85v-21.51q0-15.42-9-28.96Q713-285 698-293q-12-7-25-11t-27-8Zm-252-23.32V-281h176v-53q-24-5.14-46-6.57-22-1.43-44-1.43t-43 1.52q-21 1.53-43 5.16ZM229-221h88v-96q-13.59 6.11-28.4 11.46-14.82 5.35-26.6 12.54-16 8-24.5 21.53-8.5 13.54-8.5 28.96V-221Zm417 0H317h329ZM480-665Z"/>
                        </svg>
                        <span class="ml-3">Employee Records</span>
                    </a>

                   
                </li>
</aside>
=======
    </aside>
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0

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
<<<<<<< HEAD
    </main>
    @vite('resources/js/app.js')

=======

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
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
</body>
</html>
