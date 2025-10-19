<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- TailwindCSS via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  75% { transform: translateX(5px); }
}
.border-red-500 {
  animation: shake 0.2s;
}
</style>

  <title>Multi-step Registration</title>
</head>
<body class="bg-gradient-to-br from-yellow-50 to-amber-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-3xl bg-white shadow-lg rounded-2xl p-8">

    <div class="flex justify-center mb-6">
      <img src="/images/logo.png" alt="Logo" class="h-16">
    </div>

   @if ($errors->any())
  <div 
    id="error-alert" 
    class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg relative transition-opacity duration-500"
  >
    <button 
      type="button" 
      onclick="closeAlert()" 
      class="absolute top-2 right-3 text-red-500 hover:text-red-700 font-bold text-lg leading-none"
      aria-label="Close"
    >
      &times;
    </button>

    <ul class="list-disc list-inside text-sm">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>

  <script>

    setTimeout(() => {
      const alert = document.getElementById('error-alert');
      if (alert) {
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500); // tunggu animasi fade-out
      }
    }, 5000);

    function closeAlert() {
      const alert = document.getElementById('error-alert');
      if (alert) {
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
      }
    }
  </script>
@endif

    <!-- FORM MULTI STEP -->
 <form id="multiStepForm" action="{{ route('event.register.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <!-- Progress Indicator -->
  <div class="flex items-center justify-between mb-6">
    <div id="stepIndicator" class="flex gap-2 text-sm font-medium text-amber-700">
      <span class="step-number bg-amber-600 text-white rounded-full px-3 py-1">1</span>
      <span>Personal Info</span>
    </div>
    <div class="text-gray-500">Step <span id="stepCount">1</span> of 3</div>
  </div>

  <!-- ================= STEP 1 : Personal Info ================= -->
  <div class="step">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Nama -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="name" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
      </div>

      <!-- Nomor HP -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
        <input 
          type="text" 
          name="phone" 
          value="628" 
          class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500"
          oninput="if(!this.value.startsWith('628')) this.value='628';"
          required
        >
      </div>

      <!-- Alamat -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" name="alamat" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
      </div>

      <!-- Tanggal Lahir -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
        <input type="date" name="birth_date" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
      </div>

      <!-- Jenis Kelamin -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <select name="gender" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
          <option value="">-- Select --</option>
          <option value="male">Laki-laki</option>
          <option value="female">Perempuan</option>
        </select>
      </div>
    </div>
  </div>

  <!-- ================= STEP 2 : Pilih Event ================= -->
  <div class="step hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <!-- Pilih Event -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Pilih Events</label>
        <select id="eventSelect" name="event_id" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
          <option value="">-- Pilih Event --</option>
          @foreach($events as $event)
            <option value="{{ $event->id }}" data-price="{{ $event->price }}">
              {{ $event->name }}
            </option>
          @endforeach
        </select>
        <!-- Tempat menampilkan harga -->
        <p id="eventPrice" class="mt-2 text-gray-700 font-medium hidden">Harga: Rp 0</p>
      </div>

      <!-- Source -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Dari mana tahu event kami?</label>
        <select id="sourceSelect" name="source" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
          <option value="">-- Select Source --</option>
          <option value="social_media">Social Media</option>
          <option value="friend">Teman</option>
          <option value="school">Sekolah</option>
          <option value="family">Keluarga</option>
          <option value="other">Lainnya</option>
        </select>

        <!-- Pilihan Social Media -->
        <select id="socialMediaSelect" name="social_media" class="hidden w-full mt-3 px-4 py-2 border rounded-lg focus:ring-amber-500">
          <option value="">-- Pilih Platform --</option>
          <option value="tiktok">Tiktok</option>
          <option value="instagram">Instagram</option>
          <option value="whatsapp">WhatsApp</option>
        </select>

        <!-- Input jika pilih Lainnya -->
        <input type="text" id="otherSourceInput" name="other_source" placeholder="Sebutkan sumber lainnya"
          class="hidden w-full mt-3 px-4 py-2 border rounded-lg focus:ring-amber-500">
      </div>
    </div>

    <!-- Notes -->
    <div class="mt-4">
      <label class="block text-sm font-medium text-gray-700">Spill dong alasan ikut event ini?</label>
      <textarea name="notes" rows="3" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required></textarea>
    </div>
  </div>

  <!-- ================= STEP 3 : Pembayaran ================= -->
  <div class="step hidden">
    <!-- Info Rekening -->
    <div class="p-4 bg-amber-50 border border-amber-200 rounded-lg mb-4">
      <h2 class="font-semibold text-amber-800 mb-2">Informasi Pembayaran</h2>
      <ul class="text-gray-700 text-sm space-y-1">
        <li><strong>Bank:</strong> BRI</li>
        <li class="flex items-center gap-2">
          <div>
            <div class="text-xs text-gray-500">Account Number</div>
            <div class="text-sm font-mono text-amber-800">30760103 9166 532</div>
          </div>
          <button
            type="button"
            id="copyAccountBtn"
            class="ml-auto px-3 py-1.5 text-sm rounded-md border bg-white hover:bg-amber-100 focus:outline-none focus:ring-2 focus:ring-amber-300"
            data-number="307601039166532"
          >
            Salin
          </button>
        </li>
        <li><strong>Account Name:</strong> An. Dzulfiqar Afif Al Ghifari</li>
      </ul>
    </div>

    <!-- Harga Event -->
    <div class="mb-4">
      <p id="paymentEventPrice" class="text-lg font-semibold text-amber-700">Harga: Rp 0</p>
    </div>

    <!-- Upload Bukti -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
      <input type="file" name="payment_proof" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
    </div>
  </div>

  <!-- ================= BUTTONS ================= -->
  <div class="flex justify-between mt-8">
    <button type="button" id="prevBtn" class="hidden bg-gray-300 text-gray-700 py-2 px-4 rounded-lg">
      Sebelumnya
    </button>
    <button type="button" id="nextBtn" class="bg-amber-600 text-white py-2 px-6 rounded-lg hover:bg-amber-700">
      Selanjutnya
    </button>
    <button type="submit" id="submitBtn" 
      class="hidden bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 flex items-center justify-center gap-2">
      <span id="submitText">Submit</span>
      <svg id="loadingSpinner" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
          d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
        </path>
      </svg>
    </button>
  </div>
