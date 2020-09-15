<?php

namespace App\Listeners;

use App\Events\MatchAdded;
use App\Services\EloService;

class CalculateEloAfterMatch
{
    protected EloService $eloService;

    public function __construct(EloService $eloService)
    {
        $this->eloService = $eloService;
    }

    public function handle(MatchAdded $event): void
    {
        $this->eloService->calculateAfterMatch($event->match);
    }
}
