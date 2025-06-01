<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;


class BlockIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
    
        // $ip = $request->ip();
        // echo $ip;

        // $key= 'block_ip' . $ip;


        // if(Cache::has($key)){
             
        //     echo "key exist".$key;
        //     return redirect()->route('account.login')->withErrors([
        //         'error' => "you have already acccess this page, try after sometime."
        //     ]);
        // }


        // Cache::put($key, true, now()->addMinutes(1));


        // Scope funtions global -created_at
        // local scope-casting
        // Casting
        //attribute functions

        

        return $next($request);
    }
}
