<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with(['user_phone'])->select('id', 'name', 'email');
            return Datatables::of($data)
                ->addColumn('user_phone', function (User $user) {
                    return $user->user_phone->map(function ($user_phone) {
                        return $user_phone->phone;
                    })->implode(', ');
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                        <a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>
                        <a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Edit</a>
                        <a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>
                    ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }
}
