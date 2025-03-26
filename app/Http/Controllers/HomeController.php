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
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
    
            // Redirect based on user type
            if ($usertype === 'user') {
                return view('home', compact('makeupItems'));
            } elseif ($usertype === 'admin') {
                return view('admin.index');
            } else {
                return view('home', compact('makeupItems'));
            }
        } 
        
        // If not authenticated, still show the home page with makeup items
        return view('home', compact('makeupItems'));
    }
    
}