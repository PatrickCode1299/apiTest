<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function unauthenticated($request, AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        return response()->json(['message' => 'Forbidden'], 403); // Return 403 instead of 401/redirect
    }

    return response()->json(['message' => 'Forbidden'], 403); // Default fallback (not used for APIs)
}
}
