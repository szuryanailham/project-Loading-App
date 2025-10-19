@extends('registrations.layouts.app')

@section('title', 'Kirim Feedback')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-md border border-gray-100 mt-6" x-data="{ loading: false }">
  <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Bagikan Pengalamanmu</h1>

  <form action="{{ route('event.feedback.store') }}" method="POST" x-on:submit="loading = true">
    @csrf

    <div class="space-y-5">
      <!-- Nama -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
        <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" placeholder="Masukkan nama kamu" required>
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" placeholder="Masukkan email kamu" required>
      </div>

      <!-- Event -->
      <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">
        Pilih event yang sudah kamu ikuti
      </label>
        <select name="event_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" required>
          <option value="" disabled selected>-- Pilih Event --</option>
          @foreach ($events as $event)
            <option value="{{ $event->id }}">{{ $event->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Rating Interaktif -->
      <div x-data="{ rating: 0, hoverRating: 0 }" class="space-y-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
        <div class="flex items-center space-x-2">
          @for ($i = 1; $i <= 5; $i++)
            <button type="button"
              x-on:click="rating = {{ $i }}"
              x-on:mouseover="hoverRating = {{ $i }}"
              x-on:mouseleave="hoverRating = 0"
              class="text-3xl focus:outline-none transition-transform transform hover:scale-110"
            >
              <span x-bind:class="(hoverRating >= {{ $i }} || rating >= {{ $i }}) ? 'text-amber-500' : 'text-gray-300'">★</span>
            </button>
          @endfor
        </div>
        <input type="hidden" name="rating" x-model="rating">
        <p class="text-xs text-gray-500 mt-1">1 = sangat buruk, 5 = sangat baik</p>
      </div>

      <!-- Komentar -->
      <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
  Yuk, bagikan kesan dan saran kamu!
</label>

        <textarea name="comment" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition" placeholder="Ceritakan pengalamanmu..." required></textarea>
      </div>
    </div>

    <!-- Tombol Submit dengan Spinner -->
    <div class="mt-6 flex justify-end relative">
      <button type="submit"
        class="bg-amber-600 text-white py-2 px-6 rounded-lg hover:bg-amber-700 transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center space-x-2"
        x-bind:disabled="loading"
      >
        <template x-if="!loading">
          <span>Kirim Feedback</span>
        </template>

        <template x-if="loading">
          <div class="flex items-center space-x-2">
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
            <span>Mengirim...</span>
          </div>
        </template>
      </button>
    </div>
  </form>
</div>

<!-- Alpine.js -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
