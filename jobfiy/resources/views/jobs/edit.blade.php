<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Job</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

  <x-layout>
    <x-slot:heading>
      <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Edit Job</h1>
        <a href="/jobs" class="text-sm text-blue-600 hover:underline">← Back to Jobs</a>
      </div>
    </x-slot:heading>

    <div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-lg">
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="/jobs/{{ $job->id }}" class="space-y-6">
        @csrf
        @method('PUT') <!-- Important for updating -->

        <!-- Title -->
        <div>
          <label for="title" class="block font-medium text-gray-700 mb-1">Job Title</label>
          <input 
            type="text" 
            id="title" 
            name="title" 
            value="{{ old('title', $job->title) }}"
            required 
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>

        <!-- Salary -->
        <div>
          <label for="salary" class="block font-medium text-gray-700 mb-1">Salary</label>
          <input 
            type="text" 
            id="salary" 
            name="salary" 
            value="{{ old('salary', $job->salary) }}"
            required 
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>

        <!-- Submit Button -->
        <div class="text-right">
          <div class="flex justify-end gap-3">
  <!-- Cancel -->
  <a 
    href="/jobs" 
    class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400 transition"
  >
    Cancel
  </a>

  <!-- Update -->
  <button 
    type="submit" 
    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition"
  >
    Update Job
  </button>

  <!-- Delete -->
 <form method="POST" action="/jobs/{{ $job->id }}">
  @csrf
  @method('DELETE')
  <button 
    type="submit" 
    onclick="return confirm('Are you sure you want to delete this job?');"
    class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition"
  >
    Delete
  </button>
</form>

</div>

        </div>

                <!-- Cancel Button -->
        

      </form>
    </div>
  </x-layout>

</body>
</html>

