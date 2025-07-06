<x-layout>
  <x-slot name="heading">Register</x-slot>

  <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
      @csrf

      <!-- First Name -->
      <div>
        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required
          class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
        @error('first_name')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Last Name -->
      <div>
        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
          class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
        @error('last_name')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required
          class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
        @error('email')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
              @error('password')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          <p class="text-gray-500 text-xs mt-1">Password must be at least 8 characters and contain at least one special character (!@#$%^&* etc).</p>
        @enderror

      </div>

      <!-- Confirm Password -->
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
          class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md font-semibold hover:bg-blue-700 transition">
        Register
      </button>

      <!-- Login Link -->
      <p class="text-sm text-center mt-2">
        Already have an account?
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
      </p>
    </form>
  </div>
</x-layout>
