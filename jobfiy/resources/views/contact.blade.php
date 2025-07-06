{{-- resources/views/contact.blade.php --}}
<x-layout>
  <x-slot name="heading">Contact</x-slot>

  <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">

      <!-- Profile Section -->
      <div class="text-center mb-12">
        <div class="flex justify-center mb-4">
          <img 
            src="{{ asset('images/memo.jpg') }}" 
            alt="Mohamed Ayman" 
            class="h-36 w-36 rounded-full object-cover border-4 border-blue-600 shadow-md"
          />
        </div>
        <h1 class="text-3xl font-bold text-gray-900">Mohamed Ayman</h1>
        <p class="text-base text-gray-500 mt-1">Full Stack Software Engineer</p>
      </div>

      <!-- Contact Details -->
      <div class="grid gap-6 sm:grid-cols-2 text-left max-w-2xl mx-auto mb-16">
        <!-- Email -->
        <div class="flex items-start gap-3">
          <x-icon name="mail" class="text-blue-600 h-5 w-5 mt-0.5" />
          <div>
            <h3 class="text-sm font-medium text-gray-600">Email</h3>
            <p class="text-gray-900 text-sm">mohamedayman3873@gmail.com</p>
          </div>
        </div>

        <!-- Phone -->
        <div class="flex items-start gap-3">
          <x-icon name="phone" class="text-blue-600 h-5 w-5 mt-0.5" />
          <div>
            <h3 class="text-sm font-medium text-gray-600">Phone</h3>
            <p class="text-gray-900 text-sm">+20 115 750 9803</p>
          </div>
        </div>

        <!-- Location -->
        <div class="flex items-start gap-3">
          <x-icon name="map-pin" class="text-blue-600 h-5 w-5 mt-0.5" />
          <div>
            <h3 class="text-sm font-medium text-gray-600">Location</h3>
            <p class="text-gray-900 text-sm">New Damietta, Egypt</p>
          </div>
        </div>

        <!-- Website -->
        <div class="flex items-start gap-3">
          <x-icon name="globe" class="text-blue-600 h-5 w-5 mt-0.5" />
          <div>
            <h3 class="text-sm font-medium text-gray-600">Website</h3>
            <a href="https://yourportfolio.com" target="_blank" class="text-blue-600 hover:underline text-sm">
              yourportfolio.com
            </a>
          </div>
        </div>
      </div>

      <!-- Success Message -->
      @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6 text-sm">
          {{ session('success') }}
        </div>
      @endif

      <!-- Contact Form Header -->
      <div class="text-center mb-10">
        <h2 class="text-2xl font-semibold text-gray-800">Get in Touch</h2>
        <p class="mt-2 text-gray-500 text-base">Send me a message and I’ll respond shortly.</p>
      </div>

      <!-- Contact Form -->
      <form 
        action="{{ route('contact.submit') }}" 
        method="POST" 
        class="bg-gray-50 p-6 rounded-lg shadow-md space-y-6"
      >
        @csrf

        <!-- Name -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input 
            type="text" 
            name="name" 
            id="name" 
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm"
            value="{{ old('name') }}" 
            required
          >
          @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input 
            type="email" 
            name="email" 
            id="email" 
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm"
            value="{{ old('email') }}" 
            required
          >
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Message -->
        <div>
          <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
          <textarea 
            name="message" 
            id="message" 
            rows="5" 
            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm"
            required
          >{{ old('message') }}</textarea>
          @error('message')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Submit -->
        <div class="text-center">
          <button 
            type="submit" 
            class="bg-blue-600 text-white px-6 py-2 rounded-md font-semibold hover:bg-blue-700 transition text-sm"
          >
            Send Message
          </button>
        </div>
      </form>
    </div>
  </section>
</x-layout>
