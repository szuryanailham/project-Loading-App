@extends('dashboard-admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">Card 1</div>
        <div class="bg-white p-6 rounded-lg shadow">Card 2</div>
        <div class="bg-white p-6 rounded-lg shadow">Card 3</div>
    </div>
@endsection
