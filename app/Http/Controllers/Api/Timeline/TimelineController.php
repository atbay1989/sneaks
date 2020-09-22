<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\SneakCollection;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index(Request $request)
    {
        $sneaks = $request->user()
            ->sneaksFromFollowing()
            ->paginate(8);

        return new SneakCollection($sneaks);
    }
}
