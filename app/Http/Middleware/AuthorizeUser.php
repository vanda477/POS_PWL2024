<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    //  //Pratikum 2
    //  public function handle(Request $request, Closure $next, $role = ''): Response
    // {
    //     $user = $request->user(); // ambil data user yg login
    //                               // fungsi user() diambil dari UserModel.php
    //     if($user->hasRole($role)){ // cek apakah user punya role yg diinginkan
    //         return $next($request);
    //     }
    
    //     // jika tidak punya role, maka tampilkan error 403
    //     abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
    // }

    //Pratikum3
    public function handle(Request $request, Closure $next, ... $roles): Response
    {
        $user_role = $request->user()->getRole();   //ambil data level_kode dari user yang login
        if(in_array($user_role, $roles)){  //memeriksa bila level_kode user ada di dalam array roles
            return $next($request); //jika ada, maka request dilanjutkan
        }
        //jika tidak punya role, maka ditampilkan eror 403
        abort(403, 'Forbidden. Anda tidak punya akses ke laman ini!');
    }
}
