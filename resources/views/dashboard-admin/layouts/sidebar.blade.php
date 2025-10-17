<!-- Tombol toggle sidebar (muncul hanya di mobile) -->
<button id="sidebarToggle" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-amber-500 text-white rounded-md shadow-md focus:outline-none">
    <!-- Icon menu -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
</button>

<!-- Sidebar -->
<aside id="sidebar" 
    class="fixed lg:static inset-y-0 left-0 w-64 bg-white shadow-lg h-full p-6 flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">

    <!-- Logo -->
    <div class="flex items-center justify-center mb-8">
        <img src="/images/logo.png" alt="Logo" class="h-12 w-15 mr-2">
    </div>

    <!-- Navigasi -->
    <nav class="flex-1 space-y-2">
        <a href="/admin/dashboard" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('dashboard') ? 'bg-amber-200' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h6v6H3V3zM3 15h6v6H3v-6zM15 3h6v6h-6V3zM15 15h6v6h-6v-6z"/>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="/admin/dashboard/users" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('users.*') ? 'bg-amber-200' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a4 4 0 00-3-3.87M9 20H4v-1a4 4 0 013-3.87m4-12a4 4 0 110 8 4 4 0 010-8z"/>
            </svg>
            <span class="font-medium">Users</span>
        </a>

        <a href="/admin/dashboard/events" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('events.*') ? 'bg-amber-200' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3M16 7V3M3 11h18M5 11v10h14V11H5z"/>
            </svg>
            <span class="font-medium">Events</span>
        </a>

        <a href="/admin/dashboard/registration" 
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-amber-100 transition 
                  {{ request()->routeIs('registrations.*') ? 'bg-amber-200' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 014-4h4M3 7h18M5 7v10h14V7H5z"/>
            </svg>
            <span class="font-medium">Registrations</span>
        </a>
    </nav>

    <!-- Footer -->
    <div class="mt-auto text-center text-gray-500 text-sm">
        &copy; 2025 Loading Insight Process
    </div>
</aside>

<!-- Overlay (muncul ketika sidebar aktif di mobile) -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-30 lg:hidden"></div>

<!-- Script -->
<script>
document.getElementById('sidebarToggle').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
    document.getElementById('overlay').classList.toggle('hidden');
});

document.getElementById('overlay').addEventListener('click', () => {
    document.getElementById('sidebar').classList.add('-translate-x-full');
    document.getElementById('overlay').classList.add('hidden');
});
</script>
