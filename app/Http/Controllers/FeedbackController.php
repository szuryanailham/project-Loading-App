<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    // Ambil semua event yang status pendaftarannya masih open
    $events = Event::where('registration_status', 'open')->get();

    // Kirim data ke view
    return view('registrations.feedback.index', compact('events'));
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
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'event_id' => 'required|exists:events,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);


        feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'event_id' => $request->event_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

            return view('registrations.feedback.success');

    }

    /**
     * Display the specified resource.
     */
    public function show()
{
     $feedbacks = Feedback::with('event')->latest()->paginate(10);

    return view('dashboard-admin.feedback.index', compact('feedbacks'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
{
    try {
        $feedback->delete();
        return redirect()
            ->route('feedback.index')
            ->with('success', 'Feedback berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()
            ->route('feedback.index')
            ->with('error', 'Terjadi kesalahan saat menghapus feedback.');
    }
}
}
