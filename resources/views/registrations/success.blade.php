<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifikasi Pendaftaran</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes fadeInScale {
      0% { opacity: 0; transform: scale(0.9); }
      100% { opacity: 1; transform: scale(1); }
    }
    .animate-fadeInScale {
      animation: fadeInScale 0.6s ease-out forwards;
    }
  </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="max-w-md w-full bg-white shadow-lg rounded-2xl p-6 text-center animate-fadeInScale">
    <!-- Icon Success -->
    <div class="flex justify-center">
      <svg class="w-16 h-16 text-green-500 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
    </div>

    <!-- Title -->
    <h2 class="mt-4 text-2xl font-bold text-gray-800">Registrasi Berhasil!</h2>

    <!-- Description -->
    <p class="mt-2 text-gray-600 text-sm leading-relaxed">
      Registrasi Anda sudah <span class="font-semibold text-green-600">masuk</span>.  
      Silakan tunggu informasi lebih lanjut yang akan kami kirimkan pada <span class="font-medium">H-1 sebelum acara</span>.  
      Jika ada pertanyaan, jangan ragu untuk menghubungi admin event.
    </p>

    <!-- Nomor Admin -->
    <div class="mt-4 bg-gray-100 rounded-lg p-3">
      <p class="text-gray-700 text-sm">Hubungi Admin:</p>
      <a href="https://wa.me/6281234567890" target="_blank" class="text-green-600 font-semibold hover:underline">
        +62 812-3456-7890
      </a>
    </div>

    <!-- Button -->
    <div class="mt-6 flex justify-center space-x-4">
      <a href="/" class="px-6 py-2 text-white bg-green-500 rounded-lg shadow hover:bg-green-600 transition transform hover:scale-105">
        Home
      </a>
      <a href="https://wa.me/6281234567890" target="_blan_
