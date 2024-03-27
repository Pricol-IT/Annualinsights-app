<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApproverMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (authUser()) {
            if (authUser()->role == 'approver') {
                return $next($request);
            }else if (authUser()->role == 'user') {
                return redirect()->route('user.dashboard');
            }else if (authUser()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

        }
        else {
            return redirect('login');
        }
    }
}
