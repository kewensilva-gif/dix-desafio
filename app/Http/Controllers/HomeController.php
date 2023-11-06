<?php

namespace App\Http\Controllers;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        /* $user_id = auth()->id();
        $access_level = User::find($user_id); */
        return view('dashboard');
    }
}
