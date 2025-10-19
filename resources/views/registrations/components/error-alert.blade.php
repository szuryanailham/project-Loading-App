@if ($errors->any())
<div id="error-alert" class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg relative transition-opacity duration-500">
  <button type="button" onclick="closeAlert()" 
    class="absolute top-2 right-3 text-red-500 hover:text-red-700 font-bold text-lg leading-none"
    aria-label="Close">&times;</button>

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
      setTimeout(() => alert.remove(), 500);
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
