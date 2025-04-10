<?php

namespace App\Pipes\Auth;

use App\Dto\LoginDto;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LimitLoginAttempts
{
    protected int $maxAttempts = 5;
    public function __invoke(LoginDto $loginDto, $next)
    {
        if (RateLimiter::tooManyAttempts($loginDto->throttleKey,$this->maxAttempts))
        {
            throw ValidationException::withMessages([
                'throttle' => __('auth.throttle', [
                    'seconds' => RateLimiter::availableIn($loginDto->throttleKey)
                ])
            ]);
        }
        return $next($loginDto);
    }
}
