<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Exports\RegistrationsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
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

public function export()
{
    return Excel::download(new RegistrationsExport, 'registrations.xlsx');
}

public function showAll()
{
$registrations = Registration::with('event')->orderBy('created_at', 'desc')->paginate(10);
return view('dashboard-admin.registration', compact('registrations'));
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
            'social_media'  => 'nullable|string|max:50', // tambahkan validasi
            'notes'         => 'nullable|string',
            'payment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Handle upload bukti pembayaran
        if ($request->hasFile('payment_proof')) {
            $filename = time() . '_' . $request->file('payment_proof')->getClientOriginalName();
            $path = $request->file('payment_proof')->storeAs('payment_proofs', $filename, 'public');
            $validated['payment_proof'] = $path;
        }

        // Jika source = social_media, simpan field social_media
        if ($request->source === 'social_media') {
            $validated['source'] = $request->social_media;
        }

        // Jika ada input other_source, override source
        if ($request->filled('other_source')) {
            $validated['source'] = $request->other_source;
        }

        // Simpan ke database
       $registration = Registration::create($validated);
       $eventName = Event::where('id', $registration->event_id)->value('name');
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
    public function show(Event $events)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Registration $registration)
{
    try {
        // Hapus file image_proof kalau ada
        if ($registration->image_proof && Storage::exists($registration->image_proof)) {
            Storage::delete($registration->image_proof);
        }

        // Hapus data dari database
        $registration->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    }
}

public function search(Request $request)
{
    $search = $request->input('search');

    $registrations = Registration::with('event')
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('dashboard-admin.registration', compact('registrations'));
}

}
