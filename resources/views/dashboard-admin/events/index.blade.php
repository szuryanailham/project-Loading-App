@extends('dashboard-admin.layouts.app')

@section('title', 'Events')

@section('content')

    <!-- ====== FLASH MESSAGES (SUCCESS / ERROR) ====== -->
    @if(session('success'))
        <div class="alert bg-green-200 text-green-800 p-3 rounded mb-4 flex justify-between items-center transition duration-300">
            <span>{{ session('success') }}</span>
            <button class="close-btn text-green-800 font-bold ml-4">&times;</button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert bg-red-200 text-red-800 p-3 rounded mb-4 flex justify-between items-center transition duration-300">
            <span>{{ session('error') }}</span>
            <button class="close-btn text-red-800 font-bold ml-4">&times;</button>
        </div>
    @endif

    <!-- ====== SEARCH & ADD EVENT ====== -->
    <div class="bg-white p-6 rounded-lg shadow mb-6 flex justify-between">
        <!-- Form Pencarian -->
        <form action="{{ route('events.index') }}" method="GET" class="flex items-center gap-2 w-1/2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search by name or type..." 
                class="w-full px-4 py-2 border rounded-lg focus:ring-amber-500 focus:border-amber-500"
            >
            <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
                Search
            </button>
        </form>

        <!-- Tambah Event -->
        <a href="{{ route('events.create') }}" 
           class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            + Add Event
        </a>
    </div>

    <!-- ====== DATA TABLE ====== -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-amber-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poster</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($events as $index => $event)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{-- @dd($event->poster_img) --}}
                           @if($event->poster_img)
    <img src="{{ asset('storage/' . $event->poster_img) }}" 
         alt="{{ $event->name }}" 
         class="h-12 rounded">
@else
    <span class="text-gray-500">Belum ada poster</span>
@endif

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $event->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $event->event_type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $event->location ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($event->price_type === 'free')
                                <span class="text-green-600 font-semibold">Free</span>
                            @else
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="{{ $event->registration_status === 'open' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($event->registration_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                           <a href="{{ route('events.show', $event->slug) }}" 
                            class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                    View
                                    </a>

                            <a href="" 
                               class="px-3 py-1 bg-amber-500 text-white rounded hover:bg-amber-600 transition">
                                Edit
                            </a>
                            <form action="" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Are you sure?')" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-gray-500">No events found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- ====== PAGINATION ====== -->
    <div class="mt-4">
        {{ $events->appends(['search' => request('search')])->links() }}
    </div>

    <!-- Load JavaScript eksternal -->
    <script src="/js/alert.js"></script>
@endsection
