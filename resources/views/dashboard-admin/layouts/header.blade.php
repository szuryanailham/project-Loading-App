<header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
    <div>
        <span class="mr-4 text-gray-600">Hello</span>
        <form action="" method="POST" class="inline">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
        </form>
    </div>
</header>
