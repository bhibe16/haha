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
    <title>HRIS - Employment History</title>
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
                            
                        </button>
                    </form>
                </li>
            </ul>
        </div>
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
=======
            <button id="menu-toggle" class="sm:hidden">
                <span class="material-icons">menu</span>
            </button>
        </div>
        <h1 class="text-2xl flex-grow text-center">Employee Employment History</h1>
        <div class="flex items-center space-x-4">
            <span class="material-icons cursor-pointer">search</span>
            <span class="material-icons cursor-pointer">notifications</span>
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
            <ul class=" space-y-2 font-medium">
                <li class="flex justify-center">
                    <a href="dashboard">
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
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

<<<<<<< HEAD
                </li>
</aside>
=======
                    <!-- Dropdown Button -->
                    <button id="dropdownButton" class="flex items-center justify-between w-full p-2 text-black dark:text-white rounded hover-d mt-1">
                        <span>Others</span>
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 8l4.5 4.5L14.5 8H5.5z"/>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="absolute hidden bg-gray-800 text-white rounded shadow-lg mt-2 w-48">
                        <a href="" class="block px-4 py-2 hover:bg-gray-700">Employee History</a>
                        <a href="" class="block px-4 py-2 hover:bg-gray-700">Documents</a>
                        <a href="" class="block px-4 py-2 hover:bg-gray-700">Contract</a>
                    </div>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6-4v12" />
                            </svg>
                            <span class="ml-3">Log Out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0


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
<<<<<<< HEAD
        <a href="{{ route('employee.index', $employee->id) }}">Back to Records</a>
        <!-- If no employment history available -->
        @if($history->isEmpty())
        
=======
        <a href="{{ route('employee.index', $employee->id) }}">Back to History</a>
        <!-- If no employment history available -->
        @if($history->isEmpty())
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
            <p class="text-center text-gray-500 mt-4">No employment history records found.</p>
        @endif
    </main>

    @vite('resources/js/app.js')
<<<<<<< HEAD
 
=======
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
</body>
</html>
