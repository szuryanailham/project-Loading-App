<header class="bg-white shadow p-4 flex justify-between items-center">
    <!-- Title / Breadcrumb -->
    <div class="flex items-center gap-4">
        <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
        <!-- Optional: breadcrumb -->
        <nav class="text-gray-500 text-sm">
            <ol class="list-reset flex">
                <li><a href="" class="hover:text-amber-600">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li>@yield('title', 'Dashboard')</li>
            </ol>
        </nav>
    </div>

    <!-- User Info / Actions -->
    <div class="flex items-center gap-4 relative">
        <!-- Greeting + Icon -->
        <div class="flex items-center gap-2 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 014 14V6a4 4 0 014-4h8a4 4 0 014 4v8a4 4 0 01-1.121 3.804M12 14v6"/>
            </svg>
            <span>Hello, <strong></strong></span>
        </div>

        <!-- Logout / Dropdown -->
        <div class="relative">
            <button class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                Logout
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                </svg>
            </button>
            <!-- Optional: dropdown for more actions -->
            {{-- 
            <div class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden group-hover:block">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
            </div>
            --}}
        </div>
    </div>
</header>
