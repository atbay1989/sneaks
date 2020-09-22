<?php

namespace App\Http\Controllers\Api\Sneaks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sneaks\SneakStoreRequest;

class SneakController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }

    public function store(SneakStoreRequest $request)
    {

        $request->user()->sneaks()->create($request->only('body'));
    }
}
