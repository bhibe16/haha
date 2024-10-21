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
                <img src="/images/4.jpg" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">John Doe</h3>
                <p>Position: Manager</p>
                <p>Department: HR</p>
            </div>

            <div class="bg-card">
                <img src="/images/3.jpg" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Jane Smith</h3>
                <p>Position: Developer</p>
                <p>Department: IT</p>
            </div>

            <div class="bg-card">
                <img src="/images/2.jpeg" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Michael Brown</h3>
                <p>Position: Accountant</p>
                <p>Department: Finance</p>
            </div>

            <div class="bg-card">
                <img src="/images/1.jpg" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Emily White</h3>
                <p>Position: Designer</p>
                <p>Department: Marketing</p>
            </div>
</div>
<div class="w-full text-center bg-cover bg-center rounded-xl" style="background-image: url('/images/bg.webp');">
    <h3 class="text-3xl font-bold text-black dark:text-white mt-12">About the System</h3>
    <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 text-justify">
        The Human Resources Information System (HRIS) is designed to centralize employee records, manage human resource activities, 
        and improve workflows using modern CI/CD and DevOps practices. It aims to streamline HR tasks, enhance security for sensitive documents, 
        and ensure data integrity through automated processes.
    </p>
    <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 text-justify">
        In addition to these core functionalities, the HRIS provides a user-friendly interface that enables HR personnel to easily navigate 
        through employee data, generate reports, and manage payroll processes efficiently. The system is equipped with robust security 
        measures to protect sensitive information, ensuring compliance with data protection regulations.
    </p>
    <p class="mt-4 text-lg text-gray-700 dark:text-gray-300 text-justify">
        Moreover, the integration of CI/CD practices allows for continuous improvements and updates, making the HRIS adaptable to changing 
        organizational needs. With features like automated alerts for important dates and a centralized document management system, 
        the HRIS enhances overall productivity and collaboration among teams.
    </p>
</div>
</main>

    
    @vite('resources/js/app.js')
    <script>
    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const hamburgerIcon = document.getElementById('hamburgerIcon');
    const closeIcon = document.getElementById('closeIcon');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('-translate-x-full');

        // Toggle between icons
        if (sidebar.classList.contains('hidden')) {
            closeIcon.classList.add('hidden');
            hamburgerIcon.classList.remove('hidden');
        } else {
            hamburgerIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        }
    });
        // Function to update time inside the icon
        function updateTime() {
            const timeElement = document.getElementById('time');
            const currentTime = new Date().toLocaleTimeString();
            timeElement.textContent = currentTime;
        }

        // Update the time every second
        setInterval(updateTime, 1000);
        updateTime(); // Call it initially to avoid delay


        
        document.getElementById('adminText').addEventListener('click', function () {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    });
    </script>
</body>
</html>