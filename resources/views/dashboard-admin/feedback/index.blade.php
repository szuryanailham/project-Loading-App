@extends('dashboard-admin.layouts.app')

@section('title', 'Feedbacks')

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

    <!-- ====== SEARCH ====== -->
    <div class="bg-white p-6 rounded-lg shadow mb-6 flex justify-between">
        <form action="" method="GET" class="flex items-center gap-2 w-1/2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search by name, email or event..." 
                class="w-full px-4 py-2 border rounded-lg focus:ring-amber-500 focus:border-amber-500"
            >
            <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
                Search
            </button>
        </form>
    </div>

    <!-- ====== DATA TABLE ====== -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-amber-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komentar / Saran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Feedback</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($feedbacks as $index => $feedback)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $feedback->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $feedback->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $feedback->event->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $feedback->rating ? 'text-amber-500' : 'text-gray-300' }}">★</span>
                            @endfor
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-blue-600 hover:underline cursor-pointer"
                            onclick="showComment('{{ addslashes($feedback->comment ?? 'Tidak ada komentar') }}')">
                            Lihat Komentar
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($feedback->created_at)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form 
                            id="deleteForm-{{ $feedback->id }}" 
                            action="{{ route('feedback.destroy', $feedback->id) }}" 
                            method="POST" 
                            class="inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="button" 
                                    class="delete-btn px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                    data-id="{{ $feedback->id }}"
                                    data-name="{{ $feedback->name }}" 
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">No feedbacks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- ====== PAGINATION ====== -->
    <div class="mt-4">
        {{ $feedbacks->appends(['search' => request('search')])->links() }}
    </div>

    <!-- ====== JS ====== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Komentar / Saran
        window.showComment = function (comment) {
            Swal.fire({
                title: "Komentar / Saran",
                text: comment,
                confirmButtonText: "Tutup",
                confirmButtonColor: "#f59e0b",
                customClass: { popup: "rounded-xl shadow-lg" },
            });
        };

        // Hapus Feedback
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const feedbackName = this.dataset.name;
                    const feedbackId = this.dataset.id;
                    const form = document.getElementById(`deleteForm-${feedbackId}`);

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: `Feedback dari "${feedbackName}" akan dihapus permanen.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Tutup alert manual
            document.querySelectorAll('.close-btn').forEach(btn => {
                btn.addEventListener('click', () => btn.parentElement.remove());
            });

            // Auto hide alert
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(alert => {
                    alert.classList.add('opacity-0', 'transition', 'duration-500');
                    setTimeout(() => alert.remove(), 500);
                });
            }, 3000);
        });
    </script>
@endsection
