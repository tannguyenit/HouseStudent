<?php

namespace App\Http\Middleware;

use Closure;

class ChatbotMiddleware
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
        if ($request->input("hub_mode") === "subscribe"
            && $request->input("hub_verify_token") === config('chatbot.messenger_veryfy_token')) {
            return response($request->input("hub_challenge"), 200);
        }
        return $next($request);
    }
}
