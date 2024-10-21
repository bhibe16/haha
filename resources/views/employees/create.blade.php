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
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16"> <!-- Update the path accordingly -->
                    </a>
                </li>
                
=======
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
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
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
                    <button id="dropdownButton" class="flex items-center justify-between w-full p-2 text-gray-200 rounded hover:bg-gray-700 mt-1">
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
<main class="maincontent p-6">
    <div>
        @if (session('success') && session('image'))
        <div class="mt-4 text-center">
            <img src="{{ asset('storage/public' . session('image')) }}" alt="Uploaded Image" class="max-w-full h-auto border rounded" style="max-width: 300px;">
            <p class="text-green-600 mt-2">Profile image uploaded successfully!</p>
        </div>
        @endif
    </div>

    <div>
        @if($errors->any())
        <ul class="text-red-600 mb-4">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <!-- Create Employees Form -->
<<<<<<< HEAD
    <div class="w-full md:w-full lg:w-full mx-auto bg-white dark:bg-[#404040] p-10 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800 dark:text-white">Create New Employee</h2>

    <form method="POST" action="{{ route('employee.index') }}" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

            <!-- First Name Field -->
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-white">First Name</label>
                <input type="text" id="first_name" name="First_name" placeholder="Firstname" value="{{ old('First_name') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Last Name Field -->
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-white">Last Name</label>
                <input type="text" id="last_name" name="Last_name" placeholder="Lastname" value="{{ old('Last_name') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Department Field -->
            <div class="mb-4">
                <label for="department" class="block text-sm font-medium text-gray-700 dark:text-white">Department</label>
                <input type="text" id="department" name="Department" placeholder="Department" value="{{ old('Department') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Position Field -->
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700 dark:text-white">Position</label>
                <input type="text" id="position" name="Position" placeholder="Position" value="{{ old('Position') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                <input type="email" id="email" name="Email" placeholder="Email" value="{{ old('Email') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Phone Field -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-white">Phone</label>
                <input type="text" id="phone" name="Phone" placeholder="Phone" value="{{ old('Phone') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Address Field -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-white">Address</label>
                <input type="text" id="address" name="Address" placeholder="Address" value="{{ old('Address') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Start_date Field -->
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-white">Start Date</label>
                <input type="date" id="start_date" name="Start_date" value="{{ old('Start_date') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Gender Field -->
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-white">Gender</label>
                <input type="text" id="gender" name="Gender" placeholder="Gender" value="{{ old('Gender') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Nationality Field -->
            <div class="mb-4">
                <label for="nationality" class="block text-sm font-medium text-gray-700 dark:text-white">Nationality</label>
                <input type="text" id="nationality" name="Nationality" placeholder="Nationality" value="{{ old('Nationality') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Marital Status Field -->
            <div class="mb-4">
                <label for="marital_status" class="block text-sm font-medium text-gray-700 dark:text-white">Marital Status</label>
                <input type="text" id="marital_status" name="Marital_status" placeholder="Marital Status" value="{{ old('Marital_status') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Date of Birth Field -->
            <div class="mb-4">
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 dark:text-white">Date of Birth</label>
                <input type="date" id="date_of_birth" name="Date_of_birth" value="{{ old('Date_of_birth') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>

            <!-- Employment Status Field -->
            <div class="mb-4">
                <label for="employment_status" class="block text-sm font-medium text-gray-700 dark:text-white">Employment Status</label>
                <input type="text" id="employment_status" name="Employment_status" placeholder="Employment Status" value="{{ old('Employment_status') }}" class="w-full p-2 border border-gray-300 rounded" required />
            </div>
        </div>

        <!-- Image Upload Section -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-white">Upload Profile Image</label>
            <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded bg-white" accept="image/*" />
        </div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md transition duration-200">Submit</button>
    </form>
</div>

=======
    <div class="w-full md:w-3/4 lg:w-1/2 mx-auto bg-white dark:bg-[#404040] p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800 dark:text-white">Create New Employee</h2>

        <form method="POST" action="{{ route('employee.index') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- First Name Field -->
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="First_name" placeholder="Firstname" value="{{ old('First_name') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Last Name Field -->
                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="Last_name" placeholder="Lastname" value="{{ old('Last_name') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Department Field -->
                <div class="mb-4">
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <input type="text" id="department" name="Department" placeholder="Department" value="{{ old('Department') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Position Field -->
                <div class="mb-4">
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="position" name="Position" placeholder="Position" value="{{ old('Position') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="Email" placeholder="Email" value="{{ old('Email') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Phone Field -->
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" id="phone" name="Phone" placeholder="Phone" value="{{ old('Phone') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Address Field -->
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="Address" placeholder="Address" value="{{ old('Address') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Start_date Field -->
                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" id="start_date" name="Start_date" value="{{ old('Start_date') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Gender Field -->
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <input type="text" id="gender" name="Gender" placeholder="Gender" value="{{ old('Gender') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Nationality Field -->
                <div class="mb-4">
                    <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                    <input type="text" id="nationality" name="Nationality" placeholder="Nationality" value="{{ old('Nationality') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Marital Status Field -->
                <div class="mb-4">
                    <label for="marital_status" class="block text-sm font-medium text-gray-700">Marital Status</label>
                    <input type="text" id="marital_status" name="Marital_status" placeholder="Marital Status" value="{{ old('Marital_status') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Date of Birth Field -->
                <div class="mb-4">
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="Date_of_birth" value="{{ old('Date_of_birth') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>

                <!-- Employment Status Field -->
                <div class="mb-4">
                    <label for="employment_status" class="block text-sm font-medium text-gray-700">Employment Status</label>
                    <input type="text" id="employment_status" name="Employment_status" placeholder="Employment Status" value="{{ old('Employment_status') }}" class="w-full p-2 border border-gray-300 rounded" required />
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Upload Profile Image</label>
                <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded bg-white" accept="image/*" />
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md transition duration-200">Submit</button>
        </form>
    </div>
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
</main>

@vite('resources/js/app.js')
</body>
</html>
