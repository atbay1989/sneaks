<?php

namespace App\Http\Controllers\Api\Sneaks;

use App\Events\Sneaks\SneakWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sneaks\SneakStoreRequest;

class SneakController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }

    public function store(SneakStoreRequest $request)
    {
        $sneak = $request->user()->sneaks()->create($request->only('body'));
        broadcast(new SneakWasCreated($sneak));
    }
}
