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

    // Cek apakah user ada dan password benar
    $user = User::whereRaw('LOWER(email) = ?', [$email])->first();

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

    // Set session dengan durasi terbatas (2 jam)
    $request->session()->put('admin_logged_in', true);
    $request->session()->put('admin_login_time', now());

    return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
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
    // No authentication check for now

    // Get dashboard data
    $projectsCount = \App\Models\Project::count();
    $newsCount = \App\Models\News::count();
    $documentsCount = \App\Models\Document::count();
    $usersCount = \App\Models\User::count();
    $recentProjects = \App\Models\Project::latest()->take(5)->get();

    return view('admin.dashboard', compact(
      'projectsCount',
      'newsCount',
      'documentsCount',
      'usersCount',
      'recentProjects'
    ));
  }
}