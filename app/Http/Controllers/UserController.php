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
            ->addColumn('action', function ($users){
                return '
                    <a href="javascript:void(0)" class="btn btn-primary">View</a>
                    <a href="javascript:void(0)" class="btn btn-warning">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger">Delete</a>
                ';

            })->make(true);
    }
}
