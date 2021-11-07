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
        $client_ip = $request->ip();
        $user_agent = $request->header('User-Agent');
        $request_url = str_replace($request->root(), '', $request->fullUrl());
        $config = config('operation_log');

        // check ip
        if (isset($config['exclude_ips']) && count($config['exclude_ips']) > 0) {
            foreach ($config['exclude_ips'] as $exclude_ip) {
                if (str_starts_with($client_ip, $exclude_ip)) {
                    return $next($request);
                }
            }
        }
        // check user-agent
        if (isset($config['exclude_user_agents']) && count($config['exclude_user_agents']) > 0) {
            foreach ($config['exclude_user_agents'] as $exclude_user_agent) {
                if (str_contains($user_agent, $exclude_user_agent)) {
                    return $next($request);
                }
            }
        }
        // check url
        if (isset($config['exclude_urls']) && count($config['exclude_urls']) > 0) {
            foreach ($config['exclude_urls'] as $exclude_url) {
                if (str_starts_with($request_url, $exclude_url)) {
                    return $next($request);
                }
            }
        }

        $response = $next($request);

        OperationLog::query()->create([
            'client_ip' => $client_ip,
            'user_agent' => $user_agent,
            'request_url' => $request_url,
            'request_time' => $request_time,
            'response_time' => Carbon::now()->format("Y/m/d H:i:s.u"),
        ]);

        return $response;
    }
}
