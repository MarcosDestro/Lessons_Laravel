<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class checkParam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $param, $param2)
    {
        // Qual user está logado
        // attr do nível
        // if (attr === param) ? $next($request) : redirect('login');

        Log::info('Foi invocado nosso primeiro middleware! ['.$param.' - '.$param2.']');
        Log::info('TESTE 1');

        $process = $next($request);

        Log::info('TESTE 3');

        return $process;
    }
}