</form>

  </div>
  <script src="/js/multistep.js"></script>
  <script src="/js/copypaste.js"></script>
  <script src="/js/loading.js"></script>
  <script src="/js/inputSettings.js"></script>


<script>
const form = document.getElementById("multiStepForm");
const submitText = document.getElementById("submitText");
const loadingSpinner = document.getElementById("loadingSpinner");

form?.addEventListener("submit", function () {
    submitBtn.disabled = true;

    if (submitText) {
        submitText.textContent = "Processing...";
    }

    if (loadingSpinner) {
        loadingSpinner.classList.remove("hidden");
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const ua = navigator.userAgent.toLowerCase();

  // Cek apakah dibuka lewat in-app browser Instagram
  if (ua.includes("instagram")) {
    const currentUrl = window.location.href;

    // Jika Android → pakai intent:// agar buka di Chrome
    if (ua.includes("android")) {
      const intentUrl = `intent://${currentUrl.replace(/^https?:\/\//, "")}#Intent;scheme=https;package=com.android.chrome;end`;

      // Redirect ke Chrome
      window.location.href = intentUrl;

      // Fallback (jika Chrome tidak ada atau gagal)
      setTimeout(() => {
        showManualButton(currentUrl, "Buka di Browser (Chrome)");
      }, 1500);
    }

    // Jika iPhone → redirect buka di Safari
    else if (/iphone|ipad|ipod/.test(ua)) {
      // Safari tidak mendukung intent, jadi pakai redirect biasa
      window.location.href = currentUrl.replace("https://", "x-safari-https://");

      // Fallback
      setTimeout(() => {
        showManualButton(currentUrl, "Buka di Safari");
      }, 1500);
    }

    // Fungsi tampilkan tombol manual jika redirect gagal
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
