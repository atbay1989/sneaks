<?php

namespace App\Http\Controllers\Api\Sneaks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sneak;
use App\Sneaks\SneakType;

class SneakResneakController extends Controller
{
    public function store(Sneak $sneak, Request $request)
    {
        $resneak = $request->user()->sneaks()->create([
            'type' => SneakType::RESNEAK,
            'original_sneak_id' => $sneak->id
        ]);
    }

    public function destroy(Sneak $sneak, Request $request)
    {
        $sneak->resneakedSneak()->where('user_id', $request->user()->id)->delete();
    }
}
