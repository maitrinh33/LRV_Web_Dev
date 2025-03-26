<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Booking; 
use App\Models\Service; 
use App\Jobs\ProcessBookingJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all(); 

        return view('service', compact('services')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i', 
            'service' => 'required|string',
            'message' => 'nullable|string',
        ]);

        // Create a new Booking instance
        $data = new Booking; 
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->service = $request->service;
        $data->message = $request->message;
        $data->status = 'pending';

        // Assign user_id if authenticated
        if (Auth::check()) {
            $data->user_id = Auth::id();  
        } else {
            $data->guest_id = uniqid('guest_');  
        }

        // Save the booking
        $data->save();

        // Dispatch the Job (if any)
        ProcessBookingJob::dispatch($data);

        try {
            // Flash a success notification
            session()->flash('notification', [
                'type' => 'success',
                'message' => 'Booking created successfully!',
            ]);

            return redirect()->back()->with('message', 'Appointment Request Successful. We will contact you soon!');
        } catch (\Exception $e) {
            // Flash an error notification
            session()->flash('notification', [
                'type' => 'error',
                'message' => 'There was an error creating your booking. Please try again.',
            ]);

            return redirect()->back()->with('message', 'Booking failed. Please check your details and try again.');
        }
        
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendConfirmationEmail()
{
    $booking = Booking::first(); // Lấy bản ghi đầu tiên từ bảng 'bookings'

    if ($booking) {
        Mail::to($booking->email)->send(new BookingConfirmationMail($booking));
        return response()->json(['message' => 'Email sent successfully!']);
    } else {
        return response()->json(['message' => 'No booking found.'], 404);
    }
}
}
