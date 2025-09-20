@extends('dashboard-admin.layouts.app')

@section('title', 'Events')

@section('content')
<h1 class="text-2xl font-bold mb-6">Create Event</h1>

<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
  @csrf

  <!-- ================= Basic Info ================= -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
   <!-- Event Name -->
<div>
  <label class="block text-sm font-medium text-gray-700">Event Name</label>
  <input type="text" id="eventName" name="name" 
         class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
</div>

<!-- Slug -->
<div>
  <label class="block text-sm font-medium text-gray-700">Slug</label>
  <input type="text" id="eventSlug" name="slug" 
         class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" readonly>
</div>

    <!-- Poster -->
<div>
  <label class="block text-sm font-medium text-gray-700">Poster Image</label>
  <input type="file" name="poster_img" id="posterInput"
         class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500"
         accept="image/*">

  <!-- Preview -->
  <div class="mt-3">
    <img id="posterPreview" src="" alt="Preview Poster"
         class="hidden w-48 h-64 object-cover rounded-lg border">
  </div>
</div>

    <!-- Date -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Event Date</label>
      <input type="date" name="date" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" required>
    </div>
  </div>

  <!-- Description -->
  <div>
    <label class="block text-sm font-medium text-gray-700">Description</label>
    <textarea name="description" rows="3" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500"></textarea>
  </div>

  <!-- ================= Event Details ================= -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Event Type -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Event Type</label>
      <select name="event_type" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
        <option value="offline">Offline</option>
        <option value="online">Online</option>
      </select>
    </div>

    <!-- Location -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Location</label>
      <input type="text" name="location" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
    </div>

    <!-- Price Type -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Price Type</label>
      <select id="priceTypeSelect" name="price_type" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
        <option value="free">Free</option>
        <option value="paid">Paid</option>
      </select>
    </div>

    <!-- Price -->
    <div id="priceField">
      <label class="block text-sm font-medium text-gray-700">Price</label>
      <input type="number" name="price" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" placeholder="0">
    </div>
  </div>

  <!-- ================= Registration & External ================= -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Registration Status -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Registration Status</label>
      <select name="registration_status" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>

    <!-- External Link -->
    <div>
      <label class="block text-sm font-medium text-gray-700">External Link</label>
      <input type="url" name="external_link" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-amber-500" placeholder="https://">
    </div>
  </div>

  <!-- ================= BUTTON ================= -->
  <div class="mt-8">
    <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700">
      Save Event
    </button>
  </div>
</form>

<!-- Script untuk hide price field jika Free -->
  <script src="/js/events/create.js"></script>
@endsection
