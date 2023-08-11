<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DataTables;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function getUsers(Request $request)
    {
        $users = User::select(['id', 'name', 'email']);

        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '
                <button class="btn btn-primary view-btn" data-id="' . $user->id . '">View</button>
                <button class="btn btn-warning edit-btn" data-id="' . $user->id . '">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="' . $user->id . '">Delete</button>
            ';
            })
            ->make(true);
    }

}
