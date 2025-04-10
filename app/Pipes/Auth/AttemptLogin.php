<?php

namespace App\Pipes\Auth;

use App\Dto\LoginDto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AttemptLogin
{
    protected int $decaySeconds = 120;
    public function __invoke(LoginDto $loginDto,$next)
    {
        $credentials = [
            filter_var($loginDto->login,FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $loginDto->login,
            'password' => $loginDto->password
        ];
        $attempt = Auth::attempt($credentials,$loginDto->remember);
        if (!$attempt)
        {
            RateLimiter::hit($loginDto->throttleKey,$this->decaySeconds);
            throw ValidationException::withMessages([
                'failed' => __('auth.failed')
            ]);
        }
        RateLimiter::clear($loginDto->throttleKey);
        session()->regenerate();
        return $next($loginDto);
    }
}
