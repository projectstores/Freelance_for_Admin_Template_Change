<?php

namespace App\Http\Middleware;

use App\Models\BannedIp;
use Closure;
use Illuminate\Http\Request;

class isIpBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if application installed
        if (isInstalled()) {
            
            // Get ip address
            $ip     = $request->ip();

            // Get banned ip
            $banned = BannedIp::where('ip_address', $ip)->where('attempts', '>=', 3)->first();

            // Check if ip banned
            if ($banned) {
                
                // This ip banned
                return redirect('/');

            }

            // Continue request
            return $next($request);

        } else {

            // Not installed yet
            return $next($request);

        }
        
    }
}
