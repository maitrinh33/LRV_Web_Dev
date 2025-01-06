<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Database\Query\Builder;

class AppointmentController extends Controller
{
    /**
     * API method to fetch appointments for the authenticated user with optional search.
     */
    public function Index(Request $request)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user(); // Get the authenticated user
        $appointments = Booking::where('user_id', $user->id);

        // Apply search filter if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $appointments->where('name', 'like', '%' . $request->search . '%')
                         ->orWhere('service', 'like', '%' . $request->search . '%')
                         ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        // Paginate the results
        $appointments = $appointments->paginate(4);

        return response()->json($appointments, 200); // Return appointments for the authenticated user
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'service_id' => 'required|exists:services,id',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
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
        // Find the appointment or fail with a 404 error
        $appointment = Booking::findOrFail($id);
    
        // Authorize the user
        if ($response = $this->authorizeUser($appointment)) {
            return $response;
        }
    
        // Check if cancellation is requested
        if ($request->has('cancel') && $request->cancel) {
            // Update the appointment to cancelled
            $appointment->update([
                'status' => 'cancelled',
                'cancellation_reason' => $request->reason ?? 'User cancelled the booking', // Default reason if not provided
            ]);
            
            return response()->json(['message' => 'Appointment cancelled successfully.'], 200);
        }
    
        // Validation for other updates
        $validator = Validator::make($request->all(), [
            'date' => 'sometimes|date|after_or_equal:today',
            'time' => 'sometimes|date_format:H:i',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Update the appointment with the validated data
        $appointment->update($request->only(['date', 'time']));
    
        return response()->json($appointment, 200);
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

    public function search(Request $request)
    {
        // Initialize a query on the Booking model
        $query = Booking::query();
    
        // Check for search parameters
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        
        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
    
        if ($request->has('date')) {
            $query->whereDate('date', $request->input('date'));
        }
    
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }
    
        // Check for sorting parameters
        if ($request->has('sort_by')) {
            $query->orderBy($request->input('sort_by'), $request->input('sort_order', 'asc'));
        }
    
        // Execute the query and paginate results
        $appointments = $query->paginate(10); // Adjust the number as needed
    
        // Return results as JSON
        return response()->json($appointments, 200);
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