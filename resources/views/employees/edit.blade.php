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
