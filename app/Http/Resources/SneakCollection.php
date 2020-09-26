<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

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
                'likes' => $this->likes($request)

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
                $this->collection->pluck('id')
            )
            ->pluck('sneak_id')
            ->toArray();
    }
}
