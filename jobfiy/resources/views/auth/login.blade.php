{{-- resources/views/auth/login.blade.php --}}
<x-layout>
  <x-slot name="heading">Login</x-slot>

  <section class="bg-gray-100 flex justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center">Login to Your Account</h2>

      {{-- Global Error (e.g., invalid credentials) --}}
      @if(session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm text-center">
          {{ session('error') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email -->
        <div>
          <label for="email" class="block mb-1 font-medium text-sm">Email</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autofocus
            class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block mb-1 font-medium text-sm">Password</label>
          <input 
            type="password" 
            id="password" 
            name="password" 
            required 
            class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
          @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
          <input 
            type="checkbox" 
            name="remember" 
            id="remember" 
            class="h-4 w-4 text-blue-600 border-gray-300 rounded"
          >
          <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
        </div>

        <!-- Submit Button -->
        <div>
          <button 
            type="submit" 
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
          >
            Login
          </button>
        </div>

        <!-- Register Link -->
        <p class="text-sm text-center mt-4 text-gray-600">
          Don't have an account? 
          <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
        </p>
      </form>
    </div>
  </section>
</x-layout>
