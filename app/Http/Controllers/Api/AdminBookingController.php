<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Jobs\SendBookingStatusEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        // Dispatch the email job
        SendBookingStatusEmail::dispatch($booking, 'approved');

        return response()->json(['message' => 'Booking approved successfully.'], 200);
    }

    /**
     * Reject the specified booking.
     */
    public function reject(Request $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->status = 'rejected';
            $booking->cancellation_reason = $request->cancellation_reason;
            $booking->save();

            // Dispatch the email job
            SendBookingStatusEmail::dispatch($booking, 'rejected');

            return response()->json(['message' => 'Booking rejected successfully.'], 200);
        } catch (\Exception $e) {
            \Log::error('Failed to reject booking: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to reject booking.'], 500);
        }
    }
}
