<?php

namespace App\Http\Controllers\Auth;

use App\Dto\LoginDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Pipes\Auth\AttemptLogin;
use App\Pipes\Auth\LimitLoginAttempts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Pipeline;
use Inertia\Inertia;
use Inertia\Response;

class LoginController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('auth/Login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $loginDto = new LoginDto(...$request->only('login','password','remember'));
        return Pipeline::send($loginDto)
        ->through([
            LimitLoginAttempts::class,
            AttemptLogin::class
        ])->then(function (){
            return redirect()->intended();
        });
    }
}
