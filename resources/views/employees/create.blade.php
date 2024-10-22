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

</main>

@vite('resources/js/app.js')
</body>
</html>
