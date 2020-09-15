<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Ladder;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index(Ladder $ladder): JsonResponse
    {
        return response()->json($ladder->teams);
    }
}
