<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifikasi Feedback</title>
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
    <h2 class="mt-4 text-2xl font-bold text-gray-800">Feedback Berhasil Dikirim!</h2>

    <!-- Description -->
    <p class="mt-2 text-gray-600 text-sm leading-relaxed">
      Terima kasih telah mengisi <span class="font-semibold text-green-600">formulir feedback</span>. 
      Masukan Anda <span class="font-medium">sangat berarti</span> dan 
      <span class="font-semibold text-green-600">membantu kami</span> untuk terus meningkatkan kualitas layanan.
    </p>

    <!-- Buttons -->
    <div class="mt-6 flex justify-center gap-4">
      <a href="/" class="px-6 py-2 text-white bg-green-500 rounded-lg shadow hover:bg-green-600 transition transform hover:scale-105">
        Kembali ke Beranda
      </a>
    </div>
  </div>
</body>
</html>
