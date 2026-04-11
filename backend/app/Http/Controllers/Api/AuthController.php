<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    /**
     * Login pengguna
     *
     * Men-generate personal access token Sanctum untuk dipakai pada endpoint lain.
     *
     * @group Authentication
     * @unauthenticated
     *
     * @bodyParam username string required Username akun. Example: admin_super
     * @bodyParam password string required Password akun. Example: password
    *
    * @response 200 {
    *  "meta": {"status": "success", "code": 200, "message": "Login Berhasil"},
    *  "data": {
    *    "access_token": "1|example_plain_text_token",
    *    "user": {"id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9", "username": "admin_super", "name": "Super Admin"}
    *  }
    * }
    * @response 401 {
    *  "meta": {"status": "error", "code": 401, "message": "Username atau password tidak valid."},
    *  "errors": null
    * }
    * @response 422 {
    *  "meta": {"code": 422, "status": "error", "message": "Validasi request gagal."},
    *  "errors": {"username": ["The username field is required."], "password": ["The password field is required."]}
    * }
     */
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

    /**
     * Logout pengguna
     *
     * Menghapus token aktif saat ini (Bearer token), atau mengakhiri sesi jika login via session.
     *
     * @group Authentication
     * @authenticated
        *
        * @response 200 {
        *  "meta": {"status": "success", "code": 200, "message": "Logout Berhasil"},
        *  "data": null
        * }
        * @response 401 {
        *  "meta": {"code": 401, "status": "error", "message": "Unauthenticated."},
        *  "errors": null
        * }
     */
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

    /**
     * Profil pengguna saat ini
     *
     * Mengembalikan data user dari token yang sedang digunakan.
     *
     * @group Authentication
     * @authenticated
        *
        * @response 200 {
        *  "meta": {"status": "success", "code": 200, "message": "Success"},
        *  "data": {"id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9", "username": "admin_super", "name": "Super Admin"}
        * }
        * @response 401 {
        *  "meta": {"code": 401, "status": "error", "message": "Unauthenticated."},
        *  "errors": null
        * }
     */
    public function me(Request $request)
    {
        return $this->success($request->user());
    }
}
