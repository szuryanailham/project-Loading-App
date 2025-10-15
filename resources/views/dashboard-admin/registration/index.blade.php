@extends('dashboard-admin.layouts.app')

@section('title', 'Registrations')

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

    <!-- ====== SEARCH & EXPORT ====== -->
    <div class="bg-white p-6 rounded-lg shadow mb-6 flex justify-between">
        <!-- Form Pencarian -->
        <form action="{{ route('registrations.search') }}" method="GET" class="flex items-center gap-2 w-1/2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search by name or email..." 
                class="w-full px-4 py-2 border rounded-lg focus:ring-amber-500 focus:border-amber-500"
            >
            <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
                Search
            </button>
        </form>

        <!-- Tombol Export -->
        <a href="{{ route('registrations.export') }}" 
           class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            <!-- Icon Export -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M7.5 10.5L12 15m0 0l4.5-4.5M12 15V3" />
            </svg>
            Export
        </a>
    </div>

    <!-- ====== DATA TABLE ====== -->
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-amber-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Register</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($registrations as $index => $registration)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $registration->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $registration->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($registration->phone)
                                        <a href="https://wa.me/{{ $registration->phone }}" 
                                        class="text-blue-600 hover:underline">
                                            {{ $registration->phone }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $registration->alamat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $registration->event->name ?? '-' }}</td>
                                

                                <!-- 🟡 Kolom Notes Baru -->
                             <td class="px-6 py-4 text-blue-600 hover:underline cursor-pointer"
                                onclick="showNotes('{{ addslashes($registration->notes ?? 'Tidak ada catatan') }}')">
                                Lihat Catatan
                            </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($registration->payment_proof)
                                        <a href="{{ asset('storage/' . $registration->payment_proof) }}" 
                                        target="_blank" 
                                        class="text-green-600 hover:underline">View</a>
                                    @else
                                        <span class="text-gray-500">Not Uploaded</span>
                                    @endif
                                </td>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                     {{ $registration->created_at->format('d M Y H:i') }}
                                 </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form 
                                        id="deleteForm-{{ $registration->id }}" 
                                        action="{{ route('registrations.destroy', $registration->id) }}" 
                                        method="POST" 
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            class="delete-btn px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                            data-id="{{ $registration->id }}"
                                            data-name="{{ $registration->name }}" 
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">No registrations found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>



    <!-- ====== PAGINATION ====== -->
    <div class="mt-4">
        {{ $registrations->appends(['search' => request('search')])->links() }}
    </div>

    <script>
        window.showNotes = function (notes) {
        Swal.fire({
            title: "Catatan",
            text: notes,
            confirmButtonText: "Tutup",
            confirmButtonColor: "#ef4444",
            customClass: {
                popup: "rounded-xl shadow-lg",
            },
        });
        };
    </script>

    <!-- Load JavaScript eksternal -->
    <script src="/js/register/alert.js"></script>
    <script src="/js/register/alertDelete.js"></script>
    {{-- <script src="/js/register/popupNote.js"></script> --}}
@endsection
