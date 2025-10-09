@extends('dashboard-admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- Snackbar Success --}}
    @if (session('success'))
        <div id="snackbar"
            class="fixed bottom-5 right-5 z-50 bg-green-600 text-white text-sm sm:text-base px-4 py-3 rounded-lg shadow-lg flex items-center gap-2 animate-fade-in">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>

        <script>
            // Hilangkan snackbar otomatis setelah 4 detik
            setTimeout(() => {
                const snackbar = document.getElementById('snackbar');
                snackbar.classList.add('animate-fade-out');
                setTimeout(() => snackbar.remove(), 500);
            }, 4000);
        </script>

        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fade-out {
                from {
                    opacity: 1;
                    transform: translateY(0);
                }

                to {
                    opacity: 0;
                    transform: translateY(20px);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.4s ease-out;
            }

            .animate-fade-out {
                animation: fade-out 0.5s ease-in forwards;
            }
        </style>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">Card 1</div>
        <div class="bg-white p-6 rounded-lg shadow">Card 2</div>
        <div class="bg-white p-6 rounded-lg shadow">Card 3</div>
    </div>
@endsection
