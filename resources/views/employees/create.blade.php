<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create New Employee') }}
      </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <form action="{{ route('employees.store') }}" method="POST" class="flex flex-col gap-2">
  
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
        <div class="flex flex-col gap-2 w-full">
          <label for="firstname" class="font-medium">Firstname</label>
          <input name="firstname" type="text" class="p-2 border-2 border-gray-200/80 rounded">
        </div>
  
        <div class="flex flex-col gap-2 w-full">
          <label for="lastname" class="font-medium">Lastname</label>
          <input name="lastname" type="text" class="p-2 border-2 border-gray-200/80 rounded">
        </div>
  
        <div class="flex flex-col gap-2 w-full">
          <label for="email" class="font-medium">Email</label>
          <input name="email" type="email" class="p-2 border-2 border-gray-200/80 rounded">
        </div>
  
        <div class="flex flex-col gap-2 w-full">
          <label for="phone" class="font-medium">Phone</label>
          <input name="phone" type="tel" class="p-2 border-2 border-gray-200/80 rounded">
        </div>
  
        <div class="flex flex-col gap-2 w-full">
          <label for="" class="font-medium">Company</label>
          <select name="company_id" id="" class="p-2 border-2 border-gray-200/80 rounded">
            <option value="">Select Company</option>
            @foreach ($companies as $company)
              <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
          </select>
        </div>
  
        <div class="grid grid-cols-2 gap-2 mt-4 w-full">
          <a href="/companies" class="p-2 bg-white border-2 border-gray-600/20 text-gray-600 text-center rounded hover:bg-white/80">Cancel</a>
          <button class="p-2 bg-gray-900/80 text-white rounded hover:bg-gray-900" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>