<?php

namespace Imotikuwa\OperationLogs\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use ImoTikuwa\OperationLogs\Models\OperationLog;

class OperationLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request_time = Carbon::now()->format("Y/m/d H:i:s.u");

        $response = $next($request);

        OperationLog::query()->create([
            'client_ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'request_url' => $request->url(),
            'request_time' => $request_time,
            'response_time' => Carbon::now()->format("Y/m/d H:i:s.u"),
        ]);

        return $response;
    }
}
