<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected $home = RouteServiceProvider::HOME;

    /**
     * Get a JWT via given credentials.
     *
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (!$token = auth()->attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password'],
            ]);
        }

        cookie('token', $token, auth()->factory()->getTTL());

        return redirect($this->home);
    }

    /**
     * Register a User.
     *
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create(array_merge(
            $validated,
            ['password' => Hash::make($request->password)]
        ));

        return redirect()->route('login');
    }

    /**
     * Log the user out (Invalidate the token).
     */
    public function logout()
    {
        auth()->logout();
        \Cookie::queue([\Cookie::forget('token')]);
        return redirect($this->home);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
