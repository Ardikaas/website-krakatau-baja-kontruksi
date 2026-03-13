<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login menggunakan guard web
        if (!Auth::guard('web')->check()) {
            return redirect()->route('admin.login');
        }

        // Cek session admin
        if (!session('admin_logged_in')) {
            Auth::guard('web')->logout();
            return redirect()->route('admin.login');
        }

        // Cek timeout session (2 jam)
        $loginTime = session('admin_login_time');
        if ($loginTime && now()->diffInHours($loginTime) > 2) {
            Auth::guard('web')->logout();
            session()->forget(['admin_logged_in', 'admin_login_time']);
            return redirect()->route('admin.login')->with('error', 'Session expired. Please login again.');
        }

        // Update waktu login untuk memperpanjang session
        session(['admin_login_time' => now()]);

        return $next($request);
    }
}
