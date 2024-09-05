<nav class="w-full bg-white shadow h h-full p-6 border-b-gray-300 border-b">
    <ul class="flex items-center justify-evenly w-1/2 mx-auto">
        <li><a href="/" class="{{ request()->is('/') ? 'text-yellow-800 font-semibold' : 'text-black' }}">Home</a></li>
        <li><a href="/companies" class="{{ request()->is('companies') ? 'text-yellow-800 font-semibold' : 'text-black' }}">Company</a></li>
        <li><a href="/employees" class="{{ request()->is('employees') ? 'text-yellow-800 font-semibold' : 'text-black' }}">Employee</a></li>
    </ul>
</nav>