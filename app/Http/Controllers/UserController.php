<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
    }


    // get tokens that belongs to a particular user
    public function getUserTokens()
    {
        $myTokens = auth()->user()->sales()->get();
        return view('pages.myTokens', compact('myTokens'));
    }


    // Change password
    public function changePassword(Request $request)
    {
        $request->validate(['password' => 'required|min:6|confirmed', 'oldPassword' => 'required|min:6']);
        if (!Hash::check($request->oldPassword, $request->user()->password)) {
            return back()->withErrors(['oldPassword' => ['The Provided password does\'nt match our record']]);
        }
        auth()->user()->update(['password' => $request->password]);
        return back()->with('success', 'Password change successfully!');
    }
}
