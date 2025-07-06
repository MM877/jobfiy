<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jobify - {{ $heading ?? 'Welcome' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full font-sans text-gray-900 bg-gray-100">
  <div class="min-h-full">

    <!-- Navigation -->
    <nav class="bg-gray-900 shadow-md">
      <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-28">

          <!-- Logo -->
          <a href="{{ route('about') }}" class="flex items-center gap-4">
            <div class="bg-white p-3 rounded-full shadow-lg">
              <img 
                src="{{ asset('images/jobify-logo.png') }}" 
                alt="Jobify Logo" 
                class="h-20 w-20 object-contain"
              />
            </div>
            <span class="text-white text-2xl font-extrabold tracking-wide">Jobify</span>
          </a>

          <!-- Navigation Links -->
          <div class="hidden md:flex gap-6 items-center">
            @php
              $navLinks = [
                ['title' => 'About', 'route' => 'about'],
                ['title' => 'Contact', 'route' => 'contact'],
                ['title' => 'Jobs', 'route' => 'jobs.index'],
              ];
            @endphp

            @foreach ($navLinks as $link)
              <a 
                href="{{ route($link['route']) }}"
                @class([
                  'bg-blue-600 text-white px-4 py-2 rounded-md shadow font-medium transition hover:bg-blue-700' => Route::is($link['route']),
                  'text-white hover:bg-gray-800 px-4 py-2 rounded-md font-medium transition' => !Route::is($link['route']),
                ])
              >
                {{ $link['title'] }}
              </a>
            @endforeach
          </div>

          <!-- Auth Buttons -->
          <div class="hidden md:flex items-center gap-4">
            @guest
              <x-button href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-button>
              <x-button href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-button>
            @endguest

            @auth

           <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button 
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md shadow font-medium hover:bg-blue-700 transition"
              >
                Logout
              </button>
            </form>



              <div class="flex items-center gap-3">
                <img 
                  src="{{ asset('images/default-avatar.png') }}" 
                  alt="Profile" 
                  class="h-10 w-10 rounded-full border-2 border-white object-cover"
                />

                
              </div>
            @endauth
          </div>

          <!-- Mobile Hamburger (optional behavior not implemented) -->
          <div class="md:hidden">
            <button class="text-white hover:text-gray-300 focus:outline-none">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>

        </div>
      </div>
    </nav>

    <!-- Page Heading -->
    @isset($heading)
    <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto py-6 px-6 text-center">
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">{{ $heading }}</h1>
      </div>
    </header>
    @endisset

    <!-- Main Content -->
    <main>
      <div class="max-w-7xl mx-auto py-6 px-6">
        {{ $slot }}
      </div>
    </main>

  </div>
</body>
</html>
