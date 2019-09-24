<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TurnOnLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->is_login = 1;
        $user->save();
        return redirect('/');
    }
}
