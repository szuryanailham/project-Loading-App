@extends('auth.app')

@section('title', 'Login Admin')
@section('heading', 'Masuk ke Akun')
@section('subheading', 'Panel Admin & Contributor')

@section('content')
<form method="POST" action="{{ route('login') }}" class="space-y-5">
  @csrf
  <div>
    <label for="email" class="block mb-2 text-sm font-medium text-amber-700 dark:text-amber-300">Email</label>
    <input id="email" type="email" name="email" required
           class="bg-white border border-amber-300 text-gray-900 rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5 placeholder-gray-400 dark:bg-gray-100 dark:text-gray-800"
           placeholder="name@domain.com">
  </div>

  <div>
    <label for="password" class="block mb-2 text-sm font-medium text-amber-700 dark:text-amber-300">Password</label>
    <input id="password" type="password" name="password" required
           class="bg-white border border-amber-300 text-gray-900 rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5 placeholder-gray-400 dark:bg-gray-100 dark:text-gray-800"
           placeholder="••••••••">
  </div>

  <div class="flex items-center justify-between text-sm">
    <label class="flex items-center text-gray-600 dark:text-gray-300">
      <input type="checkbox" class="mr-2 accent-amber-500"> Ingat saya
    </label>
    <a href="#" class="text-amber-600 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300">Lupa password?</a>
  </div>

  <button type="submit"
          class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2.5 rounded-lg shadow-lg transition-all duration-200 hover:shadow-amber-400/50">
    Masuk
  </button>

  <p class="text-center text-sm text-gray-600 dark:text-gray-400">
    Belum punya akun?
    <a href="{{ route('register') }}" class="text-amber-600 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 font-medium">Daftar Sekarang</a>
  </p>
</form>
@endsection

  {{-- Snackbar error login --}}
    @if ($errors->has('email'))
        <div id="snackbar"
            class="fixed bottom-6 right-6 z-50 bg-gradient-to-r from-red-500 to-rose-600 text-white text-sm sm:text-base px-5 py-4 rounded-xl shadow-2xl flex items-center gap-3 backdrop-blur-md animate-fade-in border border-white/10">
            
            {{-- Icon error --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white animate-pop" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>

            {{-- Pesan --}}
            <div class="flex flex-col">
                <span class="font-semibold">Login Gagal</span>
                <span class="text-white/90">{{ $errors->first('email') }}</span>
            </div>

            {{-- Progress bar --}}
            <div class="absolute bottom-0 left-0 h-1 bg-white/30 rounded-full overflow-hidden w-full">
                <div id="progress-bar" class="h-full bg-white/80 w-full"></div>
            </div>
        </div>

        <script>
            // Auto-hide after 4 seconds
            setTimeout(() => {
                const snackbar = document.getElementById('snackbar');
                snackbar.classList.add('animate-fade-out');
                setTimeout(() => snackbar.remove(), 600);
            }, 4000);

            // Progress bar animation
            const bar = document.getElementById('progress-bar');
            let width = 100;
            const timer = setInterval(() => {
                width -= 2.5;
                bar.style.width = width + '%';
                if (width <= 0) clearInterval(timer);
            }, 100);
        </script>

        {{-- Animasi CSS --}}
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px) scale(0.95);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            @keyframes fade-out {
                from {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
                to {
                    opacity: 0;
                    transform: translateY(10px) scale(0.9);
                }
            }

            @keyframes pop {
                0% {
                    transform: scale(0);
                }
                60% {
                    transform: scale(1.3);
                }
                100% {
                    transform: scale(1);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.4s ease-out;
            }

            .animate-fade-out {
                animation: fade-out 0.5s ease-in forwards;
            }

            .animate-pop {
                animation: pop 0.4s ease-out;
            }
        </style>
    @endif
