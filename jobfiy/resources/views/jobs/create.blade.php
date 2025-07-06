<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Job</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

  <x-layout>
    <x-slot:heading>
      <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Add New Job</h1>
        <a href="/jobs" class="text-sm text-blue-600 hover:underline">← Back to Jobs</a>
      </div>
    </x-slot:heading>

    <!-- ✅ missing container added back -->
    <div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-lg">

      <form method="POST" action="/jobs" class="space-y-6">
        @csrf

        <x-form-errors />

        <!-- Title -->
        <div>
          <x-form-label for="title">Title</x-form-label>
          <input 
            type="text" 
            id="title" 
            name="title" 
            value="{{ old('title') }}"
            required 
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="worker">
        </div>

        <!-- Salary -->
        <div>
          <x-form-label for="salary">Salary</x-form-label>
          <input 
            type="text" 
            id="salary"
            name="salary" 
            value="{{ old('salary') }}"
            required 
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="$1000">
        </div>

        <!-- Employer Name -->
        <div>
          <x-form-label for="employer_name">Employer name</x-form-label>
          <input 
            type="text" 
            id="employer_name"
            name="employer_name"
            value="{{ old('employer_name') }}"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Employer name">
        </div>

        <!-- Email -->
<div>
  <x-form-label for="email">Email</x-form-label>
  <input 
    type="email" 
    id="email" 
    name="email" 
    value="{{ old('email') }}"
    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
    placeholder="company@example.com"
  >
</div>

<!-- Phone -->
<div>
  <x-form-label for="phone">Phone</x-form-label>
  <input 
    type="text" 
    id="phone" 
    name="phone" 
    value="{{ old('phone') }}"
    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
    placeholder="+20 123 456 7890"
  >
</div>

<!-- Address -->
<div>
  <x-form-label for="address">Address</x-form-label>
  <input 
    type="text" 
    id="address" 
    name="address" 
    value="{{ old('address') }}"
    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
    placeholder="123 Street, City"
  >
</div>

<!-- Country -->
<div>
  <x-form-label for="country">Country</x-form-label>
  <input 
    type="text" 
    id="country" 
    name="country" 
    value="{{ old('country') }}"
    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
    placeholder="Egypt"
  >
</div>

<!-- Remote Option -->
<div>
  <x-form-label for="is_remote">Remote Option</x-form-label>
  <div class="flex items-center space-x-2 mt-1">
    <input 
      type="checkbox" 
      id="is_remote" 
      name="is_remote" 
      value="1" 
      {{ old('is_remote') ? 'checked' : '' }}
      class="form-checkbox text-blue-600"
    >
    <label for="is_remote" class="text-sm text-gray-700">Remote Job?</label>
  </div>
</div>

<!-- Description -->
<div>
  <x-form-label for="description">Job Description</x-form-label>
  <textarea 
    id="description" 
    name="description" 
    rows="4"
    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
  >{{ old('description') }}</textarea>
</div>
        <!-- Submit Button -->
        <div class="text-right">
          <button 
            type="submit" 
            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition"
          >
             + Add Job
          </button>
        </div>
      </form>
    </div> <!-- ✅ container div closed here -->
  </x-layout>

</body>
</html>
