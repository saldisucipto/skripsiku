<?php

namespace App\Http\Middleware;

use Closure;

class CustomerAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // return $next($request);
        //JADI KITA CEK, JIKA GUARD CUSTOMER BELUM LOGIN
        if (!auth()->guard('customer')->check()) {
            //MAKA REDIRECT KE HALAMAN LOGIN
            return redirect('customerlogin')->with('error', 'Hai Anda Harus Login Dulu !');
        }
        //JIKA SUDAH MAKA REQUEST YANG DIMINTA AKAN DISEDIAKAN
        return $next($request);
    }
}
