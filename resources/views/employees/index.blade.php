<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Employees List') }}
      </h2>
  </x-slot>
  <div class="py-12">
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="/employees/create" class="bg-gray-900/80 hover:bg-gray-900 p-3 rounded text-white">New</a>
      <div class="p-4 rounded shadow bg-white mt-8 overflow-auto">
        <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-600 mb-3">
          <thead class="text-xs text-gray-600 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Firstname</th>
              <th scope="col" class="px-6 py-3">Lastname</th>
              <th scope="col" class="px-6 py-3">Company</th>
              <th scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3 text-center">Phone</th>
              <th scope="col" class="px-6 py-3 text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $employee)
              <tr class="bg-white border-b">
                <td class="px-6 py-4">{{ $employee->firstname }}</td>
                <td class="px-6 py-4">{{ $employee->lastname }}</td>
                <td class="px-6 py-4">{{ $employee->company->name }}</td>
                <td class="px-6 py-4">{{ $employee->email }}</td>
                <td class="px-6 py-4">{{ $employee->phone }}</td>
                <td class="grid grid-cols-2 gap-2 px-6 py-4 justify-center">
                  <a href="/employees/{{ $employee->id }}/edit" class="bg-gray-900/80 hover:bg-gray-900 p-2 rounded text-white text-center">
                    Edit
                  </a>
                  <form action="employees/{{ $employee->id }}" method="POST" class="inline text-center w-full">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500/80 hover:bg-red-500 p-2 rounded text-white w-full">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    
        {{ $employees->links() }}
      </div>
    </div>
  </div>
</x-app-layout>