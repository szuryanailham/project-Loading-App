<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    @include('dashboard-admin.layouts.sidebar')

    <div class="flex-1 flex flex-col">
        <!-- Header -->
        @include('dashboard-admin.layouts.header')

        <!-- Main Content -->
        <main class="p-6 overflow-auto flex-1">
            @yield('content')
        </main>
    </div>

</body>
</html>
