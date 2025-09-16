<?php

namespace App\Http\Controllers;

use App\Models\events;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
        $events = Event::all();
    return view('registrations.form', compact('events'));

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    try {
        // Validasi data
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'nullable|string|max:20',
            'Alamat'        => 'nullable|string|max:255',
            'birth_date'    => 'nullable|date',
            'gender'        => 'nullable|in:male,female',
            'event_id'      => 'required|integer|exists:events,id',
            'source'        => 'nullable|string|max:50',
            'notes'         => 'nullable|string',
            'payment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);


        // Upload bukti pembayaran jika ada
       if ($request->hasFile('payment_proof')) {
    $filename = time() . '_' . $request->file('payment_proof')->getClientOriginalName();
    $path = $request->file('payment_proof')->storeAs('payment_proofs', $filename, 'public');
    $validated['payment_proof'] = $path;
}
    
        // Simpan ke database
        Registration::create($validated);

        sleep(2);

   return view('registrations.success');

    } catch (\Exception $e) {
        // Jika ada error selain validasi
        return redirect()->back()
            ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
            ->withInput();
    }
}


    /**
     * Display the specified resource.
     */
    public function show(events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(events $events)
    {
        //
    }
}
