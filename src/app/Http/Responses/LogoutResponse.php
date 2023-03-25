<?php

namespace App\Http\Responses;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Http\JsonResponse;


class LogoutResponse implements LogoutResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @see \Laravel\Fortify\Http\Responses\LoginResponse
     */
    public function toResponse($request)
    {
        return $request->wantsJson()
            ? response()->json([
                'message' => 'Logout Successful',
            ],200)
            : redirect()->intended(config('fortify.home'));
    }
}
