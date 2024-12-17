<?php

namespace App\Http\Controllers\Admin\Consultation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultation\Booking;
use App\Models\Consultation\Specialisation;
use App\Http\Requests\Consultation\BookingRequest;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bkn = request()->query('bkn') ?? null;
        $d = request()->query('d') ?? null;
        // $t = request()->query('t') ?? null;
        $s = request()->query('s') ?? null;
        $filters = [
            'bkn' =>$bkn,
            'd' => $d,
            // 't' => $t,
            's' => $s
        ];

        $query = Booking::with(['specialisation', 'consultant'])->latest() ?? null;
        if ($bkn) {
            $query->where('booking_number', 'LIKE', "%{$bkn}%");
        }

        if ($s) {
            $query->where('specialisation_id' , '=' , $s);
        }

        // if($t){
        //     $query->where('time', '=', $t);
        // }

        if($d){
            $query->where('date', '=', $d);
        }

        $booked_datetime = Booking::select('specialisation_id','date', 'time')->get();
        // dd($booked_datetime);
        // Get paginated results
        $bookings = $query->paginate(12)->withQueryString(); // Ensure query string persists
        return inertia('Admin/Consultation/Bookings', [
            'title' => 'Bookings',
            'specialisations' => Specialisation::all(),
            'bookings'=> $bookings,
            'filters' =>$filters,
            'booked_datetime' => $booked_datetime
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $validated = $request->validated();
        $validated['booking_number'] = 'BKN' . time();
        Booking::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
