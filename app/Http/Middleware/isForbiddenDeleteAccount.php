<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class isForbiddenDeleteAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $idUser = Crypt::decrypt($request->route('id'));
        $logedInUser = Auth::user()->kode_user;
        if ($idUser != $logedInUser) {
            return $next($request);
        }else{
            return redirect()->back()->with('gagal', 'Anda Dilarang Menghapus Akun Tersebut !');
        }
    }
}
