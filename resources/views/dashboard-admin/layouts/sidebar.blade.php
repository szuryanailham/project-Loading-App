<aside class="w-64 bg-white shadow-lg h-screen p-6 flex flex-col">
    <!-- Logo / Title -->
    <div class="flex items-center justify-center mb-8">
        <img src="/images/logo.png" alt="Logo" class="h-12 w-15 mr-2">
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-2">
        <a href="" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('dashboard') ? 'bg-amber-200' : '' }}">
            <!-- Dashboard Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h6v6H3V3zM3 15h6v6H3v-6zM15 3h6v6h-6V3zM15 15h6v6h-6v-6z"/>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('users.*') ? 'bg-amber-200' : '' }}">
            <!-- Users Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a4 4 0 00-3-3.87M9 20H4v-1a4 4 0 013-3.87m4-12a4 4 0 110 8 4 4 0 010-8z"/>
            </svg>
            <span class="font-medium">Users</span>
        </a>

        <a href="/admin/dashboard/events" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('events.*') ? 'bg-amber-200' : '' }}">
            <!-- Events Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3M16 7V3M3 11h18M5 11v10h14V11H5z"/>
            </svg>
            <span class="font-medium">Events</span>
        </a>

        <a href="/admin/dashboard/registration" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('registrations.*') ? 'bg-amber-200' : '' }}">
            <!-- Registrations Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 014-4h4M3 7h18M5 7v10h14V7H5z"/>
            </svg>
            <span class="font-medium">Registrations</span>
        </a>
    </nav>

    <!-- Footer / Info -->
    <div class="mt-auto text-center text-gray-500 text-sm">
        &copy; 2025 Loading Inisght Process
    </div>
</aside>
