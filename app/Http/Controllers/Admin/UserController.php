<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
		$auth = Auth::user();
		return view('user.index',[ 'auth' => $auth ]);

	}

	public function edit(){

		$auth = Auth::user();
		return view('user.edit',[ 'auth' => $auth ]);

	}

}
