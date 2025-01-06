<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            // Redirect based on user type
            if ($usertype === 'user') {
                return view('home');
            } elseif ($usertype === 'admin') {
                return view('admin.index');
            } else {
                return view('home');
            }
        } 
        return view('home');
  
    }
    
}