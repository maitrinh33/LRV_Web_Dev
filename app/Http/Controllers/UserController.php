<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::whereNot('id', Auth::user()->id)->withCount(['unreadMessages'])->get();
        $userId = null;
        return view('user-chat', compact('users', 'userId'));
    }

    public function view($userId)
    {
        return view('user-chat', compact('userId'));
    }
}