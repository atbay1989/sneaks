<?php

namespace App\Http\Controllers\Api\Sneaks;

use App\Events\Sneaks\SneakLikesWereUpdated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sneak;

class SneakLikeController extends Controller
{
    public function store(Sneak $sneak, Request $request)
    {
        if ($request->user()->hasLiked($sneak)) {
            return response(null, 409);
        }
        $request->user()->likes()->create([
            'sneak_id' => $sneak->id
        ]);

        broadcast(new SneakLikesWereUpdated($request->user(), $sneak));
    }

    public function destroy(Sneak $sneak, Request $request)
    {
        $request->user()->likes()->where('sneak_id', $sneak->id)->first()->delete();
        broadcast(new SneakLikesWereUpdated($request->user(), $sneak));

    }
}
