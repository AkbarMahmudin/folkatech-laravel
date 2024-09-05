<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Companies List') }}
      </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="/companies/create" class="bg-gray-900/80 hover:bg-gray-900 p-3 rounded text-white">New</a>
      
      <div class="p-4 rounded shadow bg-white mt-8 overflow-auto">
        <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-600 mb-3">
          <thead class="text-xs text-gray-600 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3" scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3 text-center">Logo</th>
              <th scope="col" class="px-6 py-3 text-center">Actions</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach ($companies as $company)
              <tr class="bg-white border-b">
                <td class="px-6 py-4">{{ $company->name }}</td>
                <td class="px-6 py-4">{{ $company->email }}</td>
                <td class="px-6 py-4">
                  @if ($company->logo)
                      @if (Str::startsWith($company->logo, 'http') || Str::startsWith($company->logo, 'https'))
                          <!-- Jika logo adalah URL eksternal -->
                          <img src="{{ $company->logo }}" alt="Logo" class="h-10 w-10 object-contain rounded-full mx-auto">
                      @else
                          <!-- Jika logo adalah path lokal -->
                          <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="h-10 w-10 object-contain rounded-full mx-auto">
                      @endif
                  @else
                      <p>No logo available</p>
                  @endif
                </td>
                <td class="flex gap-2 px-6 py-4 justify-center">
                  <a href="{{ $company->website }}" target="_blank" class="p-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                  </a>
                  <div class="grid grid-cols-2 gap-2 h-full">
                    <a href="/companies/{{ $company->id }}/edit" class="bg-gray-900/80 hover:bg-gray-900 p-2 rounded text-white text-center">
                      Edit
                    </a>
                    <form action="companies/{{ $company->id }}" method="POST" class="inline text-center w-full">
                      @csrf
                      @method('DELETE')
                      <button class="bg-red-500/80 hover:bg-red-500 p-2 rounded text-white w-full">Delete</button>
                    </form>
                  </td>
                  </div>
              </tr>
            @endforeach
          </tbody>
        </table>
    
        {{ $companies->links() }}
      </div>
    </div>
  </div>
</x-app-layout>