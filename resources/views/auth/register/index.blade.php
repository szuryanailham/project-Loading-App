@extends('auth.app')

@section('title', 'Daftar Akun')
@section('heading', 'Buat Akun Baru')
@section('subheading', 'Daftar Sebagai Contributor')

@section('content')
<form method="POST" action="{{ route('register') }}" class="space-y-5">
  @csrf

  <!-- Nama Lengkap -->
  <div>
    <label for="name" class="block mb-2 text-sm font-medium text-amber-700 dark:text-amber-300">
      Nama Lengkap
    </label>
    <input id="name" type="text" name="name" required
           value="{{ old('name') }}"
           class="bg-white border border-amber-300 text-gray-900 rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5 placeholder-gray-400 dark:bg-gray-100 dark:text-gray-800"
           placeholder="Nama lengkap">
  </div>

  <!-- Email -->
  <div>
    <label for="email" class="block mb-2 text-sm font-medium text-amber-700 dark:text-amber-300">
      Email
    </label>
    <input id="email" type="email" name="email" required
           value="{{ old('email') }}"
           class="bg-white border border-amber-300 text-gray-900 rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5 placeholder-gray-400 dark:bg-gray-100 dark:text-gray-800"
           placeholder="name@domain.com">
  </div>

  <!-- Password -->
  <div>
    <label for="password" class="block mb-2 text-sm font-medium text-amber-700 dark:text-amber-300">
      Password
    </label>
    <input id="password" type="password" name="password" required
           class="bg-white border border-amber-300 text-gray-900 rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5 placeholder-gray-400 dark:bg-gray-100 dark:text-gray-800"
           placeholder="••••••••">
  </div>

  <!-- Konfirmasi Password -->
  <div>
    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-amber-700 dark:text-amber-300">
      Konfirmasi Password
    </label>
    <input id="password_confirmation" type="password" name="password_confirmation" required
           class="bg-white border border-amber-300 text-gray-900 rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5 placeholder-gray-400 dark:bg-gray-100 dark:text-gray-800"
           placeholder="Ulangi password">
  </div>

  <!-- Tombol Daftar -->
  <button type="submit"
          class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2.5 rounded-lg shadow-lg transition-all duration-200 hover:shadow-amber-400/50">
    Daftar
  </button>

  <!-- Link ke login -->
  <p class="text-center text-sm text-gray-600 dark:text-gray-400">
    Sudah punya akun?
    <a href="{{ route('login') }}" class="text-amber-600 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 font-medium">
      Masuk
    </a>
  </p>
</form>


@endsection

<div id="snackbar"
     class="fixed bottom-6 right-6 hidden bg-gray-800 text-white px-5 py-3 rounded-lg shadow-xl z-50 transition-all duration-500 opacity-0">
  <span id="snackbar-message"></span>
</div>

<script>
  function showSnackbar(message, type = 'success') {
    const snackbar = document.getElementById('snackbar');
    const messageSpan = document.getElementById('snackbar-message');

    messageSpan.textContent = message;

    snackbar.classList.remove('bg-gray-800', 'bg-green-600', 'bg-red-600');
    snackbar.classList.add(type === 'success' ? 'bg-green-600' : 'bg-red-600');

    snackbar.classList.remove('hidden', 'opacity-0');
    snackbar.classList.add('opacity-100');


    setTimeout(() => {
      snackbar.classList.add('opacity-0');
      setTimeout(() => snackbar.classList.add('hidden'), 500);
    }, 4000);
  }


  @if (session('success'))
    showSnackbar("{{ session('success') }}", 'success');
  @endif

  @if (session('failed'))
    showSnackbar("{{ session('failed') }}", 'error');
  @endif

  @if ($errors->any())
    showSnackbar("{{ $errors->first() }}", 'error');
  @endif
</script>