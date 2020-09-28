<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Sneaks\SneakType;

class SneakCollection extends ResourceCollection
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    public $collects = SneakResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    public function with($request)
    {
        return [
            'meta' => [
                'likes' => $this->likes($request),
                'resneaks' => $this->resneaks($request)

            ]
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    protected function likes($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->likes()
            ->whereIn(
                'sneak_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_sneak_id'))
            )
            ->pluck('sneak_id')
            ->toArray();
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    protected function resneaks($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->resneaks()
            ->whereIn(
                'original_sneak_id',
                $this->collection->pluck('id')->merge($this->collection->pluck('original_sneak_id'))
            )
            ->pluck('original_sneak_id')
            ->toArray();
    }
}
