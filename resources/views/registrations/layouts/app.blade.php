<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- TailwindCSS via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <title>@yield('title', 'Cahaya Waskitha')</title>

  <style>
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      75% { transform: translateX(5px); }
    }
    .border-red-500 { animation: shake 0.2s; }
  </style>

  @stack('styles')
</head>
<body class="bg-gradient-to-br from-yellow-50 to-amber-100 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-3xl bg-white shadow-lg rounded-2xl p-8">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="/images/logo.png" alt="Logo" class="h-16">
    </div>

    <!-- Error Alert -->
    @include('registrations.components.error-alert')

    <!-- Konten Halaman -->
    @yield('content')

  </div>

  @stack('scripts')

  <script>
    // In-app browser Instagram handling
    document.addEventListener("DOMContentLoaded", function () {
      const ua = navigator.userAgent.toLowerCase();
      if (ua.includes("instagram")) {
        const currentUrl = window.location.href;
        if (ua.includes("android")) {
          const intentUrl = `intent://${currentUrl.replace(/^https?:\/\//, "")}#Intent;scheme=https;package=com.android.chrome;end`;
          window.location.href = intentUrl;
          setTimeout(() => showManualButton(currentUrl, "Buka di Chrome"), 1500);
        } else if (/iphone|ipad|ipod/.test(ua)) {
          window.location.href = currentUrl.replace("https://", "x-safari-https://");
          setTimeout(() => showManualButton(currentUrl, "Buka di Safari"), 1500);
        }
        function showManualButton(url, label) {
          document.body.innerHTML = `
            <div style="padding:20px;text-align:center;">
              <p style="font-size:15px;margin-bottom:12px;">
                Untuk mengisi form dengan lancar, silakan buka halaman ini di browser kamu.
              </p>
              <a href="${url}" 
                style="display:inline-block;background:#000;color:#fff;
                padding:10px 18px;border-radius:8px;text-decoration:none;">
                ${label}
              </a>
            </div>
          `;
        }
      }
    });
  </script>

</body>
</html>
