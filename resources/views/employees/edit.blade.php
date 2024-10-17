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

    <!-- Main Content Area -->
    <main class="maincontent">
        

    

        <div class="w-full md:w-1/2 mx-auto ">
            <form method="POST" action="{{ route('employee.update', ['employee' => $employee]) }}" class="bg-white text-black dark:bg-[#404040] dark:text-white p-6 rounded-lg">
                @csrf 
                @method('put')
                <div class="mb-4">
                    <h1 class="text-2xl font-bold mb-4 text-black dark:text-white">Edit employee</h1>
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

                <div>
                    <input type="submit" value="Update" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-500 transition" />
                </div>
            </form>
        </div>
    </main>
@vite('resources/js/app.js')
</body>
</html>
