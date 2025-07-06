  <div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-lg">
      <!--handel the errors message-->
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
