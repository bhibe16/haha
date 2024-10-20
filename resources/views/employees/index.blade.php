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

    <!-- Navbar -->
    <nav class="navbar">
        <div class="flex items-center">
            <button id="menu-toggle" class="sm:hidden">
                <span class="material-icons">menu</span>
            </button>
        </div>
        <h1 class="text-2xl flex-grow text-center">Human Resources Information System</h1>
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

   <!-- Main Content Area -->
<main class="maincontent">
    <h1 class="text-2xl font-bold mb-4">Employee Records</h1>

    <!-- Success message -->
    <div>
        @if(session()->has('success'))
            <div class="bg-green-500 text-black p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <div class="flex justify-between mb-4">

        <!-- Create New Employee Button -->
        <div>
            <a href="{{ route('employee.create') }}" class="bg-gray-600 hover:bg-black text-white font-bold py-2 px-4 rounded">
                Create new employee
            </a>
        </div>
        

        <!-- Search Input -->
        <div>
            <input type="text" id="searchInput" oninput="filterEmployees()" placeholder="Search employees..." class="p-2 border rounded">
        </div>
    </div>
    
    <!-- Employee Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($employees as $employee)
            <div class="employee-card bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer" onclick="openModal({{ $employee->id }})">
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" class="w-16 h-16 rounded-full object-cover">
                    <div class="ml-4">
                        <h2 class="text-lg font-bold dark:text-white">{{ $employee->First_name }} {{ $employee->Last_name }}</h2>
                        <p class="text-gray-600 dark:text-gray-400">{{ $employee->Department }}</p>
                        <p class="text-gray-600 dark:text-gray-400">{{ $employee->Position }}</p>
                    </div>
                </div>        
            </div>
            
            <!-- Modal for displaying employee information -->
            <div id="employeeModal{{ $employee->id }}" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-1/2">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold dark:text-white">Employee Information</h2>
                        <button class="material-icons cursor-pointer" onclick="closeModal({{ $employee->id }})">close</button>
                    </div>
                    <div class="flex items-center justify-between mb-4">
    <!-- Left Side (Employee Image and Info) -->
    <div class="flex items-center">
        <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" class="w-24 h-24 rounded-full object-cover">
        <div class="ml-4">
            <h3 class="text-lg font-bold dark:text-white">{{ $employee->First_name }} {{ $employee->Last_name }}</h3>
            <p class="text-gray-600 dark:text-gray-400">Department: {{ $employee->Department }}</p>
            <p class="text-gray-600 dark:text-gray-400">Position: {{ $employee->Position }}</p>
        </div>
    </div>

    <!-- Right Side (Links) - Vertically aligned -->
    <div class="flex flex-col items-end space-y-2">
        <a href="{{ route('employee.history', ['id' => $employee->id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-black dark:text-white" viewBox="0 -960 960 960">
        <path d="M160-200v-440 440-15 15Zm0 80q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v171q-18-13-38-22.5T800-508v-132H160v440h283q3 21 9 41t15 39H160Zm240-600h160v-80H400v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm20-208v-112h-40v128l86 86 28-28-74-74Z"/></svg></a>

        <a href="{{ route('employee.documents', ['id' => $employee->id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-black dark:text-white" viewBox="0 -960 960 960">
        <path d="M240-80q-50 0-85-35t-35-85v-120h120v-560h600v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-600H320v480h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h360v80H360Zm0 120v-80h360v80H360ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm0 0h-40 400-360Z"/></svg> </a>

        <a href="{{ route('employee.contracts', ['id' => $employee->id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-black dark:text-white" viewBox="0 -960 960 960">
        <path d="M320-440h320v-80H320v80Zm0 120h320v-80H320v80Zm0 120h200v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg></a>
    </div>
</div>

                    <div class="employee-details grid grid-cols-1 md:grid-cols-2 gap-6">
                        <h3 class="text-xl font-semibold mb-4 col-span-1 md:col-span-2">Employee Information</h3>
                    
                        <div class="detail-section bg-white dark:bg-[#404040] p-4 rounded-lg shadow-md mb-4">
                            <h4 class="text-lg font-semibold">Personal Details</h4>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Employee ID:</strong> {{ $employee->id }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Date of Birth:</strong> {{ $employee->Date_of_birth }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Gender:</strong> {{ $employee->Gender }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Nationality:</strong> {{ $employee->Nationality }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Marital Status:</strong> {{ $employee->Marital_status }}</p>
                        </div>
                    
                        <div class="detail-section bg-white dark:bg-[#404040] p-4 rounded-lg shadow-md mb-4">
                            <h4 class="text-lg font-semibold">Contact Information</h4>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Email:</strong> {{ $employee->Email }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Phone:</strong> {{ $employee->Phone }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Address:</strong> {{ $employee->Address }}</p>
                        </div>
                    
                        <div class="detail-section bg-white dark:bg-[#404040] p-4 rounded-lg shadow-md mb-4">
                            <h4 class="text-lg font-semibold">Professional Details</h4>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Department:</strong> {{ $employee->Department }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Position:</strong> {{ $employee->Position }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Start Date:</strong> {{ $employee->Start_date }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Employment Status:</strong> {{ $employee->Employment_status }}</p>
                        </div>
                    </div>
                    
                    
                    <div class="flex justify-end mt-4 space-x-2 items-center">
                        <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}" class="text-yellow-500 hover:text-yellow-300">Edit</a>

                        <form method="post" action="{{ route('employee.destroy', ['employee' => $employee]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" class="text-red-500 hover:text-red-300" value="Delete" />
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>

@vite('resources/js/app.js')
</body>
</html>
