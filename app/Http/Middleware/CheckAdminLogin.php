<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($this->getSessionAdmin($request)){
            return $next($request);
        }
        return redirect()->route("admin.login");
    }

    private function getSessionAdmin($request)
    {
        $idAdmin = $request->session()->get("idUserAdmin");
        $idAdmin = is_numeric($idAdmin) && $idAdmin > 0 ? true : false;
        return $idAdmin;
    }
}
