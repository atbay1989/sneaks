<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\SneakCollection;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $sneaks = $request->user()
            ->sneaksFromFollowing()
            ->latest()
            ->with([
                'user',
                'likes'
            ])
            ->paginate(8);

        return new SneakCollection($sneaks);
    }
}
