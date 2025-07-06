<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jobs</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-image: url('/storage/wallpaper-code-tools.png');
      background-size: cover;
      background-repeat: no-repeat;
      opacity: 0.08;
      z-index: -1;
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-900 font-sans min-h-screen relative">
  <x-layout>
    
    <x-slot:heading>
  <div class="flex items-center justify-between">
    <!-- Logo (Replaced with Label) -->
    <h1 class="text-4xl font-extrabold text-blue-800 tracking-wide">Jobify</h1>

    <!-- Add Job Button -->
<x-button href="/jobs/create">+ Add Job</x-button>


  </div>
</x-slot:heading>


    <div class="max-w-4xl mx-auto mt-6 px-4">
      <!-- Search Bar -->
      <form method="GET" action="/jobs" class="flex gap-2 mb-6">
        <input 
          type="text" 
          name="search" 
          placeholder="Search jobs..." 
          value="{{ request('search') }}"
          class="flex-1 px-4 py-2 border rounded-md"
        />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
          Search
        </button>
      </form>

      <!-- Job Cards -->
      <ul class="space-y-5">
        @foreach($jobs as $job)
          <li class="bg-white bg-opacity-90 p-5 rounded-lg shadow-md border hover:shadow-lg transition">
            <a href="/jobs/{{ $job->id }}" class="block">

              <!-- Title and Employer Row -->
              <div class="flex justify-between items-center">
                <!-- Job Title -->
                <h2 class="text-2xl font-bold text-blue-800">{{ $job->title }}</h2>

                <!-- Employer and Job Type -->
                <div class="text-right">
                  <p class="text-sm text-gray-600">
                    👔 <span class="font-semibold">Employer:</span> 
                    {{ $job->employer ? $job->employer->employer_name : $job->employer_name }}
                  </p>
                  <p class="text-sm text-gray-600 mt-1">
                    🌐 <span class="font-semibold">Type:</span> 
                    {{ $job->is_remote ? 'Remote' : 'On-site' }}
                  </p>
                </div>
              </div>

              <!-- Salary -->
              <div class="mt-3 text-gray-700">
                💰 <span class="font-semibold">Salary:</span> {{ $job->salary }}
              </div>

                      <!-- Posted Time -->
          <div class="text-sm text-gray-500 mt-2">
            🕒 Posted {{ $job->created_at->diffForHumans() }}
          </div>
          
            </a>
          </li>
        @endforeach
      </ul>

      <!-- Pagination -->
      <div class="w-full flex justify-end px-2 mt-8 text-sm">
        {{ $jobs->links() }}
      </div>
    </div>
  </x-layout>
</body>
</html>
