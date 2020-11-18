<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompeDetail;
use Illuminate\Support\Facades\Auth;

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
    public function index(){

        $competitions = CompeDetail::orderBy('compe_id', 'desc')->get();
        $auth = Auth::user();

        return view('home')->with([
            'competitions' => $competitions,
            'auth' => $auth,
        ]);
    }

    public function acount(){

        $acount = User::all();

        return view('home')->with([
            'competitions' => $competitions,
        ]);
    }
}
