<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isPegawai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'pegawai') {
            return $next($request);
        }

        // Redirect jika pengguna bukan pegawai
        return redirect('/')->with('error', 'Anda tidak memiliki akses sebagai pegawai, register dahulu');
    }
}
