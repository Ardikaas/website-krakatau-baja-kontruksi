<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
  public function showLoginForm()
  {
    // No redirect for now
    return view('admin.login');
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|string|min:6',
    ]);

    $credentials = $request->only('email', 'password');

    // Normalize email and password
    $email = trim(strtolower($request->email));
    $password = trim($request->password);

    // Gunakan standard Eloquent parameterized query yang 100% kebal SQL Injection
    $user = User::where('email', $email)->first();

    if (!$user || !Hash::check($password, $user->password)) {
      \Log::info('Login failed', [
        'original_email' => $request->email,
        'normalized_email' => $email,
        'user_exists' => !!$user,
        'password_check' => $user ? \Hash::check($password, $user->password) : false,
        'submitted_password' => $password,
        'hashed_password' => $user ? $user->password : null
      ]);
      return back()->withErrors([
        'email' => 'Invalid credentials.',
      ])->withInput(['email' => $request->email]);
    }

    \Log::info('Login success', ['email' => $user->email]);
    // Login user dengan remember token (cookies)
    Auth::login($user, $request->has('remember'));

    // Regenerate session immediately after login to ensure session IDs and custom vars persist cleanly
    $request->session()->regenerate();

    // Set session dengan durasi terbatas (2 jam)
    $request->session()->put('admin_logged_in', true);
    $request->session()->put('admin_login_time', now());

    // Redirect langsung ke Landing Content (bukan dashboard)
    return redirect()->route('admin.landingEdit')->with('success', 'Login berhasil!');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Clear cookies
    $request->session()->forget(['admin_logged_in', 'admin_login_time']);

    return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
  }

  public function dashboard()
  {
    // Dashboard page is deprecated per user request. Redirecting directly to Landing Content.
    return redirect()->route('admin.landingEdit');
  }
}