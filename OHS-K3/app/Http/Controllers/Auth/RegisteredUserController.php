<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user baru
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'asal_perusahaan' => $request->asal_perusahaan,
            'password' => Hash::make($request->password),
            'role' => 'quest',  // Set default role ke 'quest'
            'is_approved' => false,  // Default value untuk quest
        ]);

        // Trigger event Registered
        event(new Registered($user));

        // Login user setelah registrasi
        Auth::login($user);

        // Redirect ke halaman utama
        return redirect(RouteServiceProvider::HOME);
    }
}
