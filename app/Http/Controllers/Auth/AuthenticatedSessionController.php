<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {

        // return response()->json([
        //     'authenticated' =>  'false'
        // ], 401);
        
      $auth =  $request->authenticate();

      return response()->json([
        'authenticated' =>  $auth
      ]);

        // $request->session()->regenerate();

        // $token = $request->user()->createToken($request->email);

        // return response()->json([
        //     'jwt' => $token->plainTextToken,
        //     // 'user' => $request->user(),
        //     'authenticated' =>  $request->authenticate()
        // ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
