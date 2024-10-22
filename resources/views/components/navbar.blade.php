<!-- Navbar -->
<nav class="navbar">
    <div class="flex items-center">
        <!-- Placeholder for any content in the left of the navbar -->
    </div>

    <!-- Title -->
    <h1 class="text-2xl flex-grow text-center">Human Resources Information System</h1>

    <!-- Right-side elements -->
    <div class="flex items-center space-x-4">
        
        <!-- Time display inside a Material Icon -->
        <div class="flex items-center space-x-2">
            <div class="flex items-center space-x-1">
                <span class="material-icons">access_time</span>
                <span id="time" class="text-lg font-bold"></span>
            </div>
            
            <!-- Theme toggle button -->
            <button id="theme-toggle" class="material-icons cursor-pointer focus:outline-none ml-4">brightness_6</button>
            
            <!-- Profile and admin section -->
            <div class="relative inline-flex items-center ml-4">
                <button class="material-icons cursor-pointer" id="profileIcon">account_circle</button>
                <span class="text-xs text-center cursor-pointer mb-0" id="adminText">Admin</span>
                
                <!-- Dropdown -->
                <div id="dropdown" class="hidden absolute left-0 top-full mt-1 text-white rounded px-2 py-1 shadow-lg z-10">
                    <ul class="list-none p-0 m-0">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center justify-between w-full text-left btn-logout px-2 py-1 text-xs">
                                    <span class="mr-2 whitespace-nowrap">Log Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</nav>
