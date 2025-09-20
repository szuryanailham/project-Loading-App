@extends('dashboard-admin.layouts.app')

@section('title', 'Detail Event')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $event->name }}</h1>

        {{-- Poster Event --}}
        @if($event->poster_img)
            <div class="mb-4">
             <img src="{{ asset('storage/' . $event->poster_img) }}" 
     alt="{{ $event->name }}" 
     class="max-w-md w-full h-auto mx-auto rounded-lg shadow object-contain">

            </div>
        @endif

        {{-- Informasi Event --}}
        <div class="space-y-3">
            <p><strong>Slug:</strong> {{ $event->slug }}</p>
            <p><strong>Deskripsi:</strong> {{ $event->description ?? '-' }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
            <p><strong>Jenis Event:</strong> {{ ucfirst($event->event_type) }}</p>
            <p><strong>Lokasi:</strong> {{ $event->location ?? '-' }}</p>
            <p><strong>Status Pendaftaran:</strong> {{ ucfirst($event->registration_status) }}</p>

            <p>
                <strong>Harga:</strong>
                @if($event->price_type === 'free')
                    Gratis
                @else
                    Rp {{ number_format($event->price, 0, ',', '.') }}
                @endif
            </p>

            @if($event->external_link)
                <p>
                    <strong>Link Eksternal:</strong> 
                    <a href="{{ $event->external_link }}" target="_blank" class="text-blue-600 underline">
                        {{ $event->external_link }}
                    </a>
                </p>
            @endif
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-6 flex space-x-3">
            <a href="{{ route('events.edit', $event->id) }}" 
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus event ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Hapus
                </button>
            </form>
            <a href="{{ route('events.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Kembali</a>
        </div>
    </div>
@endsection
