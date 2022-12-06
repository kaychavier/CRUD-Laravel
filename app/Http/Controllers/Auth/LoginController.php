<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();
        if(auth()->attempt($data, $loginRequest->has('remember'))){
            return redirect('/');
        }
        return back()->withErrors(['password'=>'Login inválido']);
    }
}
