<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Company') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
      <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">

        @if ($errors->any())
          <div class="bg-red-600/80 p-2 rounded border-2 border-red-900/80 text-white">
            <ul class="list-disc list-inside">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2 w-full">
          <label for="name" class="font-medium">Name</label>
          <input name="name" type="text" class="p-2 border-2 border-gray-200/80 rounded" value="{{ $company->name }}">
        </div>

        <div class="flex flex-col gap-2 w-full">
          <label for="email" class="font-medium">Email</label>
          <input name="email" type="email" class="p-2 border-2 border-gray-200/80 rounded" value="{{ $company->email }}">
        </div>

        <div class="flex flex-col gap-2 w-full">
          <label for="logo" class="font-medium">Logo</label>
          <input name="logo" type="file" accept="image/*" class="p-2 border-2 border-gray-200/80 rounded" value="{{ $company->logo }}">
          @if ($company->logo)
            @if (Str::startsWith($company->logo, 'http') || Str::startsWith($company->logo, 'https'))
              <!-- Jika logo adalah URL eksternal -->
              <img src="{{ $company->logo }}" alt="Logo" class="w-full object-contain max-h-28 rounded border border-gray-200/80 border-dashed p-2">
            @else
              <!-- Jika logo adalah path lokal -->
              <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="w-full object-contain max-h-28 rounded border border-gray-200/80 border-dashed p-2">
            @endif
          @else
            <p>No logo available</p>
          @endif
        </div>

        <div class="flex flex-col gap-2 w-full">
          <label for="website" class="font-medium">Website</label>
          <input name="website" type="url" class="p-2 border-2 border-gray-200/80 rounded" value="{{ $company->website }}">
        </div>

        <div class="grid grid-cols-2 gap-2 mt-4 w-full">
          <a href="/companies" class="p-2 bg-white border-2 border-gray-600/20 text-gray-600 text-center rounded hover:bg-white/80">Cancel</a>
          <button class="p-2 bg-gray-900/80 text-white rounded hover:bg-gray-900" type="submit">Save</button>
        </div>
      </form>

    </div>
  </div>
</x-app-layout>