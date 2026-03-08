<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $throttleKey = 'login_attempt_' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            return $this->error('Terlalu banyak percobaan. Silakan coba lagi nanti.', 429);
        }

        if (!Auth::attempt($request->only('username', 'password'))) {
            return $this->error('Username atau password tidak valid.', 401);
        }

        RateLimiter::clear($throttleKey);
        $user = User::where('username', $request->username)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'access_token' => $token,
            'user' => $user
        ], 'Login Berhasil');
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        // If authenticated via token, revoke the current access token
        $token = $user ? $user->currentAccessToken() : null;
        if ($token) {
            $token->delete();
        } else {
            // If authenticated via session/cookie (SPA mode), log out and invalidate the session
            Auth::logout();
            if ($request->hasSession()) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
        }
        return $this->success(null, 'Logout Berhasil');
    }

    public function me(Request $request)
    {
        return $this->success($request->user());
    }
}
