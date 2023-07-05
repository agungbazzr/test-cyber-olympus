<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $query)
    {
        
        $user = User::orderBy('name')->paginate(10);
        
        return view('user.index', compact('user'));
    }
}
