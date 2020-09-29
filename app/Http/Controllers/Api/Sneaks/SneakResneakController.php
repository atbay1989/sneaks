<?php

namespace App\Http\Controllers\Api\Sneaks;

use App\Events\Sneaks\SneakWasCreated;
use App\Events\Sneaks\SneakWasDeleted;
use App\Events\Sneaks\SneakResneaksWereUpdated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sneak;
use App\Sneaks\SneakType;

class SneakResneakController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }

    public function store(Sneak $sneak, Request $request)
    {
        $resneak = $request->user()->sneaks()->create([
            'type' => SneakType::RESNEAK,
            'original_sneak_id' => $sneak->id
        ]);

        broadcast(new SneakWasCreated($resneak));
        broadcast(new SneakResneaksWereUpdated($request->user(), $sneak));

    }

    public function destroy(Sneak $sneak, Request $request)
    {
        broadcast(new SneakWasDeleted($sneak->resneakedSneak));

        $sneak->resneakedSneak()->where('user_id', $request->user()->id)->delete();

        broadcast(new SneakResneaksWereUpdated($request->user(), $sneak));
    }
}
