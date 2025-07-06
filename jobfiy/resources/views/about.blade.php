<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Jobify</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans leading-relaxed min-h-screen">

  <x-layout>
    <x-slot:heading>
      <div class="text-center mt-8">
        <h1 class="text-4xl font-extrabold text-blue-800 mb-2">Welcome to Jobify</h1>
        <p class="text-lg text-gray-600">A modern platform for hiring and getting hired</p>
      </div>
    </x-slot:heading>

    <main class="max-w-4xl mx-auto mt-10 px-6 py-8 bg-white rounded-xl shadow-md border border-gray-200">
      <section class="space-y-6 text-gray-800 text-lg">
        <p>
          <strong class="text-blue-700">Jobify</strong> is your ultimate career companion — built to simplify the process of connecting job seekers with the right opportunities and helping employers find the perfect match for their team.
        </p>

        <p>
          Whether you're searching for your dream job or looking to hire top talent, Jobify makes it easy, fast, and effective. Our features include intuitive job listings, smart search and filtering, detailed job descriptions, and seamless employer access.
        </p>

        <p>
          Designed with simplicity and power in mind, Jobify makes job exploration easy while giving employers the tools they need to build high-performing teams.
        </p>

        <p>
          We're not just another job board — <span class="text-blue-700 font-semibold">we’re a professional bridge</span> between ambition and opportunity.
        </p>
      </section>

      <div class="text-center mt-10">
        <a 
          href="/jobs"
          class="inline-block bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-lg font-semibold text-lg transition shadow-md"
        >
          Browse Jobs →
        </a>
      </div>
    </main>
  </x-layout>

</body>
</html>
