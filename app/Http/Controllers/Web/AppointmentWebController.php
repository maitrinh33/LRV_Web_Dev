<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentWebController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $appointments = Booking::where('user_id', $user->id)->paginate(5);
        return view('user.my_appointment', compact('appointments'));
    }

    public function cancel($id)
    {
        try {
            $booking = Booking::findOrFail($id);
    
            // Check if the authenticated user is authorized to cancel this booking
            if ($booking->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Unauthorized to cancel this booking.');
            }
    
            // Update the booking status to cancelled
            $booking->update([
                'status' => 'cancelled',
                'cancellation_reason' => request()->input('reason', 'User cancelled the booking'), // Optional reason from request
            ]);
    
            // Flash a success notification
            session()->flash('notification', [
                'type' => 'success',
                'message' => 'Appointment cancelled successfully.',
            ]);
    
            // Redirect back with a success message
            return redirect()->back();
        } catch (\Exception $e) {
            // Flash an error notification if something goes wrong
            session()->flash('notification', [
                'type' => 'error',
                'message' => 'There was an error cancelling your booking. Please try again.',
            ]);

            // Redirect back with the error message
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $appointment = Booking::findOrFail($id);
        return view('appointments.edit', compact('appointment'));
    }
}