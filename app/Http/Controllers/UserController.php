<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \DataTables;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function getUsers(Request $request)
    {
        $users = User::query()->orderBy('id', 'DESC');

        return DataTables::eloquent($users)
            ->addColumn('action', function ($user) {
                return '
                <button class="btn btn-primary view-btn" data-id="' . $user->id . '">View</button>
                <button class="btn btn-warning edit-btn" data-id="' . $user->id . '">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="' . $user->id . '">Delete</button>
            ';
            })
            ->make(true);
    }

    /**
     * @author Mazharul Islam
     * @date 25 November, 2023
    */
    public function datatableV2()
    {

        $users = User::query();

        return DataTables::of($users)
            /*Set id to every row*/
            ->setRowId('{{$id}}')
            /*Set custom class to row*/
            ->setRowClass(function ($user) {
                return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
            })
            ->setRowData([
                'data-id' => function($user) {
                    return 'row-' . $user->id;
                },
                'data-name' => function($user) {
                    return 'row-' . $user->name;
                },
            ])
            ->addColumn('intro', function(User $user) {
                return 'Hi ' . $user->name . '!';
            })
            ->addColumn('action', function ($user) {
                return '
                <div class="text-center">
                    <button class="btn btn-primary view-btn" data-id="' . $user->id . '">View</button>
                    <button class="btn btn-warning edit-btn" data-id="' . $user->id . '">Edit</button>
                    <button class="btn btn-danger delete-btn" data-id="' . $user->id . '">Delete</button>
                </div>
            ';
            })
            ->make(true);
    }

}
