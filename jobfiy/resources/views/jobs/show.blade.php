<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $job->title }} - Job Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans min-h-screen">
  <x-layout>
    <x-slot:heading>
      {{ $job->title }}
    </x-slot:heading>

    <div class="max-w-4xl mx-auto mt-12 bg-white shadow-xl rounded-xl p-8 border border-gray-300 space-y-6">

      <h2 class="text-3xl font-bold text-gray-800 mb-4">💼 {{ $job->title }}</h2>

      <!-- Job Info Section -->
      <div class="space-y-4 text-lg text-gray-700">

        <p class="flex items-center gap-2">
          💰 <span class="font-semibold text-gray-800">Salary:</span> {{ $job->salary }}
        </p>

        <p class="flex items-center gap-2">
          🕒 <span class="font-semibold text-gray-800">Type:</span> Full-time
        </p>

        @if ($job->is_remote)
          <p class="flex items-center gap-2">
            🏠 <span class="font-semibold text-gray-800">Location:</span> Remote
          </p>
        @endif

        @if ($job->description)
          <p class="flex items-start gap-2">
            📝 <span class="font-semibold text-gray-800">Description:</span>
            <span class="text-gray-600">{{ $job->description }}</span>
          </p>
        @endif

        @if ($job->email)
          <p class="flex items-center gap-2">
            📧 <span class="font-semibold text-gray-800">Email:</span> {{ $job->email }}
          </p>
        @endif

        @if ($job->phone)
          <p class="flex items-center gap-2">
            📞 <span class="font-semibold text-gray-800">Phone:</span> {{ $job->phone }}
          </p>
        @endif

        @if ($job->address)
          <p class="flex items-center gap-2">
            📍 <span class="font-semibold text-gray-800">Address:</span> {{ $job->address }}
          </p>
        @endif

        @if ($job->country)
          <p class="flex items-center gap-2">
            🌍 <span class="font-semibold text-gray-800">Country:</span> {{ $job->country }}
          </p>
        @endif

        <p class="flex items-center gap-2">
          🏢 <span class="font-semibold text-gray-800">Employer:</span> {{ $employer ? $employer->employer_name : $job->employer_name }}
        </p>
      </div>

     
      <!-- Buttons -->
      <div class="flex justify-between items-center mt-8">
        <a href="/jobs" class="bg-rose-600 text-white px-6 py-2 rounded-md hover:bg-rose-700 transition">
          ← Back to Jobs
        </a>

        @can('update', $job)
            <x-button href="/jobs/{{ $job->id }}/edit">
              ✏️ Edit
            </x-button>
        @endcan
         
      </div>
    </div>
  </x-layout>
</body>
</html>
