<?php
namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService
{
    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function createBooking($data)
    {
        return $this->bookingRepository->create($data);
    }

    public function updateBookingStatus($bookingId, $status)
    {
        return $this->bookingRepository->updateStatus($bookingId, $status);
    }

    public function getBookingById($bookingId)
    {
        return $this->bookingRepository->findById($bookingId);
    }

    public function getAllBookings()
    {
        return $this->bookingRepository->getAll();
    }
}
