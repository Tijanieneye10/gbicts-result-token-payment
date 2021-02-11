<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $getTokens = Admin::orderBy('card_time', 'ASC')->get();
        // dd($getTokens);
        return view('pages.showToken', compact('getTokens'));
    }

    // to delete tokens
    public function deleteToken(Admin $token)
    {
        $token->delete();
        return back()->with('deleted', 'Deleted Successfully');
    }

    // store token
    public function store(Request $request)
    {
        Admin::generateToken($request->tokenNumber);
        return back()->with('success', 'Token successfully generated');
    }
}
