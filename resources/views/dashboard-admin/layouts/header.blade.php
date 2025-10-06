<header class="bg-white shadow p-4 flex flex-wrap justify-between items-center gap-4">
    <!-- Title / Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 w-full sm:w-auto">
        <!-- Title -->
        <h1 class="text-lg sm:text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>

        <!-- Breadcrumb (disembunyikan di layar kecil) -->
        <nav class="text-gray-500 text-sm hidden sm:block">
            <ol class="list-reset flex flex-wrap items-center">
                <li><a href="#" class="hover:text-amber-600">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="truncate max-w-[120px] sm:max-w-none">@yield('title', 'Dashboard')</li>
            </ol>
        </nav>
    </div>

    <!-- User Info / Actions -->
    <div class="flex items-center gap-3 sm:gap-4 w-full sm:w-auto justify-between sm:justify-end">
        <!-- Greeting -->
        <div class="flex items-center gap-2 text-gray-600 text-sm sm:text-base">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 014 14V6a4 4 0 014-4h8a4 4 0 014 4v8a4 4 0 01-1.121 3.804M12 14v6"/>
            </svg>
            <span class="truncate max-w-[100px] sm:max-w-none">
                Hello, <strong>{{ Auth::user()->name ?? 'User' }}</strong>
            </span>
        </div>

        <!-- Logout Button -->
        <form action="" method="POST" class="shrink-0">
            @csrf
            <button 
                type="submit" 
                class="flex items-center gap-2 px-3 sm:px-4 py-2 bg-red-500 text-white text-sm sm:text-base rounded hover:bg-red-600 transition whitespace-nowrap">
                Logout
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                </svg>
            </button>
        </form>
    </div>
</header>
