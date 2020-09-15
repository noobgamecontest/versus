<?php

namespace App\Events;

use App\Models\Match;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class MatchAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Match $match;

    public function __construct(Match $match)
    {
        $this->match = $match;
    }
}
