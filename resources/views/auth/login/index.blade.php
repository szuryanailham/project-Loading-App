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
