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

    <!-- Main Content Area -->
    <main class="maincontent">
        

    

        <div class="w-full md:w-5/6 lg:w-3/4 mx-auto bg-white dark:bg-[#404040] p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800 dark:text-white">Edit Employee</h2>

        @if ($errors->any())
    <div class="mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('employee.update', ['employee' => $employee->id]) }}" enctype="multipart/form-data" class="bg-white text-black dark:bg-[#404040] dark:text-white p-6 rounded-lg">
    @csrf 
    @method('put')

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                <div class="mb-4">
                    <label>First Name</label>
                    <input type="text" name="First_name" placeholder="First Name" value="{{ $employee->First_name }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Last Name</label>
                    <input type="text" name="Last_name" placeholder="Last Name" value="{{ $employee->Last_name }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Department</label>
                    <input type="text" name="Department" placeholder="Department" value="{{ $employee->Department }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Position</label>
                    <input type="text" name="Position" placeholder="Position" value="{{ $employee->Position }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Email</label>
                    <input type="text" name="Email" placeholder="Email" value="{{ $employee->Email }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Phone</label>
                    <input type="text" name="Phone" placeholder="Phone" value="{{ $employee->Phone }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Address</label>
                    <input type="text" name="Address" placeholder="Address" value="{{ $employee->Address }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Date of Birth</label>
                    <input type="date" name="Date_of_birth" value="{{ $employee->Date_of_birth }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Gender</label>
                    <input type="text" name="Gender" placeholder="Gender" value="{{ $employee->Gender }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Nationality</label>
                    <input type="text" name="Nationality" placeholder="Nationality" value="{{ $employee->Nationality }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Marital Status</label>
                    <input type="text" name="Marital_status" placeholder="Marital Status" value="{{ $employee->Marital_status }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>
                
                <div class="mb-4">
                    <label>Employment Status</label>
                    <input type="text" name="Employment_status" placeholder="Employment Status" value="{{ $employee->Employment_status }}" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
                </div>      

                <div class="mb-4">
        <label for="image">Profile Image</label>
        <input type="file" name="image" id="image" accept="image/*" class="w-full p-2 border text-black border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200" />
    </div>

         <div>
        <input type="submit" value="Update" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-500 transition" />
    </div>
            </form>
        </div>
    
    </main>

@vite('resources/js/app.js')
</body>
</html>
