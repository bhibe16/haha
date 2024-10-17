<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css') <!-- Include your CSS -->
</head>
<body>
  <div class="bg-pic flex justify-center items-center h-screen">
    <!-- Left: Image -->
<div class="w-1/2 h-screen hidden lg:block">
  <img src="{{ asset('images/haha.png') }}" alt="Placeholder Image" class="object-cover w-full h-full">
</div>
<!-- Right: Login Form -->
<div class= "lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
    <h2 class="text-3xl mb-6 font-bold text-black">Login</h2>
    <form method="POST" action="{{ route('login.submit') }}">
  @csrf
    <!-- Username Input -->
    <div class="mb-4">
        <label for="email" class="block text-black font-semibold">Email:</label>
        <input type="email" name="email" id="email" class="border w-full p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
    </div>
    <!-- Password Input -->
    <div class="mb-4">
        <label for="password" class="block text-black font-semibold">Password:</label>
        <input type="password" name="password" id="password" class="border w-full p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
    </div>
    <!-- Remember Me Checkbox -->
    <div class="mb-4 flex items-center">
      <input type="checkbox" id="remember" name="remember" class="text-red-500">
      <label for="remember" class="text-green-900 ml-2">Remember Me</label>
    </div>
    <!-- Forgot Password Link -->
    <div class="mb-6 text-blue-500">
      <a href="#" class="hover:underline">Forgot Password?</a>
    </div>
    <!-- Login Button -->
    <button type="submit" class="bg-black text-yellow-500 w-full p-3 rounded-lg font-bold hover:bg-yellow-600 hover:text-black transition duration-300">Login</button>
  </form>
  <!-- Sign up  Link -->
  <div class="mt-6 text-green-500 text-center">
    <a href="#" class="hover:underline">Sign up Here</a>
  </div>
</div>
</div>
@if ($errors->any())
            <div class="mt-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>


