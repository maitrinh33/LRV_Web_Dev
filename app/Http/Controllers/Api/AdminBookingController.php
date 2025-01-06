<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of all bookings.
     */
    public function index()
    {
        // Fetch all bookings
        $bookings = Booking::paginate(10); // Adjust number of bookings per page as necessary
        return response()->json($bookings, 200);
    }

    public function webIndex()
    {
        $bookings = Booking::paginate(10); // Fetch all bookings
        return view('admin.index', compact('bookings')); // Ensure 'admin.index' matches your view path
    }

    /**
     * Show the specified booking.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking, 200);
    }

    /**
     * Approve the specified booking.
     */
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return response()->json(['message' => 'Booking approved successfully.'], 200);
    }

    /**
     * Reject the specified booking.
     */
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return response()->json(['message' => 'Booking rejected successfully.'], 200);
    }
}
