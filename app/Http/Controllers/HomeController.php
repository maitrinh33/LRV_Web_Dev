<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Prepare makeup items
        $makeupItems = [
            ['image' => 'images/home/libra1.jpg', 'title' => 'Personal Makeup'],
            ['image' => 'images/home/libra2.jpg', 'title' => 'Personal Makeup'],
            ['image' => 'images/home/libra3.jpg', 'title' => 'Professional Makeup'],
            ['image' => 'images/home/libra4.jpg', 'title' => 'Personal Makeup'],
            ['image' => 'images/home/libra5.jpg', 'title' => 'Bridal Makeup'],
            ['image' => 'images/home/libra6.jpg', 'title' => 'Professional Makeup'],
            ['image' => 'images/home/libra7.jpg', 'title' => 'Bridal Makeup'],
            ['image' => 'images/home/libra8.jpg', 'title' => 'Professional Makeup'],
        ];
    
        // Check if the user is authenticated
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
    
            // Redirect based on user type
            if ($usertype === 'admin') {
                return redirect()->route('filament.admin.pages.dashboard');
            } else {
                return view('home', compact('makeupItems'));
            }
        } 
        
        // If not authenticated, show the home page with makeup items
        return view('home', compact('makeupItems'));
    }

    /**
     * Handle the logout redirect
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}