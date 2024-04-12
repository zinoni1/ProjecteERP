<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
class IndexController extends Controller
{
    public function showLastUsers(): View
    {
        $users = User::latest()->take(5)->get();
    
        return view('index', compact('users'));
    }
    
}