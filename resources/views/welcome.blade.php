<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>

  <!-- Tailwind -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- Lottie Animation -->
  <script
    src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js"
    type="module">
  </script>

  <style>
    .snackbar {
      visibility: hidden;
      min-width: 250px;
      background-color: #323232;
      color: #fff;
      text-align: center;
      border-radius: 8px;
      padding: 12px 16px;
      position: fixed;
      left: 50%;
      bottom: 30px;
      transform: translateX(-50%);
      z-index: 50;
      opacity: 0;
      transition: opacity 0.4s ease, bottom 0.4s ease;
    }

    .snackbar.show {
      visibility: visible;
      opacity: 1;
      bottom: 50px;
    }
  </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-yellow-50 to-amber-100 text-center">

  <!-- Judul -->
  <h1 class="text-3xl font-bold text-amber-700 mb-4">Home Page</h1>

  <!-- Lottie Animation -->
  <dotlottie-wc
    src="https://lottie.host/211bc53d-7fa0-434d-ab3e-82c70c98ba2c/jaasNbUvEo.lottie"
    class="w-[300px] h-[300px] md:w-[500px] md:h-[500px]" 
    speed="1"
    autoplay
    loop>
  </dotlottie-wc>

  <!-- Pesan tambahan -->
  <p class="mt-6 text-lg md:text-2xl text-gray-700 font-medium">
    🚧 Website Sedang Dibuat 🚧
  </p>
  <p class="mt-2 text-sm md:text-base text-gray-500">
    Kami sedang menyiapkan sesuatu yang keren, nantikan segera!
  </p>

  <!-- Snackbar (akan muncul kalau session sukses ada) -->
  @if (session('success'))
  <div id="snackbar" class="snackbar">
    {{ session('success') }}
  </div>
  @endif

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const snackbar = document.getElementById('snackbar');
      if (snackbar) {
        snackbar.classList.add('show');
        setTimeout(() => {
          snackbar.classList.remove('show');
        }, 4000);
      }
    });
  </script>

</body>
</html>
