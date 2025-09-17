<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Multi-step Registration</title>
</head>
<body class="bg-gradient-to-br from-yellow-50 to-amber-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-3xl bg-white shadow-lg rounded-2xl p-8">
    <!-- LOGO -->
    <div class="flex justify-center mb-6">
      <img src="/logo.png" alt="Logo" class="h-16">
    </div>


@if ($errors->any())
  <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
    <ul class="list-disc list-inside text-sm">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


    <form id="multiStepForm" action="{{ route('event.register') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- Progress Indicator -->
      <div class="flex items-center justify-between mb-6">
        <div id="stepIndicator" class="flex gap-2 text-sm font-medium text-amber-700">
          <span class="step-number bg-amber-600 text-white rounded-full px-3 py-1">1</span>
          <span>Personal Info</span>
        </div>
        <div class="text-gray-500">Step <span id="stepCount">1</span> of 3</div>
      </div>

      <!-- STEP 1 -->
      <div class="step">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="name" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
            <input type="text" name="phone" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="Alamat" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="birth_date" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="gender" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
              <option value="">-- Select --</option>
              <option value="male">Laki laki</option>
              <option value="female">Perempuan</option>
            </select>
          </div>
        </div>
      </div>

      <!-- STEP 2 -->
  <div class="step hidden">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <label class="block text-sm font-medium text-gray-700">Pilih Events</label>
      <select id="eventSelect" name="event_id" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
        <option value="">-- pilih events --</option>
        @foreach($events as $event)
          <option value="{{ $event->id }}" data-price="{{ $event->price }}">
            {{ $event->name }}
          </option>
        @endforeach
      </select>
      <!-- Tempat menampilkan harga -->
      <p id="eventPrice" class="mt-2 text-gray-700 font-medium hidden">Harga: Rp 0</p>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Dari mana tau event kami ?</label>
      <select name="source" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
        <option value="">-- Select Source --</option>
        <option value="social_media">Social Media</option>
        <option value="friend">teman</option>
        <option value="school">Sekolah</option>
        <option value="school">Keluarga</option>
        <option value="other">lainnya</option>
      </select>
    </div>
  </div>

  <div class="mt-4">
    <label class="block text-sm font-medium text-gray-700">spill dong alesan ikut event ini ?</label>
    <textarea name="notes" rows="3" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500"></textarea>
  </div>
</div>

      <!-- STEP 3 -->
      <div class="step hidden">
        <div class="p-4 bg-amber-50 border border-amber-200 rounded-lg mb-4">
          <h2 class="font-semibold text-amber-800 mb-2">informasi Pembayaran</h2>
          <ul class="text-gray-700 text-sm space-y-1">
            <li><strong>Bank:</strong> BCA</li>
            <li><strong>Account Number:</strong> 1234567890</li>
            <li><strong>Account Name:</strong> Yayasan Konseling Sehat</li>
          </ul>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Uploud Bukti pembayaran</label>
          <input type="file" name="payment_proof" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-between mt-8">
        <button type="button" id="prevBtn" class="hidden bg-gray-300 text-gray-700 py-2 px-4 rounded-lg">Sebelum</button>
        <button type="button" id="nextBtn" class="bg-amber-600 text-white py-2 px-6 rounded-lg hover:bg-amber-700">Selanjutnya</button>
        <button type="submit" id="submitBtn" class="hidden bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700">Submit</button>
      </div>
    </form>
  </div>

  <script>
    const steps = document.querySelectorAll(".step");
    const stepCount = document.getElementById("stepCount");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const submitBtn = document.getElementById("submitBtn");

    let currentStep = 0;

    function showStep(step) {
      steps.forEach((s, i) => s.classList.toggle("hidden", i !== step));
      stepCount.textContent = step + 1;
      prevBtn.classList.toggle("hidden", step === 0);
      nextBtn.classList.toggle("hidden", step === steps.length - 1);
      submitBtn.classList.toggle("hidden", step !== steps.length - 1);
    }

    nextBtn.addEventListener("click", () => {
      if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
      }
    });

    prevBtn.addEventListener("click", () => {
      if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
      }
    });

    showStep(currentStep);
  </script>

 <script>
  const eventSelect = document.getElementById('eventSelect');
  const eventPrice = document.getElementById('eventPrice');

  eventSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const price = selectedOption.getAttribute('data-price');

    if(price) {
      // Format ke Rupiah
      const formattedPrice = Number(price).toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
      });

      eventPrice.textContent = `Harga: ${formattedPrice}`;
      eventPrice.classList.remove('hidden');
    } else {
      eventPrice.textContent = '';
      eventPrice.classList.add('hidden');
    }
  });
</script>

<script>
  const eventSelect = document.getElementById('eventSelect');
  const eventPrice = document.getElementById('eventPrice');

  eventSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const price = selectedOption.getAttribute('data-price');

    if(price) {
      // Format ke Rupiah
      const formattedPrice = Number(price).toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
      });

      eventPrice.textContent = `Harga: ${formattedPrice}`;
      eventPrice.classList.remove('hidden');
    } else {
      eventPrice.textContent = '';
      eventPrice.classList.add('hidden');
    }
  });
</script>


</body>
</html>
