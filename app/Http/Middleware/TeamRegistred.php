<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamRegistred
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
        $ladder = $request->ladder;
        // todo: vérifier qu'aucune team de user n'est inscrite dans ladder

        $userTeams = $request->user()->teams();

        dd($userTeams);
        return $next($request);
    }
}
