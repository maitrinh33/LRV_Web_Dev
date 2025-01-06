<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    /**
     * List all bookings with user data, including cancellation requests.
     */
    public function index()
    {
        // Fetch all bookings with their associated user data, including cancelled bookings
        $bookings = Booking::with('user')
            ->where('status', 'cancelled') // Only fetch bookings marked as cancelled
            ->orWhere('status', 'pending') // Fetch pending bookings as well
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Approve a cancellation request.
     */
    public function approveCancellation($id)
    {
        // Find the booking by ID or fail
        $booking = Booking::findOrFail($id);

        // Ensure the booking is in 'cancelled' status
        if ($booking->status !== 'cancelled') {
            return response()->json([
                'success' => false,
                'message' => 'Booking is not marked for cancellation.',
            ], 400);
        }

        // Update the booking status to 'cancelled_approved'
        $booking->status = 'cancelled_approved';
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Cancellation approved successfully!',
            'booking' => $booking,
        ]);
    }

    /**
     * Reject a cancellation request.
     */
    public function rejectCancellation(Request $request, $id)
    {
        // Find the booking by ID or fail
        $booking = Booking::findOrFail($id);

        // Ensure the booking is in 'cancelled' status
        if ($booking->status !== 'cancelled') {
            return response()->json([
                'success' => false,
                'message' => 'Booking is not marked for cancellation.',
            ], 400);
        }

        // Store the rejection reason and revert the status to its previous state
        $booking->update([
            'status' => 'pending', // Revert to 'pending' or the previous status
            'rejection_reason' => $request->input('reason', 'No reason provided'), // Optional reason
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cancellation request rejected successfully!',
            'booking' => $booking,
        ]);
    }
}
