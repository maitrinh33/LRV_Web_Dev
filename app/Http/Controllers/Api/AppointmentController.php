<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $appointments = Booking::where('user_id', $user->id);

        if ($request->has('search') && $request->search != '') {
            $appointments->where('name', 'like', '%' . $request->search . '%')
                         ->orWhere('service', 'like', '%' . $request->search . '%')
                         ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        return response()->json($appointments->paginate(4), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $booking = Booking::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        return response()->json($booking, 201);
    }

    public function show($id)
    {
        $appointment = Booking::findOrFail($id);
        if ($this->authorizeUser($appointment)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($appointment, 200);
    }

    public function update(Request $request, $id)
    {
        $appointment = Booking::findOrFail($id);
        if ($this->authorizeUser($appointment)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($request->has('cancel') && $request->cancel) {
            $appointment->update(['status' => 'cancelled']);
            return response()->json(['message' => 'Appointment cancelled successfully.'], 200);
        }

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

    public function destroy($id)
    {
        $appointment = Booking::findOrFail($id);
        if ($this->authorizeUser($appointment)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully.'], 200);
    }

    protected function authorizeUser($appointment)
    {
        return $appointment->user_id !== Auth::id();
    }
}