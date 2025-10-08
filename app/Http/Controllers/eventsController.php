<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('updated_at', 'desc')->paginate(10);

    return view('dashboard-admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard-admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug',
            'poster_img'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'        => 'nullable|string',
            'date'               => 'required|date',
            'event_type'         => 'required|in:offline,online',
            'location'           => 'nullable|string|max:255',
            'price_type'         => 'required|in:free,paid',
            'price'              => 'nullable|numeric',
            'registration_status'=> 'required|in:open,closed',
            'external_link'      => 'nullable|url',
        ]);

        // Simpan poster (kalau ada)
        $posterPath = null;
        if ($request->hasFile('poster_img')) {
            $posterPath = $request->file('poster_img')->store('events/posters', 'public');
        }

        // Simpan ke database
        Event::create([
            'name'                => $validated['name'],
            'slug'                =>$validated['slug'],
            'poster_img'          => $posterPath,
            'description'         => $validated['description'] ?? null,
            'date'                => $validated['date'],
            'event_type'          => $validated['event_type'],
            'location'            => $validated['location'] ?? null,
            'price_type'          => $validated['price_type'],
            'price'               => $validated['price'] ?? null,
            'registration_status' => $validated['registration_status'],
            'external_link'       => $validated['external_link'] ?? null,
        ]);

        return redirect()->route('events.index')->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
   public function show(Event $event)
{
    return view('dashboard-admin.events.show', compact('event'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
