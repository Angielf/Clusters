<?php

namespace App\Http\Controllers;

use App\Appeal;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->status === 1) {
//            $districts = District::all();
//            return view('home', ['user' => $user, 'districts' => $districts]);
            redirect('/clusters');
        } elseif ($user->status === 2) {
            $districts = District::where('id', $user->district)->get();
            return view('base', ['user' => $user, 'districts' => $districts]);
        } else {
            return view('school', ['user' => $user]);
        }
    }
}
