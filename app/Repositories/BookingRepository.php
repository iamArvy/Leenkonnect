<?php
namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function create(array $data)
    {
        return Booking::create($data);
    }

    public function updateStatus($bookingId, $status)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = $status;
        $booking->save();
        return $booking;
    }

    public function findById($id)
    {
        return Booking::with('consultant', 'service', 'user')->findOrFail($id);
    }

    public function getAll()
    {
        return Booking::with('consultant', 'service', 'user')->get();
    }
}
