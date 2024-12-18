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

 @include('components.navbar')

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

@include('components.sidebar')

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
                <h3 class="font-bold">Romeo Stotomas</h3>
                <p>Position: Manager</p>
                <p>Department: HR</p>
            </div>

            <div class="bg-card">
                <img src="/images/3.jpg" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Jay Ar Dolfo</h3>
                <p>Position: Developer</p>
                <p>Department: IT</p>
            </div>

            <div class="bg-card">
                <img src="/images/2.jpeg" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Jonathan Alarcon</h3>
                <p>Position: Accountant</p>
                <p>Department: Finance</p>
            </div>

            <div class="bg-card">
                <img src="/images/1.jpg" alt="Profile Image" class="rounded-full w-24 h-24 mb-4">
                <h3 class="font-bold">Justine Shane Luza</h3>
                <p>Position: Designer</p>
                <p>Department: Marketing</p>
            </div>
</div>
<div class="w-full text-center bg-cover bg-center rounded-xl" style="background-image: url('/images/bg.webp');">
    <h3 class="text-3xl font-bold text-black dark:text-white mt-12">About the System</h3>
    <p class="mt-4 text-lg text-gray-700 dark:text-white text-center">
        The Human Resources Information System (HRIS) is designed to centralize employee records, manage human resource activities, 
        and improve workflows using modern CI/CD and DevOps practices. It aims to streamline HR tasks, enhance security for sensitive documents, 
        and ensure data integrity through automated processes.
    </p>
    <p class="mt-4 text-lg text-gray-700 dark:text-white text-center">
        In addition to these core functionalities, the HRIS provides a user-friendly interface that enables HR personnel to easily navigate 
        through employee data, generate reports, and manage payroll processes efficiently. The system is equipped with robust security 
        measures to protect sensitive information, ensuring compliance with data protection regulations.
    </p>
    <p class="mt-4 text-lg text-gray-700 dark:text-white text-center">
        Moreover, the integration of CI/CD practices allows for continuous improvements and updates, making the HRIS adaptable to changing 
        organizational needs. With features like automated alerts for important dates and a centralized document management system, 
        the HRIS enhances overall productivity and collaboration among teams.
    </p>
</div>
</main>

    
    @vite('resources/js/app.js')

</body>
</html>
