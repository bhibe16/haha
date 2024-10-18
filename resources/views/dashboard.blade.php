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
            
             <!-- Displaying the time inside a Material Icon -->
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
                    <button id="dropdownButton" class="flex items-center justify-between w-full p-2 text-black dark:text-white hover-d mt-1">
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
    <div class="bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-300 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900 p-10 rounded-lg shadow-lg mb-6 w-full max-w-2xl text-center">
    <h2 class="text-4xl font-bold text-black dark:text-white">Welcome HR3 Admin!</h2>
    </div>
<br>
<br>
<br>
<br>
   <!-- Calendar Area -->
<div class="calendar-container absolute top-11 right-0 p-5">
    <div class="bg-white dark:bg-[#202020] p-4 rounded-lg shadow-lg w-96 max-w-xs text-center mb-6">
        @php
            use Carbon\Carbon;
            $currentDate = Carbon::now();
            $currentMonth = $currentDate->format('F');
            $currentYear = $currentDate->format('Y');
            $firstDayOfMonth = $currentDate->copy()->startOfMonth();
            $lastDayOfMonth = $currentDate->copy()->endOfMonth();
            $firstDayOfWeek = $firstDayOfMonth->dayOfWeek;
        @endphp

        <!-- Month and Year Display -->
        <h2 class="text-2xl font-bold text-black dark:text-white mb-4">{{ $currentMonth }} {{ $currentYear }}</h2>
        
        <div class="grid grid-cols-7 text-center gap-1">
            <!-- Days of the Week -->
            <div class="font-bold text-black dark:text-white">Sun</div>
            <div class="font-bold text-black dark:text-white">Mon</div>
            <div class="font-bold text-black dark:text-white">Tue</div>
            <div class="font-bold text-black dark:text-white">Wed</div>
            <div class="font-bold text-black dark:text-white">Thu</div>
            <div class="font-bold text-black dark:text-white">Fri</div>
            <div class="font-bold text-black dark:text-white">Sat</div>
            
            <!-- Empty cells for days before the start of the month -->
            @for ($i = 0; $i < $firstDayOfWeek; $i++)
                <div class="py-2"></div>
            @endfor

            <!-- Days of the current month -->
            @for ($day = 1; $day <= $lastDayOfMonth->day; $day++)
                @php
                    $dayDate = Carbon::createFromDate($currentDate->year, $currentDate->month, $day);
                @endphp
                <div class="py-2 {{ $dayDate->isToday() ? 'bg-yellow-300 text-white rounded-full' : 'text-black dark:text-white' }}">
                    {{ $day }}
                </div>
            @endfor
        </div>
    </div>
</div>




    


        <div class="bg-white dark:bg-[#202020] p-2 rounded-lg shadow-lg mb-6 w-80 max-w-xs flex items-center space-x-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current text-black dark:text-white" viewBox="0 -960 960 960">
        <path d="M480.16-493q-72.62 0-122.39-50.27Q308-593.54 308-666q0-72.46 49.61-121.73Q407.22-837 479.84-837t122.89 49.16Q653-738.69 653-665.5q0 71.96-50.11 122.23Q552.78-493 480.16-493ZM138-130v-115.79q0-41.19 22.17-75.12Q182.34-354.83 220-372q62.2-27.9 127.78-44.95Q413.36-434 479.99-434q67.01 0 131.79 17.05Q676.56-399.9 739-372q37.91 15.25 60.95 50.3Q823-286.64 823-245.79V-130H138Zm342-454q33 0 57-24t24-57q0-33-23.8-57.5-23.79-24.5-57-24.5-33.2 0-57.2 24.68t-24 56.82q0 33.5 24 57.5t57 24Zm166 272v91h85v-21.51q0-15.42-9-28.96Q713-285 698-293q-12-7-25-11t-27-8Zm-252-23.32V-281h176v-53q-24-5.14-46-6.57-22-1.43-44-1.43t-43 1.52q-21 1.53-43 5.16ZM229-221h88v-96q-13.59 6.11-28.4 11.46-14.82 5.35-26.6 12.54-16 8-24.5 21.53-8.5 13.54-8.5 28.96V-221Zm417 0H317h329ZM480-665Z"/>
     </svg>
        <h2 class="text-2xl font-bold text-black dark:text-white">Total Employees: {{ $totalEmployees }}</h2>
        </div>


        <!-- Employee Cards Row -->
        <div class="flex justify-center items-center gap-6 w-full max-w-7xl text-black dark:text-white">
            <!-- Employee Card -->
            <div class="bg-card">
                <img src="#" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">John Doe</h3>
                <p>Position: Manager</p>
                <p>Department: HR</p>
            </div>

            <div class="bg-card">
                <img src="#" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Jane Smith</h3>
                <p>Position: Developer</p>
                <p>Department: IT</p>
            </div>

            <div class="bg-card">
                <img src="#" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Michael Brown</h3>
                <p>Position: Accountant</p>
                <p>Department: Finance</p>
            </div>

            <div class="bg-card">
                <img src="#" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Emily White</h3>
                <p>Position: Designer</p>
                <p>Department: Marketing</p>
            </div>
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
