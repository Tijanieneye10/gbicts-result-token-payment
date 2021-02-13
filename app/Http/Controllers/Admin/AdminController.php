<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;

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

        // // Let store user
        // public function storeUser(CreateUserRequest $request)
        // {
        //     $request->request->add(['password' => $request->name]);
        //     User::create($request->all());
        //     return back()->with('success', 'User Created successfully');
        // }

        // get all users
        public function getUsers()
        {
            $users = User::all();
            return view('pages.viewUsers', compact('users'));
        }

        // edit user
        public function editUser(User $user)
        {
                return view('pages.editUser', compact('user'));
        }

        public function updateUser(CreateUserRequest $request, User $user)
        {
            $user->update($request->all());
            return back()->with('success', 'User Updated successfully!');
        }

}
