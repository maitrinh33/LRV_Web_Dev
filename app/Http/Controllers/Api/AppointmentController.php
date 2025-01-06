<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource for the web view.
     */
    public function index()
    {
        $user = Auth::user();
    
        // Default query to get appointments for the authenticated user
        $appointments = Booking::where('user_id', $user->id);
    
        // Apply search filter if a search term is provided
        if (request('search')) {
            $appointments->where('name', 'like', '%' . request('search') . '%')
                         ->orWhere('service', 'like', '%' . request('search') . '%')
                         ->orWhere('phone', 'like', '%' . request('search') . '%')
                         ->orWhere('created_at', 'like', '%' . request('created_at') . '%')
                         ->orWhere('updated_at', 'like', '%' . request('updated_at') . '%')
                         ->orWhere('status', 'like', '%' . request('status') . '%')
                         ->orWhere('message', 'like', '%' . request('message') . '%')
                         ->orWhere('phone', 'like', '%' . request('search') . '%');
        }
    
        // Paginate the results
        $appointments = $appointments->paginate(5); // Or any other number for pagination
    
        return view('user.my_appointment', compact('appointments'));
    }
    
    public function search(Request $request)
    {
        $user = Auth::user();
        
        // Default query to get appointments for the authenticated user
        $appointments = Booking::where('user_id', $user->id);
    
        // Apply search filter if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $appointments->where('name', 'like', '%' . $request->search . '%')
                         ->orWhere('service', 'like', '%' . $request->search . '%')
                         ->orWhere('phone', 'like', '%' . $request->search . '%');
        }
    
        // Paginate the results after filtering
        $appointments = $appointments->paginate(5); 
    
        return view('user.my_appointment', compact('appointments'));
    }
    
    /**
     * API method to fetch appointments for the authenticated user.
     */
    public function apiIndex()
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401); // Unauthorized if not authenticated
        }
    
        $user = Auth::user(); // Get the authenticated user
        $appointments = Booking::where('user_id', $user->id)->get(); // Fetch appointments for the authenticated user
        $appointments = $appointments->paginate(55);
        return response()->json($appointments, 200); // Return appointments for the authenticated user
    }
    
    /**
     * Store a newly created resource in storage (API or Web).
     */
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'service_id' => 'required|exists:services,id', // Assuming services table exists
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create appointment
        $appointment = Booking::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'time' => $request->time,
            'service_id' => $request->service_id,
            'status' => 'pending',
        ]);

        return response()->json($appointment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = Booking::findOrFail($id);
        if ($response = $this->authorizeUser($appointment)) {
            return $response;
        }

        return response()->json($appointment, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $appointment = Booking::findOrFail($id);
        if ($response = $this->authorizeUser($appointment)) {
            return $response;
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'date' => 'sometimes|date|after_or_equal:today',
            'time' => 'sometimes|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $appointment->update($request->only(['date', 'time']));
        return response()->json($appointment, 200);
    }

    /**
     * Cancel the appointment.
     */
    public function cancel($id)
    {
        // Fetch the booking
        $booking = Booking::findOrFail($id);
    
        // Check if the current user owns the booking
        if ($booking->user_id !== Auth::id()) {
            return redirect()->back()->with('notification', [
                'type' => 'error',
                'message' => 'Unauthorized to cancel this booking.',
            ]);
        }
    
        try {
            // Update the booking's status and cancellation reason
            $booking->update([
                'status' => 'cancelled', // Update status to 'cancelled'
                'cancellation_reason' => 'User cancelled the booking', // Store the reason
            ]);
    
            // Flash a success notification
            session()->flash('notification', [
                'type' => 'success',
                'message' => 'Appointment cancelled successfully.',
            ]);
    
            // Redirect back with a success message
            return redirect()->back()->with('message', 'Your booking has been cancelled.');
        } catch (\Exception $e) {
            // Flash an error notification if something goes wrong
            session()->flash('notification', [
                'type' => 'error',
                'message' => 'There was an error cancelling your booking. Please try again.',
            ]);
    
            // Redirect back with an error message
            return redirect()->back()->with('message', 'Cancellation failed. Please try again later.');
        }
    }
     
    
    /**
     * Edit the specified appointment (Web).
     */
    public function edit($id)
    {
        $appointment = Booking::findOrFail($id);
        if ($this->authorizeUser($appointment)) {
            return redirect()->route('appointments.index')->with('error', 'Unauthorized access.');
        }

        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Booking::findOrFail($id);

        if ($response = $this->authorizeUser($appointment)) {
            return $response;
        }

        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully.'], 200);
    }

    /**
     * Check if the authenticated user is authorized to access the resource.
     */
    protected function authorizeUser($appointment)
    {
        if ($appointment->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        return null;
    }
}
