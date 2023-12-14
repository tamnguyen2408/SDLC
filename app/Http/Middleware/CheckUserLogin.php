<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $this->getSessionUser($request);

        if($user){
            // User is logged in, proceed with the request
            return $next($request);
        }

        // User is not logged in, redirect to login page
        return redirect()->route("user.login");
    }

    private function getSessionUser($request)
    {
        $idUser = $request->session()->get("idUserUser");

        // If $idUser is not null and greater than 0, return the user instance
        if (is_numeric($idUser) && $idUser > 0) {
            return User::find($idUser);
        }

        // User is not logged in
        return null;
    }
}
