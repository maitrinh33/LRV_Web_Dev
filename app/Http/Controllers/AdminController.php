<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the form to add a new booking.
     *
     * @return \Illuminate\View\View
     */
    public function addBooking()
    {
        return view('admin.add_booking');
    }

    /**
     * Display a list of all appointments.
     *
     * @return \Illuminate\View\View
     */
    public function showAppointments()
    {
        return view('admin.show_appointments');
    }

    
}
